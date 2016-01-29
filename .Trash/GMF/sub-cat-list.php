<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GMF.com | Product</title>
	
	<!--==| Fonts files |==-->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	
	<!--==| Font awesome |==-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
		
	<!-- Revolution slider css -->
	<link href="js/rs-plugin/css/settings.css" rel="stylesheet" />

	<!-- image zoom -->
	<link rel="stylesheet" href="css/glasscase.css">
	
	<!--==| Bootstrap css |==-->
    <link rel="stylesheet" href="css/bootstrap.css">
	
	<!--==| Theme files |==-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

	<!--==| Favicons |==-->
	<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
	<link rel="shortcut icon" type="image/ico" href="images/favicon.ico"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="shop_left">
    <?php
			$page = "primary-grid";
			$subpage = "Primary-Grid";
		  	include("header.php"); 
		  	$category_id_post = $_GET['id'];
		  	?>
<div class="header_bottom_area blog_page shop_page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="bread-title">Sub Categories </h1>
				</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--==| shop main Start |==-->
	<section class="content_wrapper">

		 <div  class="breadcrumbs">
    				 <p><a href="sub-cat-list.php?id=<?php echo $category_id_post;?>" /><?php echo get_category_name($category_id_post)?> / </a></a>  </p>
		 </div>


		<div class="container">
			<div class="row">
			
			<!--==| shop sidebar Start |==-->
				<div class="col-md-3 col-sm-3 col-xs-12">
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>


					<div class="home_three_sidebar">
						<div class="categories">
							<div class="categories_title"> 
								<div class="anav-left"><i class="fa fa-bars"></i></div> 
								<span>Categories</span> 
							</div>
							<div class="cat_nav">
								<ul>

									<?php 
										$sql = "SELECT * FROM Categories";
										$result = mysqli_query($con, $sql);
										$count = 0;
					                    while($category = mysqli_fetch_array($result)) { 
					                    	$category_id = $category['category_id'];
					                    	
									?>
									
											<li>
												<span class="cat_nav_item"><?php echo $category['category_name'];?></span>
												<span class=<?php echo '"holder holder0'.$count.'"' ?> ></span>
												<ul class=<?php echo '"cat_csub cat_csub0'.$count.' "' ?>  >
													<?php 	$sql2 = "SELECT * FROM Products WHERE product_category = $category_id";
					                    					$result2 = mysqli_query($con, $sql2);
					                    					$used_cats = array();
					                    					while($product = mysqli_fetch_array($result2)) { 
					                    						if (!(in_array($product['product_subcategory'], $used_cats))) { ?>
																    <li><a href=<?php echo '"sub-cat-products.php?cat_id='.$category['category_id'].'&sub_cat_id='.$product['product_subcategory'].'"'?>><?php echo get_sub_category_name($product['product_subcategory']); ?></a></li>
																<?php }
												
													array_push($used_cats, $product['product_subcategory'] );
													}
													?>
												</ul>
											</li>
									<?php 
									$count++;
									 } ?>
									
								</ul>
							</div>
						</div>
						
						
					</div>
				</div>
				<!--==| shop sidebar END |==-->
				<?php 
					$the_id = $_GET['id'] ;
					$sql = "SELECT * FROM Categories WHERE category_id = $the_id";
					$result = mysqli_query($con, $sql);
                    if($category = mysqli_fetch_array($result)) { 
					       $category_id = $category['category_id'];
                    	
				?>


				<div class="col-md-9 col-sm-9 col-xs-12">
					<!--==| Feature Start |==-->
					<div class="featured_area">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
                            <h2 align="center"><?php echo $category['category_name']; ?></h2>
                            <br /><br />
						
			
								
								<div class="row">
									<div class="featered_products">

										<!--  START INDIVIDUAL -->


										<?php 
										$sql2 = "SELECT * FROM Products WHERE product_category = $category_id ORDER BY product_date asc";
					    				$result2 = mysqli_query($con, $sql2);
					    				$used_cats = array();
					    				while($product = mysqli_fetch_array($result2)) { 
					            			if (!(in_array($product['product_subcategory'], $used_cats))) {
					                    			
					                    			$sub_cat_id2 = $product['product_subcategory']; ?>
	

														<div class="col-md-4 col-sm-4 col-xs-12">
															<a href=<?php echo '"sub-cat-products.php?cat_id='.$category['category_id'].'&sub_cat_id='.$sub_cat_id2.'"'?>>
															  <div class="single_featured_product">
																	<div class="image_feature_change">
																		<div style="min-height:300px; max-height:300px;"  class="featured_img">
																			<div class="image-overlay"></div>
																			<img style="min-height:300px; max-height:300px;"src=<?php echo '"backend/'.$product['product_image'].'"' ?>  alt="" />
																		</div>
																		<div style="min-height:300px;"  class="single_feature_img_hover">
																			<div  class="image-overlay"></div>
																			<img style="min-height:300px; max-height:300px;" src=<?php echo '"backend/'.$product['product_image'].'"'?> alt="" />
																		</div>
																	</div>
																
																	<div class="featured_info">
																		<a href=<?php echo '"sub-cat-products.php?cat_id='.$category['category_id'].'&sub_cat_id='.$sub_cat_id2.'"'?>><?php echo get_sub_category_name($product['product_subcategory'])?></a>
																	</div>
																</div>	
															</a>
														</div>

													<?php
												}
												array_push($used_cats, $product['product_subcategory'] );
												} ?>

										<!-- END INDIVIDUAL -->
										
									</div>
								</div>

								<?php }?>
							</div>
						</div>
					</div>
					<!--==| Feature End |==-->
				</div>
			</div>
		</div>
	</section>
    <!--==| shop main END |==-->
	

	
    
    <?php
			$page = "primary-grid";
			$subpage = "Primary-Grid";
		  	include("footer.php"); 
		  	?>
	
	
	<!--==| Latest jQuery |==-->
	<script src="js/jQuery-2.1.4.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 150,
		  max: 1500,
		  values: [ 520, 1100 ],
		  slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		  }
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	  });
	  </script>
	
	<!--==| Revolution slider js|==-->
	 <script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	 <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	 <script src="js/rev-settings.js"></script>
	
	<!--==| Owl Carousel js|==-->
	 <script src="js/owl.carousel.min.js"></script>
	
	<!--==| Bootstrap jQuery |==-->
    <script src="js/bootstrap.min.js"></script>
	
	<!--==| Opacity & Other IE fix for older browser |==-->
	<!--[if lte IE 8]>
		<script type="text/javascript" src="js/ie-opacity-polyfill.js"></script>
	<![endif]-->
	
	<!--==| Theme jQuery |==-->
    <script src="js/main.js"></script>
  </body>
</html>