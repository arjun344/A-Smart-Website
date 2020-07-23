<!doctype html>
<html lang="en">
<head>
	
	<title>Landing Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<!-- css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/mainres.css');?>" media="screen and (max-width: 900px)">
	
</head>
<body>


	<div class="container-fluid navtop" title="navbar">
		<ul class="row navitems">
			<li class="col-md-2 col-sm-3 col-4">
				<a class="tabable" id="gen" tabindex="2" href="<?php echo base_url('LandingPageController');?>" onfocus="readnav()" title="General">General</a>
			</li>
			<li class="col-md-2 col-sm-3 col-4">
				<a class="tabable" id="tech" tabindex="3" href="<?php echo base_url('LandingPageController/Technology');?>" onfocus="readnav()" title="Technology">Techno</a>
			</li>
			<li class="col-md-2 col-sm-3 col-4">
				<a class="tabable" id="busin" tabindex="4" href="<?php echo base_url('LandingPageController/Business');?>" onfocus="readnav()" title="Business">Business</a>s
			</li>
			<li class="col-md-2 col-sm-3 col-4">
				<a class="tabable" id="enter"  tabindex="5" href="<?php echo base_url('LandingPageController/Entertainment');?>" onfocus="readnav()" title="Entertainment">Entertainment</a>
			</li>
			<li class="col-md-2 col-sm-3 col-4">
				<a class="tabable" id="sports"  tabindex="6" href="<?php echo base_url('LandingPageController/Sports');?>" onfocus="readnav()" title="Sports">Sports</a>
			</li>
			<li class="col-md-2 col-sm-3 col-4">
				<a class="tabable" id="health"  tabindex="7" href="<?php echo base_url('LandingPageController/Health');?>" onfocus="readnav()" title="Health">Health</a>
			</li>
			
		</ul>
	</div>

	<div class="search container h-100">
      <div class="d-flex justify-content-center h-100">
        <div tabindex="8" class="searchbar" style="float: right;">
          <input id="inputsearch" class="search_input" type="text" name="" placeholder="Search...">
          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
      </div>
    </div>
