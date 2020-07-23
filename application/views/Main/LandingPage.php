<?php include_once('Header.php'); ?>

	<div class="container-fluid newssection">
		<div class="row">

			<?php 
					$size = $data['totalResults'] ;

					if($size > 100)
					{
						$size = 100;
					}

					if($size < 1)
					{
						?>

					

							<div class="wrapper errordiv">
								<div class="container-fluid" id="top-container-fluid-nav">
									<div class="container">	
											<div class="jumbotron">
											<h1 class="display-1">0<i class="fa  fa-spin fa-cog fa-3x"></i> 0</h1>
											<h1 class="display-3">0 Results</h1> 	 
											</div>
											
					 				</div>
								</div>
							</div>

							<?php
						}

					
					for($i=0;$i<$size;$i++)
					{
						if($data['articles'][$i]['urlToImage'] != null)
						{

						?>

						<div id="<?php echo $i; ?>" class="col-md-3">
							<div class="tabable" onfocus="readnews()" tabindex="<?php echo(9+$i);?>" class="card-content" title="<?php echo $data['articles'][$i]['title'];?>">
			                    <div class="card-img">
			                        <img src="<?php echo $data['articles'][$i]['urlToImage'];?>" onerror="this.onerror=null;this.src='http://vollrath.com/ClientCss/images/VollrathImages/No_Image_Available.jpg';"" alt="">
			                        <span><h4>General</h4></span>
			                    </div>
			                    <div class="card-desc">
			                        <h4><?php echo $data['articles'][$i]['title'];?></h4>   
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

<?php include_once('Footer.php') ?>

