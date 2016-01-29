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
    <title>GMF.com | Why GMF</title>
	
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
	<div style="background: rgba(0, 0, 0, 0) url('images/Top_Image.png');" class="header_bottom_area blog_page shop_page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="bread-title">Why GMF</h1>
				</div>
				</div>
			</div>
		</div>
	</div>
    <section class="content-wrapper">
    <div class="container">
    </br>
    
    	<h2 style="text-align:center">Why GMF?</h2>
    	<br />
      <div class="main-wrapper">
      <div class="text">
      	<ol>
      		<li>
      			We exist to provide service to our customers.
      		</li>
      		<li>
      			We will endeavor to exceed expectations on every job.
      		</li>
      		<li>
      			We guarantee to maintain the highest level of service.
      		</li>
      		<li>
    			We will communicate to our customers the information necessary for them to make informed decisions.
    		</li>
    		<li>
    			We will make recommendations to our customers as if the money being spent was our own.
    		</li>
    		<li>
				We will deliver what is promised, nothing less.
			</li>
			<li>
				We recognise the customers needs always come first.
			</li>
			<li>
				We understand the customers best interests are the same as ours.
			</li>
			<li>
				We will quote based on cost, never opportunity.
			</li>
			<li>
				We understood that in order to provide quality service in the future, we accept responsibility, make it right and learn.
			</li>
			<li>
				We understand we are human and will make mistakes, when made, we accept responsibility, make it right and learn.
			</li>
			<li>
				We exist to provide service to our customers.
      		</li>
      	</ol>
      </div>
      <div class="first-image">
       <img src="images/images-look.jpg" width="200px" height="400px"/>
       <h5><a href="sub-cat-list.php?id=1">View Products</h5></a>
      </div>
      <div class="second-image">
      <img src="images/images-look.jpg" width="200px" height="400px"/>
      <h5><a href="projects.php">View Projects</h5></a>
      </div>
      </div>
 </div>
   </section>


    
    
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
