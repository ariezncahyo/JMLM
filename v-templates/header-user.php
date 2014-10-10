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

<div id="header">

	<div id="header-logo" class="container">
		<div id="logo">
        	<div class="logo-inner">
				<a href="index.php"><img src="images/logo.png" /></a>
			</div>
		</div>
	</div>
    
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
				
				<ul class="nav navbar-nav navbar-right nav-custom">
                                    	
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
                    
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle custom-brdr-li" data-toggle="dropdown">LINKS<b class="caret caret-custom"></b></a>
											
						<ul class="dropdown-menu drop-menu-custom">
							<?php
								$links = $manageContent->getHeaderPageLinks();
								if(!empty($links[0]['id']))
								{
									foreach($links as $link)
									{
										echo '<li><a href='.$link['page_link'].'>'.$link['name'].'</a></li>';
									}
								}
							?>
						</ul>					
					</li>
					
					<?php /*					
					<li><a href="#" class="custom-brdr-li">HELP</a></li>
					<li><a href="contact-us.php" class="custom-brdr-li">CONTACT</a></li>
					*/ ?>
					
                    <?php if($_SESSION['user_id'] != 'Guest' && substr($_SESSION['user_id'],0,4) == 'user') {
						$userDetails = $manageContent->getUserInfoDetails($_SESSION['user_id']); //get user details
						$userLevelDetails = $manageContent->getUserLevelDetails($userDetails[0]['member_level']); //get user level details
					?>
                    
                    <li><a href="v-templates/logout.php" class="custom-brdr-li">LOG OUT</a></li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle custom-brdr-li active-nav" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;MY ACCOUNT<b class="caret caret-custom"></b></a>
											
						<ul class="dropdown-menu drop-menu-custom">
                        	<li class="nav-welcome"><?php $manageContent->getUsernameOfUser(); ?></li>	
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="bank-account.php">Bank Account</a></li>
                            <li><a href="my-wallet.php">My Wallet</a></li>
                            <li><a href="profile-setting.php">Profile Setting</a></li>
                            <li><a href="withdraw-amount.php">Withdraw Amount</a></li>
						</ul>					
					</li>
                    
                    <?php } else if($_SESSION['user_id'] == 'Guest') { ?>
                    
					<li class="custom-brdr-li"><a href="login.php">LOG IN</a></li>
					<li><a href="signup.php" class="active-nav"><span class="glyphicon glyphicon-play"></span>&nbsp;&nbsp;READY TO SIGN UP ?</a></li>
                    <?php } ?>
				</ul>
									
			</div><!-- #collapsenav ends -->
								
		</div><!-- container fluid ends -->
	</nav>
    
    <!-- logo, second navbar -->	
	<div class="container"> 
       
		<div class="row col-sm-offset-6 col-sm-6 cart-search">
			<div id="header-cart">
				<div class="cart">
					<a href="view-cart.php"><span class="glyphicon glyphicon-shopping-cart icon"></span>
						<div class="cart-txt"><span class="cart-label">Cart</span></div>
						<div class="cart-value"><span><?php $manageContent->getTotalProductInCart(); ?></span></div>
					</a>
				</div>
			</div>
			<div id="header-search">
				<form method="post" role="form">
				<div class="form-group form-group-custom customsearch">
					<input type="text" placeholder="Search" class="form-control" />
					<button type="submit" title="Search" class="button"><span class="glyphicon glyphicon-search"></span></button>
				</div>
				</form>
			</div>
		</div>

		<div class="row col-sm-12 nul-pad">
			<div class="navbar navbar-right">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle nav-toggle-custom"><span class="icon-bar icn-custom"></span><span class="icon-bar icn-custom"></span><span class="icon-bar icn-custom"></span></button>
				</div>
				<div id="navbar-collapse-grid" class="navbar-collapse collapse">
					<ul class="nav navbar-nav custom-navbar-nav">
						<?php
							$links = $manageContent->getNavbarPageLinks();
							if(!empty($links[0]['id']))
							{
								foreach($links as $link)
								{
									echo '<li><a href='.$link['page_link'].'>'.$link['name'].'</a></li>';
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>
        							
	</div><!-- container ends --> 
</div><!-- header ends -->