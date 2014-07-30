<?php
	$page_title = 'Buy Membership';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
	//checking that member is active or not
	if($userStatus[0]['membership_activation'] == 1)
	{
		header("Location: index.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>
<?php
	//getting membership details
	$membership = $manageContent->getMembershipInfo();
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
                        Buy Membership
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        You have to pay for Membership: <span class="amt-account"><?php echo $manageContent->getSystemCurrency('product').$membership[0]['price'];  ?></span>
                    </h1>
                    
                    <form class="form-horizontal" action="v-includes/functions/function.buy-membership.php" method="post">
                        
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11">
                                <input type="radio" id="membership_online" class="regular-checkbox" name="buy_mem" value="online"/><label for="checkbox-1-1"></label>
                                <span class="label-custom">
                                    Online Payment
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11">
                                <input type="radio" id="membership_bank" class="regular-checkbox" name="buy_mem" value="bank"/><label for="checkbox-1-1"></label>
                                <span class="label-custom">
                                    Bank Transfer
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11">
                                <button type="submit" class="btn btn-custom-profile" style="float: left">SUBMIT</button>
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