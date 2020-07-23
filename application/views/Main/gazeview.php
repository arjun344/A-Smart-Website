

<!doctype html>
<html>
<head>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.12.0"></script>
    <script src="<?php echo base_url('assets/js/clmtrackr.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/maingaze.js'); ?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/maingaze.css'); ?>">
</head>
<body>
 <!--  <div id="textview" style="margin-left:650px;">Arjun</div> -->

    <div style="visibility:hidden;" id="vid">
        <div id="vidheader">Click here to move</div>
        <video id="webcam" width="250" height="200" autoplay></video>
        <canvas id="overlay" width="250" height="200"></canvas>
    </div>   
  
    <button class="btn btn-success" id="train">Train!</button>
    <button onclick="window.location='http://localhost/hci/EyeController'" style="margin-top: 70px;" class="btn btn-success" id="blink">Blink Type</button>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div tabindex="1"  class="wrimagecard wrimagecard-topimage">

                        <div  style="padding: 0; padding-left: 30px;" class="wrimagecard-topimage_title">
                          <div id="one" class="container-fluid">
                            <div class="row">
                              <div class="col-md-4">
                                  <h1>A</h1>
                              </div>
                               <div class="col-md-4">
                                  
                              </div>
                               <div class="col-md-4">
                                  <h1>B</h1>
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                               <div class="col-md-4">
                                  <h1>C</h1>
                              </div>
                               <div class="col-md-4">  
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                                <h1>D</h1>
                              </div>
                               <div class="col-md-4">
                                 
                              </div>
                               <div class="col-md-4"> 
                                <h1>E</h1> 
                              </div>
                            </div>  
                          </div>
                        </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <h1 id="inputtext">...............INPUT................</h1>
        </div>
        <div class="col-md-4 col-sm-4">
          <div  tabindex="2"  class="wrimagecard wrimagecard-topimage">
          
                        <div style="padding: 0; padding-left: 30px;" class="wrimagecard-topimage_title">
                          <div id="two" class="container-fluid">
                            <div class="row">
                              <div class="col-md-4">
                                  <h1>F</h1>
                              </div>
                               <div class="col-md-4">
                                  
                              </div>
                               <div class="col-md-4">
                                  <h1>G</h1>
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                               <div class="col-md-4">
                                  <h1>H</h1>
                              </div>
                               <div class="col-md-4">  
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                                <h1>I</h1>
                              </div>
                               <div class="col-md-4">
                                 
                              </div>
                               <div class="col-md-4"> 
                                <h1>J</h1> 
                              </div>
                            </div>  
                          </div>
                        </div>
          </div>
        </div>
      </div>

       <div class="row">
         <div class="col-md-4 col-sm-4">
        </div>
        <div class="col-md-4 col-sm-4">
          <div  tabindex="3"   class="wrimagecard wrimagecard-topimage">
                        <div style="padding: 0; padding-left: 30px;" class="wrimagecard-topimage_title">
                          <div id="three" class="container-fluid">
                            <div class="row">
                              <div class="col-md-4">
                                  <h1>K</h1>
                              </div>
                               <div class="col-md-4">
                                  
                              </div>
                               <div class="col-md-4">
                                  <h1>L</h1>
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                               <div class="col-md-4">
                                  <h1>M</h1>
                              </div>
                               <div class="col-md-4">  
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                                <h1>N</h1>
                              </div>
                               <div class="col-md-4">
                                 
                              </div>
                               <div class="col-md-4"> 
                                <h1>O</h1> 
                              </div>
                            </div>  
                          </div>
                        </div>
          </div>
        </div>
         <div class="col-md-4 col-sm-4">
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div tabindex="4"  class="wrimagecard wrimagecard-topimage">
                        <div style="padding: 0; padding-left: 30px;" class="wrimagecard-topimage_title">
                          <div id="four"  class="container-fluid">
                            <div class="row">
                              <div class="col-md-4">
                                  <h1>P</h1>
                              </div>
                               <div class="col-md-4">
                                  
                              </div>
                               <div class="col-md-4">
                                  <h1>Q</h1>
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                               <div class="col-md-4">
                                  <h1>R</h1>
                              </div>
                               <div class="col-md-4">  
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                                <h1>S</h1>
                              </div>
                               <div class="col-md-4">
                                 
                              </div>
                               <div class="col-md-4"> 
                                <h1>T</h1> 
                              </div>
                            </div>  
                          </div>
                        </div>

          </div>
        </div>
        <div class="col-md-4 col-sm-4">
        </div>
        <div  class="col-md-4 col-sm-4">
          <div  tabindex="5"  class="wrimagecard wrimagecard-topimage">
                        <div style="padding: 0; padding-left: 30px;" class="wrimagecard-topimage_title">
                          <div id="five"  class="container-fluid">
                            <div class="row">
                              <div class="col-md-4">
                                  <h1>U</h1>
                              </div>
                               <div class="col-md-4">
                                  
                              </div>
                               <div class="col-md-4">
                                  <h1>V</h1>
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                               <div class="col-md-4">
                                  <h1>W</h1>
                              </div>
                               <div class="col-md-4">  
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-4">
                                <h1>X</h1>
                              </div>
                               <div class="col-md-4">
                                 
                              </div>
                               <div class="col-md-4"> 
                                <h1>Y</h1> 
                              </div>
                            </div>  
                          </div>
                        </div>
          </div>
        </div>
      </div>
 <canvas id="eyes" width="50" height="25"></canvas>
<div id="target"></div>
</body>
</html>



<script>
dragElement(document.getElementById("vid"));
function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
