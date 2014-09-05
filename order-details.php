<?php
	$page_title = 'Order Details';
	//include template files
	include 'v-templates/header.php';
	
	
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
	if(isset($GLOBALS['_GET']['oid']))
	{
		$oid = $GLOBALS['_GET']['oid'];
		//to get order details
		$basic = $manageContent->getUserOrderBasicDetails($oid);
		//to get the order payment method
		$payment = $manageContent->getPaymentMethod($basic[0]['payment_method']);
		//to get the user name
		$user = $manageContent->getUserFromUserId($basic[0]['user_id']);
		//to get the system currency
		$currency = $manageContent->getSystemCurrency('product');
		//to get the billing details
		$billing = $manageContent->getUserBillingAndShippingDetails($oid,'Billing');
		//to get the shipping details
		$shipping = $manageContent->getUserBillingAndShippingDetails($oid,'Shipping');
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
                                    Order Basic Info
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                 <b>Order Id:</b> <?php echo $basic[0]['order_id']; ?><br><br>
                                 Order By: <?php echo $user; ?><br><br>
                                 Payment Method: <?php echo $payment; ?><br><br>
                                 Shipping Charge: <?php echo $currency.$basic[0]['shipping_charge']; ?><br><br>
                                 Total Amount: <?php echo $currency.$basic[0]['total_amount']; ?><br><br>
                                 Purchase On: <?php echo $basic[0]['date']; ?><br><br>
                                 Order status: <?php echo $basic[0]['order_status']; ?>
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                                 
                                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Order Billing Info
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                   Name: <?php echo $billing[0]['f_name'].' '. $billing[0]['l_name']; ?><br><br>
                                   Email Id: <?php echo $billing[0]['email_id']; ?><br><br>
                                   Address: <?php echo $billing[0]['addr_1'].' '.$billing[0]['addr_2']; ?><br><br>
                                   Contact No: <?php echo $billing[0]['contact_no']; ?><br><br>
                                   City: <?php echo $billing[0]['city']; ?><br><br>
                                   State: <?php echo $billing[0]['state']; ?><br><br>
                                   Country: <?php echo $billing[0]['country']; ?><br><br>
                                   Postal Code: <?php echo $billing[0]['postal_code']; ?><br><br>
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                                                    
                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Order Shipping Details
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                   Name: <?php echo $shipping[0]['f_name'].' '. $shipping[0]['l_name']; ?><br><br>
                                   Email Id: <?php echo $shipping[0]['email_id']; ?><br><br>
                                   Address: <?php echo $shipping[0]['addr_1'].' '.$shipping[0]['addr_2']; ?><br><br>
                                   Contact No: <?php echo $shipping[0]['contact_no']; ?><br><br>
                                   City: <?php echo $shipping[0]['city']; ?><br><br>
                                   State: <?php echo $shipping[0]['state']; ?><br><br>
                                   Country: <?php echo $shipping[0]['country']; ?><br><br>
                                   Postal Code: <?php echo $shipping[0]['postal_code']; ?><br><br>
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                      
                                                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Product Details
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                     <div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered tabe-striped">
												<thead>
													<tr>
														<th>Product Name</th>
														<th>Quantity</th>
														<th>Specification</th>
														<th>Amount</th>
													</tr>
												</thead>
												<tbody>
													<?php $manageContent->getUserProductDetails($oid); ?>
												</tbody>
											</table>
											</div>
										</div>
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
}//if condition ends here
	include 'v-templates/footer.php';
?>