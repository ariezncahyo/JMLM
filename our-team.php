<?php
	session_start();
	$page_title = 'Our Team';
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
                                                    <span class="nav-lbl">OUR TEAM</span>
                                                    <img src="images/down-arrow.png" />
                                                </div>
                                            </a>
                                            
                                                <ul class="dropdown-menu drpdn-mnu-lst drpdn-mnu-lst-our-team">
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
                    <h2 class="future-hd">OUR TEAM</h2>
                    
                    <div class="row row-our-tm">
                        <div class="col-sm-9">
                            <h4 class="our-tm-hd">Lorem Ipsum</h4>
                            <p class="our-tm-para">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <h4 class="team-name">LOREM IPSUM</h4>
                        </div>
                        <div class="col-sm-3">
                            <img src="images/team-1.png" class="img-responsive" />
                        </div>
                    </div>
                    
                    <div class="row row-our-tm">
                        <div class="col-sm-9">
                            <h4 class="our-tm-hd">Lorem Ipsum</h4>
                            <p class="our-tm-para">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <h4 class="team-name">LOREM IPSUM</h4>
                        </div>
                        <div class="col-sm-3">
                            <img src="images/team-2.png" class="img-responsive" />
                        </div>
                    </div>
                    
                    <div class="row row-our-tm mrgn-btm">
                        <div class="col-sm-9">
                            <h4 class="our-tm-hd">Lorem Ipsum</h4>
                            <p class="our-tm-para">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <h4 class="team-name">LOREM IPSUM</h4>
                        </div>
                        <div class="col-sm-3">
                            <img src="images/team-3.png" class="img-responsive" />
                        </div>
                    </div>
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
            
        </div><!-- cols ends -->
    </div><!-- row ends -->
</div><!-- container ends -->
						
<?php
	include 'v-templates/footer.php';
?>