<?php
	$page_title = 'Login';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] != 'Guest')
	{
		header("Location: index.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>

<?php /*
<div class="row row-mrgn-nul row-mrgn-cart hd-carousel">
    <div class="col-sm-12">
    </div>
</div>
*/ ?>
<!-- log in section -->

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
            <h3 class="sign-log-in"><?php echo log_in;?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="log-in-content">
                <form class="form-horizontal" action="<?php echo $baseUrl;?>v-includes/functions/function.login.php" role="form" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo email;?> : </label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control form-cart" placeholder="<?php echo email;?>" name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label"><?php echo password;?> : </label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control form-cart" placeholder="<?php echo password;?>" name="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="login_time"> <?php echo keep_me_logged_in_for_2weeks;?>
                            </label>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-warning checkout-btn"><?php echo log_in;?></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 nul-pad col-sm-9">
                            <a href="<?php echo $baseUrl;?>forgot-password/"><button type="button" class="btn btn-link btn-link-custom"><?php echo forgot_password;?></button></a>
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