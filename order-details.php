<?php
	$page_title = 'Order Details';
	//include template files
	include 'v-templates/header.php';
	
	
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
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
                                <div class="rgt-col-para brdr-none">
                                 <p><b>Order Id:</b><span> <?php echo $basic[0]['order_id']; ?></span></p>
                                 <p><b>Order By: </b><span> <?php echo $user; ?></span></p>
                                 <p><b>Payment Method: </b><span> <?php echo $payment; ?></span></p>
                                 <p><b>Shipping Charge: </b><span> <?php echo $currency.$basic[0]['shipping_charge']; ?></span></p>
                                 <p><b>Total Amount: </b><span> <?php echo $currency.$basic[0]['total_amount']; ?></span></p>
                                 <p><b>Purchase On: </b><span> <?php echo $basic[0]['date']; ?></span></p>
                                 <p><b>Order status: </b><span> <?php echo $basic[0]['order_status']; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                                 
                                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Order Billing Info
                                </h4>
                                <div class="rgt-col-para brdr-none">
                                   <p><b>Name: </b><span> <?php echo $billing[0]['f_name'].' '. $billing[0]['l_name']; ?></span></p>
                                   <p><b>Email Id: </b><span> <?php echo $billing[0]['email_id']; ?></span></p>
                                   <p><b>Address: </b><span> <?php echo $billing[0]['addr_1'].' '.$billing[0]['addr_2']; ?></span></p>
                                   <p><b>Contact No: </b><span> <?php echo $billing[0]['contact_no']; ?></span></p>
                                   <p><b>City: </b><span> <?php echo $billing[0]['city']; ?></span></p>
                                   <p><b>State: </b><span> <?php echo $billing[0]['state']; ?></span></p>
                                   <p><b>Country: </b><span> <?php echo $billing[0]['country']; ?></span></p>
                                   <p><b>Postal Code: </b><span> <?php echo $billing[0]['postal_code']; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                                                    
                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Order Shipping Details
                                </h4>
                                <div class="rgt-col-para brdr-none">
                                   <p><b>Name: </b><span> <?php echo $shipping[0]['f_name'].' '. $shipping[0]['l_name']; ?></span></p>
                                   <p><b>Email Id: </b><span> <?php echo $shipping[0]['email_id']; ?></span></p>
                                   <p><b>Address: </b><span> <?php echo $shipping[0]['addr_1'].' '.$shipping[0]['addr_2']; ?></span></p>
                                   <p><b>Contact No: </b><span> <?php echo $shipping[0]['contact_no']; ?></span></p>
                                   <p><b>City: </b><span> <?php echo $shipping[0]['city']; ?></span></p>
                                   <p><b>State: </b><span> <?php echo $shipping[0]['state']; ?></span></p>
                                   <p><b>Country: </b><span> <?php echo $shipping[0]['country']; ?></span></p>
                                   <p><b>Postal Code: </b><span> <?php echo $shipping[0]['postal_code']; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                      
                                                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Product Details
                                </h4>
                                <div class="rgt-col-para brdr-none">
                                     <div class="panel-body">
										<div class="table-responsive">
											<table class="table table-hover table-custom">
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
								</div>
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