<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url('assets/css/frontpage.css');?>">
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<div class="container-fluid home-main">
		<h1 style="font-family: 'Caveat Brush', cursive;
    font-weight: normal; font-size: 80px;">VOICEvis <span class="blinker">.</span> <span class="blinker">.</span></h1>
	</div>
	<div class="container-fluid home-content1">
		<div class="row">
			<div id="1" class="col-md-6 content1-left ">
				<h3 style="font-family: 'Caveat Brush', cursive;
    font-weight: normal; font-size: 60px; color: red;">yt VOICE<span class="blinker"> !</span></h3>
				<p>Provides all the youtube videos on a single platform controlled by voice.<br>Adds up to your ease !</p>
				<!-- <div class="content1-left"></div> -->
			</div>
			<div id="2" class="col-md-6 content1-right">
				<h3 style="font-family: 'Caveat Brush', cursive;
    font-weight: normal; font-size: 60px;" >news VOICE<span class="blinker"> !</span></h3>
				<p>Provides the top headlines from all over the world just on your call.</p>
			</div>
		</div>
	</div>
	<div class="container-fluid home-content2">
		<p><span>VoiceVis</span> is Currently Under <span>Development</span> ,<span>Sorry</span> for the errors.</p>
	</div>


	<script>
		$("#1").click(function()
		{
    		window.location.href = "http://127.0.0.1/hci/VideoPageController"
		});

		$("#2").click(function()
		{
    		window.location.href = "http://127.0.0.1/hci/LandingPageController"
		});
	</script>