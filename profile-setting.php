<?php
	$page_title = 'Profile Setting';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
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
                        profile settings
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        Personal Information
                    </h1>
                    
	                    <form class="form-horizontal" action="v-includes/functions/function.edit-user_profile.php" method="post">
	                        
	                    <div class="form-group">
	                        <label class="col-sm-3 col-sm-offset-1 label-profile">First Name: </label>
	                        <div class="col-sm-offset-1 col-sm-6">
	                            <input class="form-control form-profile" type="text" name="f_name" value="<?php echo $profile_value[0]['f_name'];  ?>" />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 col-sm-offset-1 label-profile">Last Name: </label>
	                        <div class="col-sm-offset-1 col-sm-6">
	                            <input class="form-control form-profile" type="text" name="l_name" value="<?php echo $profile_value[0]['l_name'];  ?>" />
	                        </div>
	                    </div>
	        			 <div class="form-group">
	                        <label class="col-sm-3 col-sm-offset-1 label-profile">Gender: </label>
	                        <div class="col-sm-offset-1 col-sm-6">
	                            <div class="radio">
								  <label>
								    <input type="radio" name="gender" value="male" <?php if($profile_value[0]['gender']=='male'){ echo 'checked="checked"'; } ?> >
								   	Male
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="gender" value="female" <?php if($profile_value[0]['gender']=='female'){ echo 'checked="checked"'; } ?> >
								    Female
								  </label>
								</div>
	                        </div>
	                    </div>
                      	<div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">Date of Birth: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile dob" type="text" name="dob" value="<?php echo $profile_value[0]['dob'];  ?>" />
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">Company: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile" type="text" name="company" value="<?php echo $profile_value[0]['company'];  ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">Address: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile" type="text" name="addr1" value="<?php echo $profile_value[0]['addr_1'];  ?>" />
                                <input class="form-control form-profile form-profile-topgap" type="text" name="addr2" value="<?php echo $profile_value[0]['addr_2'];  ?>" />
                            </div>
                        </div>                      
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">Town/City: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile" type="text" name="city" value="<?php echo $profile_value[0]['city'];  ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">State: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile" type="text" name="state" value="<?php echo $profile_value[0]['state'];  ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">Country: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile" type="text" name="country" value="<?php echo $profile_value[0]['country'];  ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">Postal Code: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile" type="text" name="postal_code" value="<?php echo $profile_value[0]['postal_code'];  ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 label-profile">Phone Number: </label>
                            <div class="col-sm-offset-1 col-sm-6">
                                <input class="form-control form-profile" type="text" name="phone" value="<?php echo $profile_value[0]['phone'];  ?>" />
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-5">
                                <button type="submit" class="btn btn-custom-profile">UPDATE</button>
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