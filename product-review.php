<?php
	$page_title = 'Product Review';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
	//checking get value
	if(!isset($GLOBALS['_GET']['proid']))
	{
		header("Location: index.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
	//calling the bll function for showing profile details
	$profile_value=$manageContent->getUserInfo();
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
                    
                    <div class="head-profile-checkout">
                        <?php echo product_review;?>
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        <?php echo give_product_review;?>
                    </h1>
                    
	                    <form class="form-horizontal" action="<?php echo $baseUrl;?>v-includes/functions/function.product-review.php" method="post">
	                    <?php 
	                    	$userReview = $manageContent->userReviewCheck($_SESSION['user_id'], $_GET['proid']);
							if(empty($userReview[0]['review'])) { ?>
								
								<div class="form-group">
			                        <label class="col-sm-3 col-sm-offset-1 label-profile"><?php echo review;?>: </label>
			                        <div class="col-sm-offset-1 col-sm-6">
			                            <textarea class="form-control form-profile" rows="5" name="review"></textarea>
			                        </div>
		                    	</div>
		                    	<div class="form-group">
		                            <div class="col-sm-offset-6 col-sm-5">
		                            	<input type = "hidden" name = "proid" value="<?php echo $_GET['proid'];?>" />
		                            	<input type = "hidden" name = "action" value="insert" />
		                                <button type="submit" class="btn btn-custom-profile"><?php echo submit;?></button>
		                            </div>
	                        	</div>
                        <?php  } else { ?>
								<div class="form-group">
			                        <label class="col-sm-3 col-sm-offset-1 label-profile"><?php echo review;?>: </label>
			                        <div class="col-sm-offset-1 col-sm-6">
			                            <textarea class="form-control form-profile" rows="5" name="review"><?php echo $userReview[0]['review'];?></textarea>
			                        </div>
		                    	</div>
		                    	<div class="form-group">
		                            <div class="col-sm-offset-6 col-sm-5">
		                            	<input type = "hidden" name = "proid" value="<?php echo $_GET['proid'];?>" />
		                                <input type = "hidden" name = "action" value="update" />
		                                <button type="submit" class="btn btn-custom-profile"><?php echo update;?></button>
		                            </div>
	                        	</div>	
						<?php } ?>    
	                </form>
                    
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>