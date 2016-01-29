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
    <title>GMF | Project</title>
	
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
			$page = "contact";
			$subpage = "Contact";
		  	include("header.php"); 
		  	$project_id = $_GET['id'];

		  	$sql = "SELECT * FROM Projects WHERE project_id = '$project_id'";
		  	$result = mysqli_query($con, $sql);
			if($project = mysqli_fetch_array($result)) { 

		  	?>
    <!--==| header bottom Start |==-->
	<div style="background: rgba(0, 0, 0, 0) url('images/Top_Image.png');" class="header_bottom_area blog_page shop_page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="bread-title">Project </h1>
				</div>
				</div>
			</div>
		</div>
	</div>
    <!--==| header bottom End |==-->
	
	<!--==| Shop main wrapper Start |==-->
	<section class="content_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!--==| Feature Start |==-->
					<div class="shop_left_detaial">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="single_product_image">
                                        <input type="hidden" id="__VIEWxSTATE" />
						                <ul id='zoom1' class=''>
						                    <li>
						                        <img src=<?php echo '"backend/'.$project['image_url'].'"' ?> alt='image1' />
						                    </li>
						                </ul>
                                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="nod_text">
									<h1><a href=""><?php echo $project['project_client'];?></a></h1>
									
									
								  <p><?php echo $project['project_description'];?></p>
									
								<div class="des-box">
									<ul style="list-style-type:none">
	                                      <li><strong>End User:</strong> <?php echo $project['project_end_user'];?> </li>
	            						  <li><strong>Location:</strong> <?php echo $project['project_location'];?></li>
	                                      <li><strong>Date:</strong> <?php echo $project['project_date'];?></li>
	                                      <li><strong>Project type:</strong> <?php echo get_category_name($project['project_category']);?></li>
	                                      <li><strong>Website:</strong> <?php echo $project['project_client_website'];?></li>
                                    </ul>
                                    </div>
                                    </br>
                                    </br>
                                    <div class="product_meta">
										<div class="cats">
											<p>Categories: <a href=<?php echo '"sub-cat-list.php?id='.$project['project_category'].'"'?>><?php echo get_category_name($project['project_category']);?> , </a><a href=<?php echo '"sub-cat-products.php?cat_id='.$project['project_category'].'&sub_cat_id='.$project['project_sub_category'].'"'?>><?php echo get_sub_category_name($project['project_sub_category']);?></a></p>
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
						<li role="presentation" class="active"><a aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
                        <h5>The Brief</h5>
                        <p><?php echo nl2br($project['project_brief']);?></p>
                        <h5>Our Solution</h5>
                        <ul>
                        	<li><?php echo nl2br($project['project_solution']);?></li>
                        </ul>
                        <h5>What our clients say</h5>
                        <p>"<?php echo nl2br($project['project_testimonial']);?>"</p>
						</div>
						
				
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
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
