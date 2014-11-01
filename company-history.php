<?php
	$page_title = 'Company History';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>
						
<!-- banner -->

<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
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
                                                    <img src="<?php echo $baseUrl;?>images/down-arrow.png" />
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
                                                <div class="nav-elem nav-elem-cm-his">
                                                    <span class="nav-lbl">COMPANY HISTORY</span>
                                                    <img src="<?php echo $baseUrl;?>images/down-arrow.png" />
                                                </div>
                                            </a>
                                            
                                                <ul class="dropdown-menu drpdn-mnu-lst drpdn-mnu-lst-cmpny-hstry">
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
        <div class="col-sm-12">
            <div class="contact-container">
	            <div class="row">
	                <div class="col-sm-8">
	                    <h2 class="cmpny-hstry-hd">Company History</h2>
	                    <img src="<?php echo $baseUrl;?>images/company-history-banner.png" class="img-responsive img-future-banner" />
	                </div>
	                
	                <div class="col-sm-4">
	                    <table class="table tble-custm table-bordered">
	                        <tbody>
	                            <tr>
	                                <td><a href="<?php echo $baseUrl;?>company-history/">COMPANY HISTORY</a></td>
	                            </tr>
	                            <tr>
	                                <td><a href="<?php echo $baseUrl;?>future/">THE FUTURE</a></td>
	                            </tr>
	                            <tr>
	                                <td><a href="<?php echo $baseUrl;?>our-team/">OUR TEAM</a></td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-sm-9">
	                    
	                    <p class="future-para">
	                        <b>Lorem ipsum dolor</b> consectetur <b>sed do eiusmo </b> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	                    </p>
	                    
	                    <p class="future-para">
	                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
	                    </p>
	                    
	                    <p class="future-para">
	                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	                    </p>
	                    
	                    <p class="future-para mrgn-btm">
	                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.
	                    </p>
	                    
	                </div>
	            </div>
            </div><!-- contact-container ends -->
        </div><!-- cols ends -->
    </div><!-- row ends -->
</div><!-- container ends -->

<?php
	include 'v-templates/footer.php';
?>