<?php
	$page_title = 'Culture';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
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
        
			<!-- Supposingly to be breadcrumb - should be renamed or load this to header block for dynamic breadcrumb generation -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="head-banner">
                        <div class="banner-link">
                            <div class="row">
                                <div class="col-sm-2">
                                    <a href="<?php echo $baseUrl;?>products/" class="banner-h"><span class="banner-spn">CULTURE</span> ></a>
                                </div>
                            </div>
                        </div><!-- banner link -->
                    </div><!-- head banner -->
                </div>
            </div>
            <!-- End breadcrumb -->
            
            <div id="banner">
				<img src="<?php echo $baseUrl;?>images/banners/banner.jpg" title="Culture" />        
                <div class="banner-txt">
					<p class="banner-title"><a href="#">CULTURE</a></p>
                    <p class="banner-desc">Our difference is demonstrated through our opportunity. Professional distributor leaders thrive as they inspire and empower others.</p>
                </div> 
            </div><!-- banner -->
                
            
        </div>
    </div><!-- row ends -->
</div><!-- container -->

<!-- banner ends -->

<!-- products section -->

<div class="container">
    <div class="row module-group">
            
                <div id="module" class="col-sm-6">
                    <a href="#" class="module-link">
                    	<img src="<?php echo $baseUrl;?>images/banners/join-us-banner.jpg" title="Join Us" />
                        <div class="module-content">
                            <p class="module-title">JOIN OUR TEAM</p>
                            <p class="module-desc">
                                Sign up as a distributor.<br />Create an account to purchase products.<br />Enroll in our Rewards program.
                            </p>
                            <p class="module-name">Get Started Now</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
                
                <div id="module" class="col-sm-6">
                    <a href="#" class="module-link">
                    	<img src="<?php echo $baseUrl;?>images/banners/join-us-banner.jpg" title="Join Us" />
                        <div class="module-content">
                            <p class="module-title">JOIN OUR TEAM</p>
                            <p class="module-desc">
                                Sign up as a distributor.<br />Create an account to purchase products.<br />Enroll in our Rewards program.
                            </p>
                            <p class="module-name">Get Started Now</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
                
                <div id="module" class="col-sm-6">
                    <a href="#" class="module-link">
                    	<img src="<?php echo $baseUrl;?>images/banners/join-us-banner.jpg" title="Join Us" />
                        <div class="module-content">
                            <p class="module-title">JOIN OUR TEAM</p>
                            <p class="module-desc">
                                Sign up as a distributor.<br />Create an account to purchase products.<br />Enroll in our Rewards program.
                            </p>
                            <p class="module-name">Get Started Now</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
                
                <div id="module" class="col-sm-6">
                    <a href="#" class="module-link">
                    	<img src="<?php echo $baseUrl;?>images/banners/join-us-banner.jpg" title="Join Us" />
                        <div class="module-content">
                            <p class="module-title">JOIN OUR TEAM</p>
                            <p class="module-desc">
                                Sign up as a distributor.<br />Create an account to purchase products.<br />Enroll in our Rewards program.
                            </p>
                            <p class="module-name">Get Started Now</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
    
    </div>			
</div><!-- container ends -->
						
<?php
	include 'v-templates/footer.php';
?>