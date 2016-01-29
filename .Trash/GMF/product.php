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
    <title>GMF.ie | Product </title>
	
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
			$page = "product";
			$subpage = "Product";
		  	include("header.php"); 
		  	$product_id = $_GET['id'];
		  	?>
    
	
    <!--==| header bottom Start |==-->
	<div class="header_bottom_area blog_page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="bread-title">Product</h1>
				</div>
				</div>

			</div>

		</div>

		

	</div>
	

    <!--==| header bottom End |==-->
	
	<?php 	$sql = "SELECT * FROM Products WHERE product_id = '$product_id'";
			$result = mysqli_query($con, $sql);
			if($product = mysqli_fetch_array($result)) { 
	?>	

	<div  class="breadcrumbs">
		<p><a href="sub-cat-list.php?id=<?php echo $product['product_category'];?>" /><?php echo get_category_name($product['product_category'])?></a> / <a href="sub-cat-products.php?cat_id=<?php echo $product['product_category'];?>&sub_cat_id=<?php echo $product['product_subcategory'];?>" /><?php echo get_sub_category_name($product['product_subcategory'])?></a> / <a href="product.php?id=<?php echo $product['product_id']; ?> "/><?php echo $product['product_name']; ?></a> </p>
	</div>	
	<!--==| Shop main wrapper Start |==-->
	<section class="content_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!--==| Feature Start |==-->
					<div class="shop_left_detaial">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="single_product_image" >
                                        <input type="hidden" id="__VIEWxSTATE" />
						                <ul id='zoom1' class=''>
						                    <li>
						                        <img src=<?php echo '"backend/'.$product['product_image'].'"' ?> alt='image1' />
						                    </li>
						                    <?php if($product['product_id'] == 207)  include('ww-bench.php'); ?>
						                </ul>
                                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="nod_text">
									<h1><a href=""><b><?php  echo $product['product_name'] ?></b></a></h1>
									


									<?php 
									$sub_cat_id = $product['product_subcategory'];
									$sql = "SELECT * FROM Sub_Categories WHERE sub_cat_id = '$sub_cat_id'";
									$result2 = mysqli_query($con, $sql);
									if($sub_cat = mysqli_fetch_array($result2)) { 
									
									if ($sub_cat['brochure'] != "") { ?>			<!-- Brochure If Exists -->
					    				<a href="backend/<?php echo $sub_cat['brochure']; ?>" target="_blank"><h6 > View <?php echo $sub_cat['sub_name']; ?> Brochure Here </h6></a>
					    		     <?php } } ?>



									</br>
									<p><strong>Product Code:</strong> <?php  echo $product['product_code'] ?> </p>
                                    
									<p><?php echo nl2br($product['product_description']); ?>									
									</br> 
									</div>
									
									
									
									<div class="product_meta">
										<div class="cats">
										
											<p>Categories: <a href=<?php echo '"sub-cat-list.php?id='.$product['product_category'].'"'?>><?php echo get_category_name($product['product_category'])?></a> <a href=<?php echo '"sub-cat-products.php?cat_id='.$product['product_category'].'&sub_cat_id='.$product['product_subcategory'].'"'?>><?php echo get_sub_category_name($product['product_subcategory'])?></a></p>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="product_left_tab">
					<div>
					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					  	<?php if($product['product_id'] == 133) { ?>
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Colours Available</a></li>
						<?php }if($product['product_dimensions'] != "") { ?>
						<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">See Dimensions</a></li>
						<?php } ?>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
						<?php if($product['product_id'] == 133) { ?>
						<table>
								<tr>
									<td> <p style="text-indent: 3em;"><img src="images/Colour-black.png" alt="Colour-Black" height="42" width="42"> Black</p></td>
									<td> <p style="text-indent: 3em;"><img src="images/Colour-poppyred.png" alt="Colour-Black" height="42" width="42"> Poppy Red</p></td>
                                    <td> <p style="text-indent: 3em;"><img src="images/Colour-warmgrey.png" alt="Colour-Black" height="42" width="42"> Grey Hills</p></td>
                                    <td> <p style="text-indent: 3em;"><img src="images/Colour-marineteal.png" alt="Colour-Black" height="42" width="42"> Slate</p></td>
                                    <td> <p style="text-indent: 3em;"><img src="images/Colour-cottonwood.png" alt="Colour-Black" height="42" width="42"> Lime</p></td>
                                    <td> <p style="text-indent: 3em;"><img src="images/Colour-flannel.png" alt="Colour-Black" height="42" width="42"> Tangerine</p></td>
                                    <td> <p style="text-indent: 3em;"><img src="images/Colour-sunburst.png" alt="Colour-Black" height="42" width="42"> Grape</p></td>
								</tr>
								<tr>
									<td> <p style="text-indent: 3em;"><img src="images/Colour-black.png" alt="Colour-Black" height="42" width="42"> Yellow</p></td>
									<td> <p style="text-indent: 3em;"><img src="images/Colour-poppyred.png" alt="Colour-Black" height="42" width="42"> Shadow</p></td>
                                    <td> <p style="text-indent: 3em;"><img src="images/Colour-warmgrey.png" alt="Colour-Black" height="42" width="42"> Green</p></td>
                                    <td> <p style="text-indent: 3em;"><img src="images/Colour-marineteal.png" alt="Colour-Black" height="42" width="42"> Blue</p></td>
                           
								</tr>
					
							</table> 
						<? } ?>
						
						</div>

					
						<div role="tabpanel" class="tab-pane" id="messages">
						
						</br>
						<p>
						<?php echo nl2br($product['product_dimensions']); ?>
						</p>
								
						</div>
					  </div>

					</div>
					</div>
					
					<!--==| Latest product start |==-->
					

										<?php 
										$sub = $product['product_subcategory'];
										$cat = $product['product_category'];
										$sql2 = "SELECT * FROM Products WHERE product_category = '$cat' AND product_subcategory = '$sub'";
										$result2 = mysqli_query($con, $sql2);
										if(mysqli_num_rows($result2)>1) { ?>
											<section class="latest_product_area">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="common_heading">
														<h2>Related products</h2>
													</div>


													<div class="latest_product">
														<div id="latest-product-caro">
										<?php while($related = mysqli_fetch_array($result2)) { 
											if($related['product_id'] != $product['product_id']) {
										?>
											  
												  <div class="item">
														<div class="single_featured_product">
															<div class="image_feature_change">
																<div class="featured_img">
																	<div class="image-overlay"></div>
																	<img src=<?php echo '"backend/'.$related['product_image'].'"' ?>  alt="" />
																</div>
																<div class="single_feature_img_hover">
																	<div class="image-overlay"></div>
																	<img src=<?php echo '"backend/'.$related['product_image'].'"' ?>  alt="" />
																</div>
															</div>
														
															<div class="search-icon">
																<a class="fa fa-search" href=<?php echo '"product.php?id='.$product['product_id'].'"'?>></a> 
															</div>
															
															<div class="featured_info">
																<a href=<?php echo '"product.php?id='.$related['product_id'].'"'?>><?php echo $related['product_name'];?></a>
																
															</div>
														</div>
												  </div>
										<?php 
											}
											}

										?>
					
									</div>
								</div>
							</div>
						</div>
					</section>
					<?php } }?>
					<!--==| Latest product END |==-->
				</div>
			</div>
		</div>
	</section>
   <!--==| Shop main wrapper END |==-->
	
 
	
    <?php
			$page = "product";
			$subpage = "Product";
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