<?php
	$page_title = 'Signup';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] != 'Guest')
	{
		header("Location: index.php");
	}
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
	//checking for get value
	if(isset($GLOBALS['_GET']['refid']))
	{
		//get ref id details
		$refUser = $manageContent->getUserInfoDetails($GLOBALS['_GET']['refid']);
		
		if(empty($refUser) || $refUser[0]['member_level'] == 0)
		{
			$_SESSION['warning'] = this_user_does_not_have_permission_to_refer_to_anyone;
			header("Location: index.php");
		}
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>

<div class="row row-mrgn-nul row-mrgn-cart hd-carousel">
    <div class="col-sm-12">
    </div>
</div>

<!-- sign up section -->

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
            <h3 class="sign-log-in"><?php echo sign_up;?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <div class="sign-up-content">
                <form class="form-horizontal" method="post" action="<?php echo $baseUrl;?>v-includes/functions/function.signup.php" role="form" id="user_signup">
                    <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo first_name;?> : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo first_name;?>" name="f_name" id="signup_fname">
                          <div class="form-error" id="err_signup_fname"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo last_name;?> : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo last_name;?>" name="l_name" id="signup_lname">
                          <div class="form-error" id="err_signup_lname"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo gender;?> : </label>
                        <div class="col-sm-9">
                          <div class="radio">
                              <label>
                                <input type="radio" name="gender" id="signup_gender1" value="male" checked>
                                Male
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="gender" id="signup_gender2" value="female">
                                Female
                              </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo date_of_birth;?> : </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control form-cart dob" placeholder="<?php echo date_of_birth;?>" name="dob" id="signup_dob">
                          <div class="form-error" id="err_signup_dob"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo address;?> : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="Address Line 1" name="addr1" id="signup_addr1">
                          <div class="form-error" id="err_signup_addr1"></div>
                          <input type="text" class="form-control form-cart mrgn-tp-cart" placeholder="Address Line 2" name="addr2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo city;?> : </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo city;?>" name="city" id="signup_city">
                          <div class="form-error" id="err_signup_city"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo state_province;?> : </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo state_province;?>" name="state" id="signup_state">
                          <div class="form-error" id="err_signup_state"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo country;?> : </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo country;?>" name="country" id="signup_country">
                          <div class="form-error" id="err_signup_country"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo zip_postal_code;?> : </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo zip_postal_code;?>" name="postal_code" id="signup_postal">
                          <div class="form-error" id="err_signup_postal"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo phone_number;?> : </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo phone_number;?>" name="phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo company;?> : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo company;?>" name="company">
                        </div>
                      </div>
                      <?php
                      	if(!isset($GLOBALS['_GET']['refid'])){
                      ?>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo referral_user_id;?> : </label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control form-cart" placeholder="<?php echo referral_user_id;?>" name="ref_user" id="signup_ref_user">
                          <div class="form-error" id="err_signup_ref_user"></div>
                        </div>
                      </div>
                      <?php } ?>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo username;?> : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="<?php echo username;?>" name="username" id="signup_username">
                          <div class="form-error" id="err_signup_username"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo email;?> : </label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control form-cart" placeholder="<?php echo email;?>" name="email" id="signup_email">
                          <div class="form-error" id="err_signup_email"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo password;?> : </label>
                        <div class="col-sm-5">
                          <input type="password" class="form-control form-cart" placeholder="<?php echo password;?>" name="password" id="signup_pass">
                          <div class="form-error" id="err_signup_pass"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo confirm_password;?> : </label>
                        <div class="col-sm-5">
                          <input type="password" class="form-control form-cart" placeholder="<?php echo confirm_password;?>" name="con_password" id="signup_con_pass">
                          <div class="form-error" id="err_signup_con_pass"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                        	<?php
                        		if(isset($GLOBALS['_GET']['refid'])){ echo '<input type="hidden" name="ref_user" value="'.$GLOBALS['_GET']['refid'].'"/>'; }
                        	?>
                        	
                          <button type="button" id="user_signup_btn" class="btn btn-warning checkout-btn"><?php echo sign_up;?></button>
                        </div>
                      </div>
                </form>
            </div><!-- log in content section ends -->
        </div>
    </div>
</div><!-- container for log in section ends -->
				
<?php
	include 'v-templates/footer.php';
?>