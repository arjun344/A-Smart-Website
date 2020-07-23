<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/materialize.min.css');?>"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body onload="init();">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
    <nav>
       <div class="nav-wrapper black">
          <a href="#" class="brand-logo center">B L I N K</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="http://localhost/hci/EyeController/SignUp">SignUp</a></li>
            <li class="active"><a href="#">Login</a></li>
          </ul>
        </div>
      </nav>
      
      <div class="container">
            <div class="card center">
 
                    <div class="card-content">
                            <div class="card-action">
                                <a class="btn-floating btn-large waves-effect waves-light black" onclick="snapshot();"><i class="material-icons">touch_app</i></a>
                                <h5><b>Login</b></h5>
                            </div>
                            <div class="input-field col s6">
                                    <input type="hidden" placeholder="Enter IP Address" type="text" class="validate" id="ip">
                            </div>
                            <p>
                                <video onclick="snapshot(this);" width=300 height=300 id="video" autoplay></video>
                                <br>
                                <canvas  id="myCanvas" width="300" height="220"></canvas>
                            </p>
                    </div>
                    <audio id="myAudio">
                            <source src="success.wav" type="audio/wav">
                    </audio>

                  </div>
      </div>
  </body>
  <script type="text/javascript">

        navigator.getUserMedia = ( navigator.getUserMedia ||
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);

    var video;
    var webcamStream;

  
  video = document.getElementById('video');
  var facingMode = "user";
  var constraints = {
  audio: false,
  video: {
      facingMode: facingMode
  }
};
  navigator.mediaDevices.getUserMedia(constraints).then(function success(stream) {
          video.srcObject = stream;
          });


    var canvas, ctx;

    function init() {
      // Get the canvas and obtain a context for
      // drawing in it
      canvas = document.getElementById("myCanvas");
      ctx = canvas.getContext('2d');
    }

    function snapshot() {
        ctx.drawImage(video, 0,0, canvas.width, canvas.height);
        var img1 = new Image();
        img1.src = canvas.toDataURL();
        var ip = document.getElementById('ip').value;
        var x = document.getElementById("myAudio"); 
        datad = "{\r\n    \"image\":\"" + img1.src+ "\",\r\n    \"gallery_name\":\"CV\"\r\n}"
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.kairos.com/recognize",
            "method": "POST",
            "headers": {
                "content-type": "application/json",
                "app_id": "1dce018a",
              "app_key": "1005abbd099b082ee70446997b10e1a7",
                "cache-control": "no-cache"
            },
            "processData": false,
            "data": datad
        }
        $.ajax(settings).done(function (response) {
            var m = response;
            console.log(JSON.stringify(m).indexOf("success"));
            if(JSON.stringify(m).indexOf("success") > -1) {
                Materialize.toast('Welcome : ' +JSON.stringify(m.images[0].candidates[0].subject_id), 6000);
                 
                console.log(m.images[0].candidates[0].subject_id);

                setTimeout(function() 
                {
                    window.location = "http://localhost/hci/EyeController";
                  },2000);

              
            }
            else{
                Materialize.toast('User Not identified');
            }
        });
    }
</script>
</html>