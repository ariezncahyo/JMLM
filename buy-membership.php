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
		//header("Location: index.php");
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
                        <?php echo buy_membership;?>
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        <?php echo you_have_to_pay_for_membership;?>: <span class="amt-account"><?php echo $manageContent->getSystemCurrency('product').$membership[0]['price'];  ?></span>
                    </h1>
                    
                    <form class="form-horizontal" action="<?php echo $baseUrl;?>v-includes/functions/function.buy-membership.php" method="post">
                        
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11">
                                <input type="radio" id="membership_online" class="regular-checkbox" name="buy_mem" value="online"/><label for="checkbox-1-1"></label>
                                <span class="label-custom">
                                    <?php echo online_payment;?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11">
                                <input type="radio" id="membership_bank" class="regular-checkbox" checked="checked" name="buy_mem" value="bank"/><label for="checkbox-1-1"></label>
                                <span class="label-custom">
                                    <?php echo bank_transfer;?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11" id="cash_btn">
                                <button type="submit" class="btn btn-custom-profile" style="float: left"><?php echo submit;?></button>
                            </div>
                        </div>
                        
                    </form>
                    
                    <div class="col-sm-offset-1 col-sm-11" id="online_paypal_btn">
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="K5DS2MUFW8KXN">
							<input type="hidden" name="lc" value="SG">
							<input type="hidden" name="item_name" value="Total Price">
							<input type="hidden" name="item_number" value="1">
							<input type="hidden" name="amount" value="<?php echo $membership[0]['price']; ?>">
							<input type="hidden" name="currency_code" value="SGD">
							<input type="hidden" name="button_subtype" value="services">
							<input type="hidden" name="no_note" value="0">
							<input type="hidden" name="no_shipping" value="2">
							<input type="hidden" name="rm" value="1">
							<input type="hidden" name="return" value="http://test.dip.com.sg/mlm/v-includes/functions/function.paypal-return.php?action=<?php echo md5('mem_order_success'); ?>">
							<input type="hidden" name="cancel_return" value="http://test.dip.com.sg/mlm/v-includes/functions/function.paypal-return.php?action=<?php echo md5('mem_order_decline'); ?>">
							<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
							<input type="submit" class="btn btn-custom-profile" style="float: left" value="PAYPAL PAYMENT"/>
						</form>
                    </div>
                        
                    
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>