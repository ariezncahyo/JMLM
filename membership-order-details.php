<?php
	$page_title = 'Membership Order Details';
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
	//checking for get values
	if(!isset($GLOBALS['_GET']['mid']))
	{
		header("Location: login/");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>
<?php
	$mid = $GLOBALS['_GET']['mid'];
	//to get member order details
	$mem_order = $manageContent->getMembershipOrderDetails($mid ,$baseUrl);
	//to get the order payment method
	$payment = $manageContent->getPaymentMethod($mem_order[0]['payment_method']);
	//to get the system currency
	$currency = $manageContent->getSystemCurrency('product');
	//to get the user name
	$user = $manageContent->getUserFromUserId($mem_order[0]['user_id']);
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
                                    <?php echo member_order_details;?>
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                 <?php echo order_id;?>: <?php echo $mem_order[0]['membership_order_id']; ?><br><br>
                                 <?php echo order_by;?>: <?php echo $user;  ?><br><br>
                                 <?php echo payment_method;?>: <?php echo $payment; ?><br><br>
                                 <?php echo total_amount;?>: <?php echo $currency.$mem_order[0]['amount']; ?><br><br>
                                 <?php echo purchase_on;?>: <?php echo $mem_order[0]['date']; ?><br><br>
                                 <?php echo order_status;?>: <?php echo $mem_order[0]['order_status']; ?>
                                </p>
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