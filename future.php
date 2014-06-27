<?php
	session_start();
	$page_title = 'Future';
	//include template files
	include 'v-templates/header-guest.php';
?>
						
<!-- banner -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="head-banner">
                        <div class="banner-link">
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                    <ul class="nav navbar-nav nav-cust-last">
                                        <li><a href="#"><span class="frst-nav">CULTURE</span> > </a></li>
                                        
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                <div class="nav-elem">
                                                    <span class="nav-lbl">COMPANY</span>
                                                    <img src="images/down-arrow.png" />
                                                </div>
                                            </a>
                                            
                                                <ul class="dropdown-menu drpdn-mnu-lst">
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                </ul>
                                        </li>
                                        
                                        <li class="drop-path-arrow"> > </li>
                                        
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                <div class="nav-elem">
                                                    <span class="nav-lbl">FUTURE</span>
                                                    <img src="images/down-arrow.png" />
                                                </div>
                                            </a>
                                            
                                                <ul class="dropdown-menu drpdn-mnu-lst drpdn-mnu-lst-future">
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                    <li><a href="#">Lorem</a></li>
                                                </ul>
                                        </li>
                                    </ul><!-- navbar nav -->
                                    
                                </div>
                            </div>
                        </div><!-- banner link -->
                    </div><!-- head banner -->
                </div>
            </div>
            
        </div>
    </div><!-- row ends -->
</div><!-- container -->

<!-- banner ends -->

<!-- contact us section -->

<div class="container">
    <div class="row">
        <div class="col-sm-12 contact-container">
            
            <div class="row">
                <div class="col-sm-8">
                    <h2 class="future-hd">THE FUTURE</h2>
                    <img src="images/future-banner.png" class="img-responsive img-future-banner" />
                </div>
                
                <div class="col-sm-4">
                    <table class="table tble-custm table-bordered">
                        <tbody>
                            <tr>
                                <td><a href="company-history.php">COMPANY HISTORY</a></td>
                            </tr>
                            <tr>
                                <td><a href="future.php">THE FUTURE</a></td>
                            </tr>
                            <tr>
                                <td><a href="our-team.php">OUR TEAM</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-9">
                    
                    <p class="future-para">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    
                    <p class="future-para">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                    </p>
                    
                    <i class="future-italics-label">
                        - Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    </i>
                    
                    <h2 class="future-hd">THE FUTURE</h2>
                    
                    <p class="future-para mrgn-btm">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.
                    </p>
                    
                </div>
            </div>
            
        </div><!-- cols ends -->
    </div><!-- row ends -->
</div><!-- container ends -->
						
<?php
	include 'v-templates/footer.php';
?>