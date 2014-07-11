<?php
	$page_title = 'Profile';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>

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
    <div class="row row-prof">
        <div class="col-sm-12">
            
            <div class="row mrgn-btm">
                
                <?php
					//include left sidebar
					include 'v-templates/sidebar-user.php';
				?>
                
                <div class="col-sm-9">
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                                <p class="rgt-col-para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <div class="rgt-col-para plc-blnk-rgt brdr-none">
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>