<?php
	$page_title = 'WithDraw';
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
                        withdraw amount
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        Total Amount in Your Account: <span class="amt-account"><?php echo $manageContent->getSystemCurrency('product').$manageContent->getUserNetAmount($_SESSION['user_id']) ?></span>
                    </h1>
                    
                    <form class="form-horizontal" action="<?php echo $baseUrl;?>v-includes/functions/function.withdraw-amount.php" method="post">
                        
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Withdraw Amount: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" name="amount" placeholder="In Figure" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11">
                                <input type="checkbox" name="with_pro" value="account" class="regular-checkbox" /><label for="checkbox-1-1"></label>
                                <span class="label-custom">
                                    Withdraw by Account
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-4">
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