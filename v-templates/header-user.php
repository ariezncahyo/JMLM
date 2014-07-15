<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="dist/css/jquery.datepick.css" />
<link rel="stylesheet" type="text/css" href="dist/css/style.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    
<title>Market | <?php echo $page_title; ?></title>
</head>

<body>
	
<?php
	//checking for user and guest navbar
	if($_SESSION['user_id'] != 'Guest' && substr($_SESSION['user_id'],0,4) == 'user') {
?>
		<!-- header -->
				
				<!-- navbar -->
				
				<nav class="navbar navbar-custom-profile" role="navigation">
					<div class="container">
						
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle nav-toggle-custom" data-toggle="collapse" data-target="#collapsenavprof">
								<span class="sr-only">Toggle Navigation</span>
								<span class="icon-bar icn-custom"></span>
								<span class="icon-bar icn-custom"></span>
								<span class="icon-bar icn-custom"></span>
							</button>
						</div><!-- navbar-header ends -->
						
						<!-- navbar elements for toggling -->
						<div class="collapse navbar-collapse" id="collapsenavprof">
							<ul class="nav navbar-nav navbar-right nav-custom-prof">
								<li><a href="#"><span class="nav-welcome"><?php $manageContent->getUsernameOfUser(); ?></span></a></li>
								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="nav-prof-2">Links<img src="images/arrow-down-nav.png" /></span></a>
									
									<ul class="dropdown-menu">
										<li><a href="company-history.php">Company History</a></li>
										<li><a href="culture.php">Culture</a></li>
										<li><a href="future.php">Future</a></li>
										<li><a href="opportunity.php">Opportunity</a></li>
										<li><a href="our-team.php">Our Team</a></li>
										<li><a href="products.php">Products</a></li>
									</ul>
								</li>
								
								<li><a href="v-templates/logout.php"><span class="nav-log-in">Log Out</span><span class="log-in-img"><img src="images/arrow-right-nav.png" /></span></a></li>
								
							</ul>
						</div><!-- collapsenavprof ends -->
						
					</div><!-- container fluid ends -->
				</nav>
					
				<!-- logo main -->
			
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div>
								<div class="col-sm-2 pad-social">
									<a href="index.php"><img src="images/logo.png" class="logo-nav-prof"></a>
								</div>
								<div class="col-sm-offset-7 col-sm-3">
									<a href="view-cart.php" class="cart-nw center-block">
										<div class="cart-sec">
											<div class="cart">
												<img src="images/cart.png" /> <span class="cart-txt cart-value"> CART <?php $manageContent->getTotalProductInCart(); ?></span>
											</div>
										</div><!-- cart-sec ends -->
									</a>
								</div>
							</div>
						</div>
					</div>
				</div><!-- container ends -->
                
                				
                <!-- navbar second profile -->
                
                <nav class="navbar navbar-scnd-prof" role="navigation">
                    <div class="container">
                        
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle nav-toggle-custom" data-toggle="collapse" data-target="#collapsenavscndprof">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar icn-custom"></span>
                                <span class="icon-bar icn-custom"></span>
                                <span class="icon-bar icn-custom"></span>
                            </button>
                        </div><!-- navbar-header ends -->
                        
                        <!-- navbar elements for toggling -->
                        <div class="collapse navbar-collapse" id="collapsenavscndprof">
                            <ul class="nav navbar-nav nav-custom-scnd-prof">
                                <li><a href="index.php"><span class="active-scnd-prof">HOME</span></a></li>
                                <li><a href="products.php"><span class="hvr-scnd-prof">PRODUCT</span></a></li>
                                <li><a href="profile.php"><span class="hvr-scnd-prof">PROFILE</span></a></li>
                                <li><a href="bank-account.php"><span class="hvr-scnd-prof">BANK ACCOUNT</span></a></li>
                                <li><a href="my-wallet.php"><span class="hvr-scnd-prof">MY WALLET</span></a></li>
                                <li><a href="profile-setting.php"><span class="hvr-scnd-prof">PROFILE SETTING</span></a></li>
                                <li><a href="withdraw-amount.php"><span class="hvr-scnd-prof">WITHDRAW AMOUNT</span></a></li>
                            </ul>
                            
                            <ul class="nav navbar-nav navbar-right nav-custom-scnd-prof">
                                <form role="form" method="post" class="form-prof">
                                    <div class="form-group">
                                        <div class="col-sm-12 pad-social">
                                            <input type="text" placeholder="Search" class="form-control customsearch-prof" />
                                            <img src="images/search-logo.png" class="img-search-prof" />
                                        </div>
                                    </div>
                                </form>
                            </ul>
                        </div><!-- collapsenavprof ends -->
                        
                    </div><!-- container fluid ends -->
                </nav>
                
<?php } else if($_SESSION['user_id'] == 'Guest') { ?>
				
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
										<li><a href="contact-us.php" class="custom-brdr-li">CONTACT</a></li>
									</ul><!-- navbar nav -->
									
									<ul class="nav navbar-nav navbar-right nav-custom">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Links<b class="caret caret-custom"></b></a>
											
											<ul class="dropdown-menu drop-menu-custom">
												<li><a href="company-history.php">Company History</a></li>
												<li><a href="culture.php">Culture</a></li>
												<li><a href="future.php">Future</a></li>
												<li><a href="opportunity.php">Opportunity</a></li>
												<li><a href="our-team.php">Our Team</a></li>
												<li><a href="products.php">Products</a></li>
											</ul>
											
										</li>
										<li class="custom-brdr-li"><a href="login.php">LOG IN</a></li>
										<li><a href="signup.php" class="active-nav"><span class="glyphicon glyphicon-play"></span>&nbsp;&nbsp;READY TO SIGN UP ?</a></li>
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
										<a href="index.php"><img src="images/logo.png" /></a>
									</div>
									
									<div class="col-sm-10">
										<div class="row">
											<div class="col-sm-offset-9 col-sm-3">
												<a href="view-cart.php">
													<div class="cart-sec">
														<div class="cart">
															<img src="images/cart.png" /> <span class="cart-txt cart-value"> CART <?php $manageContent->getTotalProductInCart(); ?></span>
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
								              <li><a href="our-team.php">PEOPLE</a>
								              </li>
								              <li><a href="products.php">PRODUCT</a>
								              </li>
								              <li><a href="culture.php">CULTURE</a>
								              </li>
								              <li><a href="opportunity.php">OPPORTUNITY</a>
								              </li>
								              <li>
								              	<form method="post" role="form">
													<div class="form-group form-group-custom">
														<div class="col-sm-12">
															<input type="text" placeholder="Search" class="form-control customsearch" />
														</div>
														<img src="images/search-logo.png" class="img-search" />
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
                
<?php } ?>