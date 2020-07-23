$(document).ready(function() {
  const video = $('#webcam')[0];
  const overlay = $('#overlay')[0];
  const overlayCC = overlay.getContext('2d');
  const ctrack = new clm.tracker();
   var ide;
   var checkifgroup = 1;
   var checkifclick = 0;
   var blink = 0;
   var first = 0;
   var second = 0;
   var third = 0;
   var fourth = 0;
   var fifth = 0;
  ctrack.init();

  function getEyesRectangle(positions) {
    const minX = positions[23][0] - 5;
    const maxX = positions[28][0] + 5;
    const minY = positions[24][1] - 5;
    const maxY = positions[26][1] + 5;

    const width = maxX - minX;
    const height = maxY - minY;

    return [minX, minY, width, height];
  }

  function trackingLoop() {
    // Check if a face is detected, and if so, track it.
    requestAnimationFrame(trackingLoop);
    let currentPosition = ctrack.getCurrentPosition();

    overlayCC.clearRect(0, 0, 400, 300);
    if (currentPosition) {
      // Draw facial mask on overlay canvas:
      ctrack.draw(overlay);

      // Get the eyes rectangle and draw it in red:
      const eyesRect = getEyesRectangle(currentPosition);
      overlayCC.strokeStyle = 'red';
      overlayCC.strokeRect(eyesRect[0], eyesRect[1], eyesRect[2], eyesRect[3]);

      // The video might internally have a different size, so we need these
      // factors to rescale the eyes rectangle before cropping:
      const resizeFactorX = video.videoWidth / video.width;
      const resizeFactorY = video.videoHeight / video.height;

      // Crop the eyes from the video and paste them in the eyes canvas:
      const eyesCanvas = $('#eyes')[0];
      const eyesCC = eyesCanvas.getContext('2d');

      eyesCC.drawImage(
        video,
        eyesRect[0] * resizeFactorX,
        eyesRect[1] * resizeFactorY,
        eyesRect[2] * resizeFactorX,
        eyesRect[3] * resizeFactorY,
        0,
        0,
        eyesCanvas.width,
        eyesCanvas.height,
      );
    }
  }

  function onStreaming(stream) {
    video.srcObject = stream;
    ctrack.start(video);
    trackingLoop();
  }

  navigator.mediaDevices
    .getUserMedia({
      video: true,
    })
    .then(onStreaming);

  // Track mouse movement:
  const mouse = {
    x: 0,
    y: 0,

    handleMouseMove: function(event) {
      // Get the mouse position and normalize it to [-1, 1]
      mouse.x = (event.clientX / $(window).width()) * 2 - 1;
      mouse.y = (event.clientY / $(window).height()) * 2 - 1;
    },
  };

  document.onmousemove = mouse.handleMouseMove;

  function getImage() {
    // Capture the current image in the eyes canvas as a tensor.
    return tf.tidy(function() {
      const image = tf.fromPixels($('#eyes')[0]);
      // Add a batch dimension:
      const batchedImage = image.expandDims(0);
      // Normalize and return it:
      return batchedImage
        .toFloat()
        .div(tf.scalar(127))
        .sub(tf.scalar(1));
    });
  }

  const dataset = {
    train: {
      n: 0,
      x: null,
      y: null,
    },
    val: {
      n: 0,
      x: null,
      y: null,
    },
  };

  function captureExample() {
    // Take the latest image from the eyes canvas and add it to our dataset.
    tf.tidy(function() {
      const image = getImage();
      const mousePos = tf.tensor1d([mouse.x, mouse.y]).expandDims(0);

      // Choose whether to add it to training (80%) or validation (20%) set:
      const subset = dataset[Math.random() > 0.2 ? 'train' : 'val'];

      if (subset.x == null) {
        // Create new tensors
        subset.x = tf.keep(image);
        subset.y = tf.keep(mousePos);
      } else {
        // Concatenate it to existing tensor
        const oldX = subset.x;
        const oldY = subset.y;

        subset.x = tf.keep(oldX.concat(image, 0));
        subset.y = tf.keep(oldY.concat(mousePos, 0));
      }

      // Increase counter
      subset.n += 1;
    });
  }

  $('body').keyup(function(event) {
    // On space key:
    if (event.keyCode == 32) {
      captureExample();

      event.preventDefault();
      return false;
    }
  });

  let currentModel;

  function createModel() {
    const model = tf.sequential();

    model.add(
      tf.layers.conv2d({
        kernelSize: 5,
        filters: 20,
        strides: 1,
        activation: 'relu',
        inputShape: [$('#eyes').height(), $('#eyes').width(), 3],
      }),
    );

    model.add(
      tf.layers.maxPooling2d({
        poolSize: [2, 2],
        strides: [2, 2],
      }),
    );

    model.add(tf.layers.flatten());

    model.add(tf.layers.dropout(0.2));

    // Two output values x and y
    model.add(
      tf.layers.dense({
        units: 2,
        activation: 'tanh',
      }),
    );

    // Use ADAM optimizer with learning rate of 0.0005 and MSE loss
    model.compile({
      optimizer: tf.train.adam(0.0005),
      loss: 'meanSquaredError',
    });

    return model;
  }

  function fitModel() {
    let batchSize = Math.floor(dataset.train.n * 0.1);
    if (batchSize < 4) {
      batchSize = 4;
    } else if (batchSize > 64) {
      batchSize = 64;
    }

    if (currentModel == null) {
      currentModel = createModel();
    }

    currentModel.fit(dataset.train.x, dataset.train.y, {
      batchSize: batchSize,
      epochs: 20,
      shuffle: true,
      validationData: [dataset.val.x, dataset.val.y],
    });
  }

  $('#train').click(function() {
    fitModel();
    document.getElementById("inputtext").innerHTML = "";
  });

  function moveTarget() {

    if(first >= 2000 && checkifgroup == 0)
    {
      console.log("Working");
      var kk = document.getElementById('one').getElementsByTagName('h1')[0].innerHTML;
      first = 0;
      blink = 1;
      console.log(kk);
      var jj = document.getElementById("inputtext");
      jj.innerHTML = jj.innerHTML + kk;
    }

    else if(second >= 2000 && checkifgroup == 0)
    {
      console.log("Working");
      var kk = document.getElementById('two').getElementsByTagName('h1')[0].innerHTML;
      second = 0;
      blink = 1;
      console.log(kk);
      var jj = document.getElementById("inputtext");
      jj.innerHTML = jj.innerHTML + kk;
    }
    else if(third >= 2000 && checkifgroup == 0)
    {
      console.log("Working");
      var kk = document.getElementById('three').getElementsByTagName('h1')[0].innerHTML;
      third = 0;
      blink = 1;
      console.log(kk);
      var jj = document.getElementById("inputtext");
      jj.innerHTML = jj.innerHTML + kk;
    }
    else if(fourth >= 2000 && checkifgroup == 0)
    {
      console.log("Working");
      var kk = document.getElementById('four').getElementsByTagName('h1')[0].innerHTML;
      fourth = 0;
      blink = 1;
      console.log(kk);
      var jj = document.getElementById("inputtext");
      jj.innerHTML = jj.innerHTML + kk;
    }
    else if(fifth >= 2000 && checkifgroup == 0)
    {
      console.log("Working");
      var kk = document.getElementById('five').getElementsByTagName('h1')[0].innerHTML;
      fifth = 0;
      blink = 1;
      console.log(kk);
      var jj = document.getElementById("inputtext");
      jj.innerHTML = jj.innerHTML + kk;
    }



    if (currentModel == null) {
      return;
    }
    tf.tidy(function() {
      const image = getImage();
      const prediction = currentModel.predict(image);

      // Convert normalized position back to screen position:
      const targetWidth = $('#target').outerWidth();
      const targetHeight = $('#target').outerHeight();
      const x =
        ((prediction.get(0, 0) + 1) / 2) * ($(window).width() - targetWidth);
      const y =
        ((prediction.get(0, 1) + 1) / 2) * ($(window).height() - targetHeight);

      // Move target there:
      const $target = $('#target');
      $target.css('left', x + 'px');
      $target.css('top', y + 'px');
     
      if(x>850 && y<220)
      {
        document.activeElement.blur();
        ide = "two"
        onfocusclass(ide);
        if(checkifgroup==1)
        {
             clearBox2();
            checkifgroup=0;
        }
        second = second + 100;
      }
      else if(x<400 && y<220)
      {
        document.activeElement.blur();
        ide = "one"
        onfocusclass(ide);
        if(checkifgroup==1)
        {
             clearBox1();
            checkifgroup=0;
        }
        first = first + 100;

      }
      else if(x>400 && x<850 && y>210 && y < 400 )
      {
        document.activeElement.blur();
        ide = "three"
        onfocusclass(ide);
        if(checkifgroup==1)
        {
             clearBox3();
            checkifgroup=0;
        }
        
        third = third + 100;
      }
      else if(x<400 && y>400 )
      {
        document.activeElement.blur();
        ide = "four"
        onfocusclass(ide);
        if(checkifgroup==1)
        {
             clearBox4();
            checkifgroup=0;
        }
        
        fourth = fourth + 100;
      }
      else if(x>850 && y>400 )
      {
        document.activeElement.blur();
        ide = "five"
        onfocusclass(ide);
        if(checkifgroup==1)
        {
            clearBox5();
            checkifgroup=0;
        }
        fifth = fifth + 100;
      }
      else
      {
        document.activeElement.blur();
        if(checkifgroup==0 && blink == 1)
        {
          clearBox();
          checkifgroup=1;
          checkifclick=0;
          blink = 0;
        };
      }

    });
  }


  function onfocusclass(id)
  {
    document.getElementById(id).focus();

  }
  function clearBox()
  {
      document.getElementById("one").innerHTML ='<div class="row"><div class="col-md-4"><h1>A</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>B</h1></div></div><div class="row"><div class="col-md-4"></div><div class="col-md-4"><h1>C</h1></div><div class="col-md-4"></div></div><div class="row"><div class="col-md-4"><h1>D</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>E</h1></div></div>' ;
      document.getElementById("two").innerHTML ='<div class="row"><div class="col-md-4"><h1>F</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>G</h1></div></div><div class="row"><div class="col-md-4"></div><div class="col-md-4"><h1>H</h1></div><div class="col-md-4"></div></div><div class="row"><div class="col-md-4"><h1>I</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>J</h1></div></div>' ;
      document.getElementById("three").innerHTML = '<div class="row"><div class="col-md-4"><h1>K</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>L</h1></div></div><div class="row"><div class="col-md-4"></div><div class="col-md-4"><h1>M</h1></div><div class="col-md-4"></div></div><div class="row"><div class="col-md-4"><h1>N</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>O</h1></div></div>' ;
      document.getElementById("four").innerHTML = '<div class="row"><div class="col-md-4"><h1>P</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>Q</h1></div></div><div class="row"><div class="col-md-4"></div><div class="col-md-4"><h1>R</h1></div><div class="col-md-4"></div></div><div class="row"><div class="col-md-4"><h1>S</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>T</h1></div></div>' ;
      document.getElementById("five").innerHTML = '<div class="row"><div class="col-md-4"><h1>U</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>V</h1></div></div><div class="row"><div class="col-md-4"></div><div class="col-md-4"><h1>W</h1></div><div class="col-md-4"></div></div><div class="row"><div class="col-md-4"><h1>X</h1></div><div class="col-md-4"></div><div class="col-md-4"><h1>Y</h1></div></div>' ;
  }



  function clearBox1()
    {
        document.getElementById("one").innerHTML = "";

        document.getElementById("one").innerHTML = '<h1 style="padding:60px;padding-left:120px;">A</h1>';

        document.getElementById("two").innerHTML = "";

        document.getElementById("two").innerHTML = '<h1 style="padding:60px;padding-left:120px;">B</h1>';

        document.getElementById("three").innerHTML = "";

        document.getElementById("three").innerHTML = '<h1 style="padding:60px;padding-left:120px;">C</h1>';

        document.getElementById("four").innerHTML = "";

        document.getElementById("four").innerHTML = '<h1 style="padding:60px;padding-left:120px;">D</h1>';

        document.getElementById("five").innerHTML = "";

        document.getElementById("five").innerHTML = '<h1 style="padding:60px;padding-left:120px;">E</h1>';
    }

    function clearBox2()
    {
        document.getElementById("one").innerHTML = "";

        document.getElementById("one").innerHTML = '<h1 style="padding:60px;padding-left:120px;">F</h1>';

        document.getElementById("two").innerHTML = "";

        document.getElementById("two").innerHTML = '<h1 style="padding:60px;padding-left:120px;">G</h1>';

        document.getElementById("three").innerHTML = "";

        document.getElementById("three").innerHTML = '<h1 style="padding:60px;padding-left:120px;">H</h1>';

        document.getElementById("four").innerHTML = "";

        document.getElementById("four").innerHTML = '<h1 style="padding:60px;padding-left:120px;">I</h1>';

        document.getElementById("five").innerHTML = "";

        document.getElementById("five").innerHTML = '<h1 style="padding:60px;padding-left:120px;">J</h1>';
    }

    function clearBox3()
    {
        document.getElementById("one").innerHTML = "";

        document.getElementById("one").innerHTML = '<h1 style="padding:60px;padding-left:120px;">K</h1>';

        document.getElementById("two").innerHTML = "";

        document.getElementById("two").innerHTML = '<h1 style="padding:60px;padding-left:120px;">L</h1>';

        document.getElementById("three").innerHTML = "";

        document.getElementById("three").innerHTML = '<h1 style="padding:60px;padding-left:120px;">M</h1>';

        document.getElementById("four").innerHTML = "";

        document.getElementById("four").innerHTML = '<h1 style="padding:60px;padding-left:120px;">N</h1>';

        document.getElementById("five").innerHTML = "";

        document.getElementById("five").innerHTML = '<h1 style="padding:60px;padding-left:120px;">O</h1>';
    }

    function clearBox4()
    {
        document.getElementById("one").innerHTML = "";

        document.getElementById("one").innerHTML = '<h1 style="padding:60px;padding-left:120px;">P</h1>';

        document.getElementById("two").innerHTML = "";

        document.getElementById("two").innerHTML = '<h1 style="padding:60px;padding-left:120px;">Q</h1>';

        document.getElementById("three").innerHTML = "";

        document.getElementById("three").innerHTML = '<h1 style="padding:60px;padding-left:120px;">R</h1>';

        document.getElementById("four").innerHTML = "";

        document.getElementById("four").innerHTML = '<h1 style="padding:60px;padding-left:120px;">S</h1>';

        document.getElementById("five").innerHTML = "";

        document.getElementById("five").innerHTML = '<h1 style="padding:60px;padding-left:120px;">T</h1>';
    }

    function clearBox5()
    {
        document.getElementById("one").innerHTML = "";

        document.getElementById("one").innerHTML = '<h1 style="padding:60px;padding-left:120px;">U</h1>';

        document.getElementById("two").innerHTML = "";

        document.getElementById("two").innerHTML = '<h1 style="padding:60px;padding-left:120px;">V</h1>';

        document.getElementById("three").innerHTML = "";

        document.getElementById("three").innerHTML = '<h1 style="padding:60px;padding-left:120px;">W</h1>';

        document.getElementById("four").innerHTML = "";

        document.getElementById("four").innerHTML = '<h1 style="padding:60px;padding-left:120px;">X</h1>';

        document.getElementById("five").innerHTML = "";

        document.getElementById("five").innerHTML = '<h1 style="padding:60px;padding-left:120px;">Y</h1>';
    }




  setInterval(moveTarget, 100);
});
