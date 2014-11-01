<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>dist/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>dist/css/jquery.datepick.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>dist/css/style.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo $baseUrl;?>dist/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

<title>Market | <?php echo $page_title; ?></title>
</head>

<body>
	
		<!-- header -->
				
				<!-- navbar -->
				
						<nav class="navbar navbar-custom" role="navigation">
							<div class="container">
								
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle nav-toggle-custom" data-toggle="collapse" data-target="#collapsenav">
										<span class="sr-only">Toggle Navigation</span>
										<span class="icon-bar icn-custom"></span>
										<span class="icon-bar icn-custom"></span>
										<span class="icon-bar icn-custom"></span>
									</button>
								</div><!-- navbar-header ends -->
								
								<!-- navbar elements for toggling -->
								<div class="collapse navbar-collapse" id="collapsenav">
									
									<ul class="nav navbar-nav nav-custom">
										<li class="dropdown">
											<a class="dropdown-toggle" href="#" data-toggle="dropdown">LANGUAGE<b class="caret caret-custom"></b></a>
											
											<ul class="dropdown-menu drop-menu-custom">
												<li><a href="#">Lorem</a></li>
												<li><a href="#">Lorem</a></li>
												<li><a href="#">Lorem</a></li>
												<li><a href="#">Lorem</a></li>
												<li><a href="#">Lorem</a></li>
												<li><a href="#">Lorem</a></li>
											</ul>
										</li>
										
										<li><a href="#" class="custom-brdr-li">HELP</a></li>
										<li><a href="<?php echo $baseUrl;?>contact-us.php" class="custom-brdr-li">CONTACT</a></li>
									</ul><!-- navbar nav -->
									
									<ul class="nav navbar-nav navbar-right nav-custom">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Links<b class="caret caret-custom"></b></a>
											
											<ul class="dropdown-menu drop-menu-custom">
												<li><a href="<?php echo $baseUrl;?>company-history.php">Company History</a></li>
												<li><a href="<?php echo $baseUrl;?>culture.php">Culture</a></li>
												<li><a href="<?php echo $baseUrl;?>future.php">Future</a></li>
												<li><a href="<?php echo $baseUrl;?>opportunity.php">Opportunity</a></li>
												<li><a href="<?php echo $baseUrl;?>our-team.php">Our Team</a></li>
												<li><a href="<?php echo $baseUrl;?>products.php">Products</a></li>
											</ul>
											
										</li>
										<li class="custom-brdr-li"><a href="<?php echo $baseUrl;?>login.php">LOG IN</a></li>
										<li><a href="<?php echo $baseUrl;?>signup.php" class="active-nav"><span class="glyphicon glyphicon-play"></span>&nbsp;&nbsp;READY TO SIGN UP ?</a></li>
									</ul>
									
								</div><!-- #collapsenav ends -->
								
							</div><!-- container fluid ends -->
						</nav>
					
				
				<!-- logo, second navbar -->
				
					
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="logo-nav">
								
								<div class="row">
									
									<div class="col-sm-2">
										<a href="<?php echo $baseUrl;?>index.php"><img src="<?php echo $baseUrl;?>images/logo.png" /></a>
									</div>
									
									<div class="col-sm-10">
										<div class="row">
											<div class="col-sm-offset-9 col-sm-3">
												<a href="<?php echo $baseUrl;?>view-cart.php">
													<div class="cart-sec">
														<div class="cart">
															<img src="<?php echo $baseUrl;?>images/cart.png" /> <span class="cart-txt"> CART 0</span>
														</div>
													</div><!-- cart-sec ends -->
												</a>
											</div>
										</div>
										<div class="row">
										<div class="col-sm-12 nul-pad">
								        <div class="navbar navbar-right">
								          <div class="navbar-header">
								            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle nav-toggle-custom"><span class="icon-bar icn-custom"></span><span class="icon-bar icn-custom"></span><span class="icon-bar icn-custom"></span></button>
								          </div>
								          <div id="navbar-collapse-grid" class="navbar-collapse collapse">
								            <ul class="nav navbar-nav custom-navbar-nav">
								              <li><a href="<?php echo $baseUrl;?>our-team.php">PEOPLE</a>
								              </li>
								              <li><a href="<?php echo $baseUrl;?>products.php">PRODUCT</a>
								              </li>
								              <li><a href="<?php echo $baseUrl;?>culture.php">CULTURE</a>
								              </li>
								              <li><a href="<?php echo $baseUrl;?>opportunity.php">OPPORTUNITY</a>
								              </li>
								              <li>
								              	<form method="post" role="form">
													<div class="form-group form-group-custom">
														<div class="col-sm-12">
															<input type="text" placeholder="Search" class="form-control customsearch" />
														</div>
														<img src="<?php echo $baseUrl;?>images/search-logo.png" class="img-search" />
													</div>
												</form>
								              </li>
								            </ul>
								          </div>
								        </div>
									</div><!-- col-sm-7 ends -->
								</div>
									</div>
								</div>
								
							</div><!-- logo-nav ends -->
						</div><!-- cols ends -->
					</div><!-- row ends -->
				</div><!-- container ends -->