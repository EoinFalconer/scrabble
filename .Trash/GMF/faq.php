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
    <title>GMF.com | FAQ</title>
	
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
					<h1 class="bread-title">FAQs</h1>
				</div>				
				</div>
			</div>
		</div>
	</div>
    <section class="content-wrapper">
    <div class="container">
    	<div class="col-wrapper">
        <h2 style="text-align:center">FAQ</h2></br></br>
        
    		<div class="col-left1">
                <ul style="list-style-type:none">
                <li><p style="color:grey ; font-weight:bold">Where are Postura+ chairs manufactured?</p> </li>
                <li>Although first created in Australia, all Postura+ chairs sold in Europe are made in the Ireland.</li></br> </br>
                
                <li><p style="color:grey ; font-weight:bold">Can I order a chair in any colour?</p></li>
                <li>For larger orders, we can create chairs in the Postura+ and Integra range to best match your project's colour palette. For more information on customising our products, please get in touch with our team at E: education@kieurope.com</li></br></br>
                 
                 <li><p style="color:grey ; font-weight:bold">I made an order recently - how do I track its progress?</p> </li>
                <li>Please call one of our sales support teams and they will be happy to help you. T: +353 000 000 00000
</li></br> </br>
                
                <li><p style="color:grey ; font-weight:bold">What lead times could I be looking at for delivery of my order? </p></li>
                <li>If we have the right product in stock, delivery is usually within 5-10 working days. When made to order, delivery is between 4-6 weeks.</li></br></br>
                
                <li><p style="color:grey ; font-weight:bold">I manage an educational institution and need some replacement chairs, who should I speak to? </p></li>
                <li>As a first port of call, please contact the reseller who you worked with. If this is not possible, please get in touch with our sales support team. </li></br></br>
                 
                 <li><p style="color:grey ; font-weight:bold">Can I order products directly from you? </p> </li>
                <li>As we sell our educational products exclusively through our network of loyal dealers and distributors, we cannot offer direct or retail sales.
</li></br> </br>
                
                <li><p style="color:grey ; font-weight:bold">Are your chairs made from recycled plastic?  </p></li>
                <li>Different product lines are manufactured from slightly different materials. Please consult individual product descriptions for more details on specific products. </li>
                </ul>
            
                  
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
