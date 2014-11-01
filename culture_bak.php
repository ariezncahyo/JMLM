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
            
            <div class="banner">
                        
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2 pad-social">
                    
                        <div class="culture-btn">
                            <a href="#">CULTURE</a>
                        </div>
                    
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-4">
                        <h4 class="prod-name">LOREM IPSUM</h4>
                        <p class="banner-para">
                            Lorem ipsum dolor sit amet,<br />
                            consectetur adipisicing elit<br />
                            sed do eiusmod tempor incididunt<br />
                            Lorem ipsum dolor sit amet,<br />
                            consectetur adipisicing elit<br />
                            sed do eiusmod tempor incididunt 
                        </p>
                    </div>
                </div>
                
            </div><!-- banner -->
                
            
        </div>
    </div><!-- row ends -->
</div><!-- container -->

<!-- banner ends -->

<!-- products section -->

<div class="container">
    <div class="row opp-prod">
            
                <div class="col-sm-6 pd-rt-nul">
                    <a href="#" class="opp-prod-link">
                        <div class="opp-prod-content">
                            <h3 class="opp-prod-head">Lorem Ipsum</h3>
                            <p class="opp-prod-para">
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum
                            </p>
                            <p class="prod-name">Lorem Ipsum</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
                
                <div class="col-sm-6">
                    <a href="#" class="opp-prod-link">
                        <div class="opp-prod-content">
                            <h3 class="opp-prod-head">Lorem Ipsum</h3>
                            <p class="opp-prod-para">
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum
                            </p>
                            <p class="prod-name">Lorem Ipsum</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
                
                <div class="col-sm-6 pd-rt-nul">
                    <a href="#" class="opp-prod-link">
                        <div class="opp-prod-content">
                            <h3 class="opp-prod-head">Lorem Ipsum</h3>
                            <p class="opp-prod-para">
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum
                            </p>
                            <p class="prod-name">Lorem Ipsum</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
                
                <div class="col-sm-6">
                    <a href="#" class="opp-prod-link">
                        <div class="opp-prod-content">
                            <h3 class="opp-prod-head">Lorem Ipsum</h3>
                            <p class="opp-prod-para">
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum<br />
                                Lorem ipsum dolor sit amet,Lorem ipsum
                            </p>
                            <p class="prod-name">Lorem Ipsum</p>
                        </div><!-- opportunity products content -->
                    </a>
                </div>
    
    </div>			
</div><!-- container ends -->
						
<?php
	include 'v-templates/footer.php';
?>