<?php
	$page_title = 'Change Password';
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
                    
                    <div class="head-profile-checkout">
                       Change Password
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        Change your password here
                    </h1>
                    
	                    <form class="form-horizontal" action="<?php echo $baseUrl;?>v-includes/functions/function.change-password.php" method="post">
	                        
	                    <div class="form-group">
	                        <label class="col-sm-3 col-sm-offset-1 label-profile">Old Password </label>
	                        <div class="col-sm-offset-1 col-sm-6">
	                            <input class="form-control form-profile" type="password" name="old_pass"  />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 col-sm-offset-1 label-profile">New Password: </label>
	                        <div class="col-sm-offset-1 col-sm-6">
	                            <input class="form-control form-profile" type="password" name="new_pass" />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 col-sm-offset-1 label-profile">Re-type New Password: </label>
	                        <div class="col-sm-offset-1 col-sm-6">
	                            <input class="form-control form-profile" type="password" name="re_pass"  />
	                        </div>
	                    </div>
	                            
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-5">
                                <button type="submit" class="btn btn-custom-profile">SUBMIT</button>
                            </div>
                        </div>
                        
                    </form>
                    
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>