<?php  include("backend/connection.php");
		include("backend/function.php");
?>
<header>

  
    <!--==| header middle start |==-->
	<div class="header_middle_area">
		<div class="container" style="width:80%">
			<div class="row">
				<div class="col-md-3 col-sm-2 col-xs-12 logo_container">
					<div class="header_logo">
						<a href="index.php"><img src="images/logo.jpg"  class="logo_img" alt="GMF Logo" /></a>
						
					</div>
					<h3 class="logo_head">G Morgan & Sons Ltd</h3>
					<h6 class="logo_text">Educational Furniture Specialists </h6>
				</div>
				<div class="col-md-7 col-sm-8 col-xs-12">
					<div class="header_middle_right">
						<nav class="mainmenu">
							<ul>
                            	<li class="active"><a href="index.php">Home</a>
                                	<li><a href="about.php">About Us <i class="fa fa-angle-down"></i></a>
									<div class="main_nav_dropdown">
										<ul>
											<li><a href="about.php#certs">Certs & Sustainability</a></li>
											<li><a href="about.php#history">Our History</a></li>
										</ul>
									</div>

								<li><a href="sub-cat-list.php?id=1">Products <i class="fa fa-angle-down"></i></a>
									<div class="main_nav_dropdown">
										<ul>
											<li><a href="sub-cat-list.php?id=1">Primary</a></li>
											<li><a href="sub-cat-list.php?id=4">Secondary</a></li>
										</ul>
									</div>
								</li>
								<li><a href="projects.php">Projects</a></li>
								<li><a href="special-offers.php">Special Offers</a></li>
								
							</ul>
						</nav>
					</div>
				</div>
				
			</div>
		</div>
	</div>
    <!--==| header middle End |==-->
    <!--==| header Top Start |==-->
	<div class="header_top_area" height="200px">
			<div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12" align="right">
		 		 <div class="header_top_cc_left">
						<ul>
							<script>
							function searchValue(input){
								input.innerHTML = "";
							}
							</script>
							<!--<li><a href="faq.php">FAQ</a>
							<li><a href="why.php">Why GMF?</a>
                            <li><a href="howtobuy.php">How to Buy </a>  -->
                            <li><i>+353 (0)41 9838068</i></li>
                            <li><i>info@gmf.ie</i></li>
                            <li><a href="contact.php">Contact Us </a></li>
                            <!--<li><a class="fa fa-search" href=""> Search</a></li>-->
                            <li><div class="header_middle_cc_search">
										<ul>
											<li>
												<div class="search_drpdwn">
													<form name="frm" action="search.php" method="GET" style="height:20px">
													<a class="fa fa-search"></a>
													<input style="color:#fff" type="submitme" name="btnSearch" id="search_input" onfocus="if (this.value==' Search') this.value='';" value=" Search" />
													</form>
													
													<?php if(isset($_POST['search'])) {
														$search = $_POST['text'];
														echo  "<meta http-equiv='Location' content='search.php?s=$search'>";
													}
													?>
													
													
												</div>
										
									</div>

						</ul>
				</div>
						  </li>
						  </ul> 
						  
			</div></li>
		  </div>
		
</div>
    <!--==| header Top END |==-->

	<!--==| Mobile Menu START |==-->
	<div class="cc_mobile_navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="only-for-mobile">
						<div class="col-xs-12">
							<ul class="ofm">
								<li class="m_nav"><i class="fa fa-bars"></i> Navigation</li>
							</ul>

							<!-- MOBILE MENU -->
							<div class="mobi-menu">
								<div id='cssmenu'>
									<ul>
                                    <li>
											<a href="index.php"><span>Home</span></a>
										</li>
                                        <li class='has-sub'>
											<a href='about.php'><span>About Us</span></a>
											<ul class="sub-nav">
											<li><a href="about.php#certs">Certs & Sustainability</a></li>
											<li><a href="about.php#history">Our History</a></li>
											</ul>
										</li>
										<li class='has-sub'>
											<a href='sub-cat-list.php?id=1'><span>Products</span></a>
											<ul class="sub-nav">
											<li><a href="sub-cat-list.php?id=1">Primary</a></li>
											<li><a href="sub-cat-list.php?id=4">Secondary</a></li>
											</ul>
										</li>
										<li>
											<a href='projects.php'><span>Projects</span></a>
										</li>
										<li>
											<a href='special-offers.php'><span>Special Offers</span></a>
										</li>
										<li>
											<a href='contact.php'><span>Contact Us</span></a>
										</li>
										
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
        
	<!--==| Mobile Menu END |==-->
	
   
	</header>