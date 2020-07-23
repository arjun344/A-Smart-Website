<!DOCTYPE html>
<html>
<head>
  
  <title>Video Page</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
  
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/videopage.css');?>">
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<script src="https://www.youtube.com/iframe_api"></script>



  
</head>
<body>

  <h2><span>yt VOICE</span></h2>
  <div id="searchbarmov" class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div tabindex="1" id="search" class="searchbar">
          <input onfocus="" id="inputsearch"  class="search_input" type="text" name="" placeholder="Search...">
          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
      </div>
    </div>


  <div class="container-fluid newssection">
    <div class="row">
      <div tabindex="0" class="col-md-12" id="video-placeholder"></div>
      <?php 
          $size = 20;
      
          for($i=0;$i<$size;$i++)
          {
            if(array_key_exists('videoId',$viddata['items'][$i]['id']))
            {

            ?>

  <div onfocus="readtitle()" tabindex="<?php echo $i+1; ?>" class="col-md-3 ytvid tabable" id="<?php echo $viddata['items'][$i]['id']['videoId']; ?>" title="<?php echo $viddata['items'][$i]['snippet']['title'];?>">
        <div class="product-box border ">
            <div class="product-image">
                <!-- <iframe id="<?php //echo "video".$i; ?>" src="<?php //echo 'https://www.youtube.com/embed/'.$viddata['items'][$i]['id']['videoId'].'?autoplay=0&enablejsapi=1&showinfo=0&origin=http://localhost:8000';  ?>"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <img src="<?php echo $viddata['items'][$i]['snippet']['thumbnails']['medium']['url']; ?>">
                
            </div>
            <div class="product-body">
                <div class="sub-row" style="font-family: 'Open Sans', sans-serif;">
                    <h5><?php echo $viddata['items'][$i]['snippet']['title'];  ?></h5>
                </div>
                <div class="sub-row">
                   <ul class="list-inline list-unstyled">
                       <li class="list-inline-item"> <span style="max-width:150px; overflow-x: hidden;" class="badge badge-primary" ><?php echo $viddata['items'][$i]['snippet']['channelTitle'];  ?></span></li>
                   </ul>
                </div>
                
            </div>
        </div>
    </div>
            <?php
            }

          }

       ?>


    </div>

  </div>


</body>
</html>

<script type="text/javascript" src="<?php echo base_url('assets/js/artyom.window.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/artyom.window.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/artyom.min.js');?>"></script>

<script type="text/javascript">
  var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('video-placeholder', {
        height: 400,
        playerVars: {
            color: 'white',
        }
    });
}
</script>



<script>

  function readtitle()
  {
    var Jarvis = new Artyom();
    Jarvis.initialize({
          lang:"hi-IN",// More languages are documented in the library
         
          debug:true,//Show everything in the console
        });

  
        Jarvis.say(document.activeElement.title);
  }

</script>

<script type="text/javascript">
  

  window.onload = function() 
  {

    console.log("loading window....")

    const artyom = new Artyom();
    artyom.initialize({
         lang:"en-US",// More languages are documented in the library
          continuous:true,//if you have https connection, you can activate continuous 
          debug:true,//Show everything in the console
         listen:true, // Start listening when this function is triggered
         soundex:true,
        }).then(function(){
        artyom.say("VoiceVis has been correctly initialized");
        
    }).catch(function(){
        artyom.say("An error occurred during the initialization");
    });

    var commandPlay = {
      
        indexes:[new RegExp("play", "i")],
        smart:true,
        action:function(i)
        { 

          artyom.say("Playing Video");
          document.getElementById("searchbarmov").style.display = "none";  
          document.getElementById("video-placeholder").style.display = "block";
          console.log(document.activeElement.id);
          var vidid = document.activeElement.id;
          player.loadVideoById(vidid);
          player.playVideo();
            
        }
    };
    artyom.addCommands(commandPlay); 


    var commandMainPoint = {
          smart:true,
         indexes:[new RegExp("point", "i")],
        action:function(i,wildcard)
        { 
          var id=document.activeElement.tabIndex;
          
          var tabbables = document.querySelectorAll(".tabable"); //get all tabable elements
          
              artyom.say("Okay !");
              console.log(tabbables[i].tabIndex);
                  tabbables[0].focus(); //if it's the one we want, focus it and exit the loop
                
            
        }

       
    };
    artyom.addCommands(commandMainPoint); 
 

  var commandPause = {
    
        indexes:[new RegExp("pause", "i")],
        smart:true,
        action:function(i)
        { 

          artyom.say("Pausing Video");
          document.getElementById("searchbarmov").style.display = "block";   
          // document.getElementById("video-placeholder").style.display = "none";
    player.pauseVideo();
            
        }
    };
    artyom.addCommands(commandPause); 

    var commandstop = {
    
        indexes:[new RegExp("stop", "i")],
        smart:true,
        action:function(i)
        { 

          artyom.say("Closing Video");
          document.getElementById("searchbarmov").style.display = "block";   
          document.getElementById("video-placeholder").style.display = "none";
    player.pauseVideo();
            
        }
    };
    artyom.addCommands(commandstop); 


    var commandSearch = {
      smart:true,
        indexes:["Search for *"], 
        action:function(i,wildcard)
        { 
            document.getElementById("searchbarmov").style.display = "block";  
            var k = document.querySelectorAll(".searchbar");
            k[0].focus();
            console.log(document.activeElement.id);
            artyom.say("searching for" + wildcard.trim());
            document.getElementById("inputsearch").value = wildcard;
             window.location.href = "<?php echo site_url('VideoPageController/Search');?>?keyword="+wildcard;
        }
    };
    artyom.addCommands(commandSearch); 

    var commandmoveahead = {
      smart:true,
         indexes:[new RegExp("ahe*", "i")],
        action:function(i,wildcard)
        { 
          var id=document.activeElement.tabIndex;
          
          var tabbables = document.querySelectorAll(".tabable"); //get all tabable elements
          for(var i=0; i<tabbables.length; i++) 
          { //loop through each element
              if(tabbables[i].tabIndex == (id+1))
               { //check the tabindex to see if it's the element we want
              artyom.say("Going Ahead to Next Video");
              console.log(tabbables[i].tabIndex);
                  tabbables[i].focus(); //if it's the one we want, focus it and exit the loop
                  break;
              }
        }

        }


    };
    artyom.addCommands(commandmoveahead); 

         var commandmoveback = {
      smart:true,
         indexes:[new RegExp("bac*", "i")],
        action:function(i,wildcard)
        { 
          var id=document.activeElement.tabIndex;
          var tabbables = document.querySelectorAll(".tabable"); //get all tabable elements
          for(var i=0; i<tabbables.length; i++) 
          { //loop through each element
              if(tabbables[i].tabIndex == (id-1))
               { //check the tabindex to see if it's the element we want
              artyom.say("Going Back");
              console.log(tabbables[i].tabIndex);
                  tabbables[i].focus(); //if it's the one we want, focus it and exit the loop
                  break;
              }
        }

        }
    };
    artyom.addCommands(commandmoveback);
  }
</script>

<script >
  function readnav()
  {
    var Jarvis = new Artyom();
    Jarvis.initialize({
          lang:"hi-IN",// More languages are documented in the library
         
          debug:true,//Show everything in the console
        });

    
    Jarvis.say("Search Selected");
  }
</script>