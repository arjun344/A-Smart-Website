<!DOCTYPE html>
<html>
<head>
	<title>EyeChat</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/eyetype.css'); ?>">
	
</head>
<body onload="onClickFunction()">

<div class="container-fluid">
	<!-- <button onclick="onClickFunction()">start</button>
	<button onclick="stop()">Stop</button>
	<button onclick="Blink()">Blink</button> -->

	<div class="row">

		<div class="col-md-2">	

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<video id="webcam" width="250" height="200" autoplay></video>
					    <canvas id="overlay" width="250" height="200"></canvas>
					    <style>
					        #webcam, #overlay {
					            position: absolute;
					            top: 0;
					            left: 0;
					            margin-left: -10px !important;
					        }
					    </style>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						 <button onclick="window.location='http://localhost/hci/EyeController/GazeView'" id="gaze" style=" font-size: 17px; margin-left: -18px; margin-top: 200px; min-width: 235px;" class="btn btn-success">Gaze Layout</button>
					</div>
				</div>

				<div style="margin-top:20px;" class="row">
					<div class="col-md-12">
						<div style="background-color:white; margin-left:-25px; min-width: 240px; min-height:100px;" class="wrimagecard wrimagecard-topimage">
				          <div style="padding:15px;" class="wrimagecard-topimage_title">
				            <h4 style="font-size:25px; color: black;">I need help,come to my room.</h4>
				          </div>
				    
				      </div>
					</div>
				</div>

				<div style="margin-top:15px;" class="row">
					<div class="col-md-12">
						<div style="background-color:white; margin-left:-25px; min-width: 240px; min-height:100px;" class="wrimagecard wrimagecard-topimage">
				          <div style="padding:12px;" class="wrimagecard-topimage_title">
				            <h4 style="font-size:25px; color:black;">Call my family.I want to meet them.</h4>
				          </div>
				    
				      </div>
					</div>
				</div>

				<div style="margin-top:15px;" class="row">
					<div class="col-md-12">
						<div style="background-color:white; margin-left:-25px; min-width: 240px; min-height:100px;" class="wrimagecard wrimagecard-topimage">
				          <div style="padding:12px;" class="wrimagecard-topimage_title">
				            <h4 style="font-size:25px; color:black;">I need food / water.</h4>
				          </div>
				    
				      </div>
					</div>
				</div>
			</div>


		</div>
		<div class="col-md-10">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="inputview">
				          <div class="wrimagecard-topimage_title">
							<h2 id="viewtype"></h2>
				          </div>
				    	</div>
					</div>
				</div>
				<div class="row">
					<?php 

						$size=6;
						for($i=0;$i<$size;$i++)
						{
							?> 

							<div class="col-md-2 col-sm-4">
								<div id="<?php echo $i+1; ?>" tabindex="<?php echo $i+1; ?>" class="predictedwords" onfocus="myFunction()" title="">
						          <div class="wrimagecard-topimage_title ">
									<h5 style="margin-right: 5px !important;" id="pre<?php echo $i+1; ?>"></h5>
						          </div>
						    	</div>
		      				</div>

		      				<?php
						}


					 ?>
				</div>
				<div class="row">

					<?php 

						$size=36;
						for($i=0;$i<$size;$i++)
						{
							?>

							<div class="col-md-2 col-sm-4">
								<div id="<?php echo $i+7; ?>" tabindex="<?php echo $i+7; ?>" class="wrimagecard" onfocus="myFunction()" title="<?php echo $keys[$i];  ?>">
						          <div class="wrimagecard-topimage_title">
									<h3><?php echo $keys[$i];  ?></h3>
						          </div>
						    	</div>
		      				</div>

		      				<?php
						}


					 ?>
				    
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.12.0"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/clmtrackr.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js');?>"></script>
