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
	
<?php
	//checking for user and guest navbar
	if($_SESSION['user_id'] != 'Guest' && substr($_SESSION['user_id'],0,4) == 'user') {
		//get user details
		$userDetails = $manageContent->getUserInfoDetails($_SESSION['user_id']);
		//get user level details
		$userLevelDetails = $manageContent->getUserLevelDetails($userDetails[0]['member_level']);
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
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="nav-prof-2">Links<img src="<?php echo $baseUrl;?>images/arrow-down-nav.png" /></span></a>
									
									<ul class="dropdown-menu">
										<li><a href="<?php echo $baseUrl;?>company-history.php">Company History</a></li>
										<li><a href="<?php echo $baseUrl;?>culture.php">Culture</a></li>
										<li><a href="<?php echo $baseUrl;?>future.php">Future</a></li>
										<li><a href="<?php echo $baseUrl;?>opportunity.php">Opportunity</a></li>
										<li><a href="<?php echo $baseUrl;?>our-team.php">Our Team</a></li>
										<li><a href="<?php echo $baseUrl;?>products.php">Products</a></li>
									</ul>
								</li>
								
								<li><a href="<?php echo $baseUrl;?>v-templates/logout.php"><span class="nav-log-in">Log Out</span><span class="log-in-img"><img src="<?php echo $baseUrl;?>images/arrow-right-nav.png" /></span></a></li>
								
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
									<a href="<?php echo $baseUrl;?>index.php"><img src="<?php echo $baseUrl;?>images/logo.png" class="logo-nav-prof"></a>
								</div>
								<div class="col-sm-offset-7 col-sm-3">
									<a href="<?php echo $baseUrl;?>view-cart.php" class="cart-nw center-block">
										<div class="cart-sec">
											<div class="cart">
												<img src="<?php echo $baseUrl;?>images/cart.png" /> <span class="cart-txt cart-value"> CART <?php $manageContent->getTotalProductInCart(); ?></span>
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
                                <!-- php tag codes are written for dynamically change the under line under the menus -->		
                                <li><a href="<?php echo $baseUrl;?>index.php"><span class="<?php if($page_title=='Home') { echo "active-scnd-prof"; } else { echo "hvr-scnd-prof"; } ?>">HOME</span></a></li>
                                <li><a href="<?php echo $baseUrl;?>products.php"><span class="<?php if($page_title=='Product') { echo "active-scnd-prof"; } else { echo "hvr-scnd-prof"; } ?>">PRODUCT</span></a></li>
                                <li><a href="<?php echo $baseUrl;?>profile.php"><span class="<?php if($page_title=='Profile') { echo "active-scnd-prof"; } else { echo "hvr-scnd-prof"; } ?>">PROFILE</span></a></li>
                                <li><a href="<?php echo $baseUrl;?>bank-account.php"><span class="<?php if($page_title=='Bank Account') { echo "active-scnd-prof"; } else { echo "hvr-scnd-prof"; } ?>">BANK ACCOUNT</span></a></li>
                                <li><a href="<?php echo $baseUrl;?>my-wallet.php"><span class="<?php if($page_title=='My Wallet') { echo "active-scnd-prof"; } else { echo "hvr-scnd-prof"; } ?>">MY WALLET</span></a></li>
                                <li><a href="<?php echo $baseUrl;?>profile-setting.php"><span class="<?php if($page_title=='Profile Setting') { echo "active-scnd-prof"; } else { echo "hvr-scnd-prof"; } ?>">PROFILE SETTING</span></a></li>
                                <li><a href="<?php echo $baseUrl;?>withdraw-amount.php"><span class="<?php if($page_title=='WithDraw') { echo "active-scnd-prof"; } else { echo "hvr-scnd-prof"; } ?>">WITHDRAW AMOUNT</span></a></li>
                            </ul>
                            
                            <ul class="nav navbar-nav navbar-right nav-custom-scnd-prof">
                                <form role="form" method="post" class="form-prof">
                                    <div class="form-group">
                                        <div class="col-sm-12 pad-social">
                                            <input type="text" placeholder="Search" class="form-control customsearch-prof" />
                                            <img src="<?php echo $baseUrl;?>images/search-logo.png" class="img-search-prof" />
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
										
										<li><a href="<?php echo $baseUrl;?>myPage.php?id=p5406a98814e60" class="custom-brdr-li">HELP</a></li>
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
															<img src="<?php echo $baseUrl;?>images/cart.png" /> <span class="cart-txt cart-value"> CART <?php $manageContent->getTotalProductInCart(); ?></span>
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
                
<?php } ?>