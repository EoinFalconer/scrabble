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
    <title>GMF.com | Projects</title>
	
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
					<h1 class="bread-title">Projects</h1>
				</div>
				</div>
			</div>
		</div>
	</div>
    <section class="content-wrapper">
    <div class="container">
    	<div class="col-wrapper">
        <h2 style="text-align:center">Projects</h2>
        <p style="padding-bottom:50px"> Quisque faucibus enim non tempus gravida. Morbi non sem sagittis, venenatis neque at, consequat justo. Cras dignissim, nunc sit amet cursus suscipit neque nisi ultrices enim, tempus rhoncus sapien lectus quis ex " Quisque faucibus enim non tempus gravida. Morbi non sem sagittis, venenatis neque at, consequat justo. Cras dignissim, nunc sit amet cursus suscipit neque nisi ultrices enim, tempus rhoncus sapien lectus quis ex " Quisque faucibus enim non tempus gravida. Morbi non sem sagittis, venenatis neque at, consequat justo. Cras dignissim, nunc sit amet cursus suscipit neque nisi ultrices enim, tempus rhoncus sapien lectus quis ex "</p>
    		<div class="col-left">
                <h4>Primary</h4>
                <ul style="list-style-type:none">
                <?php 
                $sql = "SELECT * FROM Projects WHERE project_category = 1 ORDER BY project_client ASC";
                $result = mysqli_query($con, $sql);
                while($project = mysqli_fetch_array($result)) { 
                      if ($project['project_display'] == 2) echo '<li><a href="project.php?id='.$project['project_id'].'">'.$project['project_client'].'</a></li>';
                      else echo '<li>'.$project['project_client'].'</li>';
                }
                ?>
                </ul>
            
                
                </div>
                <div class="col-center">
                <h4 style="padding-left:12%">Secondary</h4>
                <ul style="list-style-type:none">
                <?php 
                $sql = "SELECT * FROM Projects WHERE project_category = 4 ORDER BY project_client ASC";
                $result = mysqli_query($con, $sql);
                while($project = mysqli_fetch_array($result)) { 
                        if ($project['project_display'] == 2) echo '<li><a href="project.php?id='.$project['project_id'].'">'.$project['project_client'].'</a></li>';
                        else echo '<li>'.$project['project_client'].'</li>';
                }
                ?>
                </ul>
            
                
                </div>
                 <div class="col-right">
                 <h4 style="padding-left:12%">Third Level</h4>
                <ul style="list-style-type:none">
                   <?php 
                    $sql = "SELECT * FROM Projects WHERE project_category = 5 ORDER BY project_client ASC";
                    $result = mysqli_query($con, $sql);
                    while($project = mysqli_fetch_array($result)) { 
                            if ($project['project_display'] == 2) echo '<li><a href="project.php?id='.$project['project_id'].'">'.$project['project_client'].'</a></li>';
                            else echo '<li>'.$project['project_client'].'</li>';
                    }
                    ?>
                </ul>

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