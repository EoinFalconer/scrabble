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
    <title>GMF.com | Special Offers</title>
	
	<!--==| Fonts files |==-->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	
	<!--==| Font awesome |==-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	
	<!--==| Owl Carousel css |==-->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
		
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
		  	?>
			<div class="header_bottom_area blog_page shop_page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="bread-title">Offers </h1>
				</div>
				</div>
			</div>
		</div>
	</div>
    <!--==| header bottom End |==-->
	
	<!--==| main blog start |==-->
	<div class="blog_right_sidebar_area main_blog_area">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="cc_blog_right_sidebar main_blog">

						<h1 style="float:center">Special Offers:</h1>
						<br />

						<?php 
							$Date = new DateTime();
							$sql = "SELECT * FROM Special_Offers WHERE valid_from <= '".$Date->format("Y-m-d")."' and valid_to >= '".$Date->format("Y-m-d")."' ORDER BY valid_to desc";
							  $result = mysqli_query($con, $sql);
							  $count= 0;
                				while($offer = mysqli_fetch_array($result)) { 
                					$count = $count + 1;?>
									<div class="single_blog">
											<div class="blog_img">
												<?php 
												$product_category = "";
												if($offer['offer_product'] != 0) {
													$product = $offer['offer_product'];
													$sql2 = "SELECT * FROM Products WHERE product_id = '$product' ";
								  					$result2 = mysqli_query($con, $sql2);
								  					if($product = mysqli_fetch_array($result2)) { 
								  						$product_category = $product['product_category'];
													 	echo '<img style="width: 300px; height:300px; float: center;" src="backend/'.$product['product_image'].'" alt="" />';
													 } 
												}
												else {
													$category = $offer['offer_category'];
													$sql2 = "SELECT * FROM Categories WHERE category_id = '$category' ";
								  					$result2 = mysqli_query($con, $sql2);
								  					if($category = mysqli_fetch_array($result2)) { 
													 	echo '<img style="width: 300px; height:300px; float: center;" src="backend/'.$category['category_image'].'" alt="" />';
													 } 
												}
											?>
											</div>
											<div class="blog_text">
												<div class="row">
													<div class="col-md-2 col-sm-2 col-xs-5">
														<div class="b_t_left">
															<div class="post_date">
																<span><?php echo date('d', strtotime($offer['valid_to'])); ?></span>
																<p><?php 
																$month = date('m', strtotime($offer['valid_to']));
																echo get_month_name($month); 
																?></p>
																
															</div>
															<div class="meta_author">Valid To</div>
														</div>
													</div>
													<div class="col-md-10 col-sm-10 col-xs-7">
														<div class="b_t_right">
															<h2><?php echo $offer['offer_title']; ?></h2>
															<p><?php echo nl2br($offer['offer_description']); ?></p>
															<br />

															<?php if($offer['offer_product'] != 0) { ?>
																<h2><a href=<?php echo 'product.php?id='. $offer['offer_product']; ?>>Offer Product</a></h2>
																<p><?php echo get_product_name($offer['offer_product']); ?></p>
															<?php } else { ?>
																<h2><a href=<?php echo 'sub-cat-list.php?id='. $offer['offer_category']; ?>>Offer Category</a></h2>
																<p><?php echo get_category_name($offer['offer_category']); ?></p>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
											<div class="blog_text_bottom">
												<div class="blog_text_bottom_left">
													<div class="posted_in">
														<p>Posted in 
															<?php if($offer['offer_product'] != 0) { 
																echo "<a href='sub-cat-list.php?id=". $product_category."'>". get_category_name($product_category). "</a>";
															 } else {
																echo "<a href='sub-cat-list.php?id=". $offer['offer_category']."'>". get_category_name($offer['offer_category']). "</a>";
															 } ?></p>
													</div>
												</div>
												
											</div>
										</div>

						<?php }
						if ($count == 0) {
							?>
								<div class="single_blog">
									<h1>Currently No Special Offers</h1>
								</div>
							<?php
						} ?>
						
						
					</div>
				</div>
				<!--==| main blog left End |==-->
				
				<!--==| blog sidebar Start |==
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="blog_sidebar">
						<div class="blog_category">
							<h3>Categories</h3>
							<div class="bery-hr medium"></div>
							<div class="category_b_list">
								<ul>
									<li><a href="">Primary</a></li>
									<li><a href="">Secondary</a></li>
									<li><a href="">Further Education</a></li>
								</ul>
							</div>
						</div>
						<div class="recent_post">
							<h3>Recent Offers</h3>
							<div class="bery-hr medium"></div>
							<div class="recent_post_list">
								<ul>
									<li><a href="">Offer 1 </a></li>
									<li><a href="">Offer 2</a></li>
									<li><a href="">Offer 3</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->
				<!--==| blog sidebar End |==-->
			</div>
		</div>
	</div> 
	<!--==| main blog End |==-->
	
    <!--==| Home Service start |==-->

    <!--==| Home Service END |==-->
	
    <!--==| footer top start |==-->
   <!--==| Shop main wrapper END |==-->
	
   
	
   <?php
			$page = "contact";
			$subpage = "Contact";
		  	include("footer.php"); 
		  	?>
	
	
	<!--==| Latest jQuery |==-->
	<script src="js/jQuery-2.1.4.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>
	
	<!--==| Owl Carousel js|==-->
	 <script src="js/owl.carousel.min.js"></script>

	<!-- glasscase js -->
	<script src="js/jquery.glasscase.minf195.js"></script>
	
	<script type="text/javascript">
		$(function () {
			//ZOOM
			$("#zoom1").glassCase({ 'widthDisplay': 456, 'heightDisplay': 470, 'isSlowZoom': true });
		});
	</script>
	
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