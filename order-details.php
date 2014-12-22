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
		$basic = $manageContent->getUserOrderBasicDetails($oid, $baseUrl);
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
                                    <?php echo order_basic_info;?>
                                </h4>
                                <div class="rgt-col-para brdr-none">
                                 <p><b><?php echo order_id;?>:</b><span> <?php echo $basic[0]['order_id']; ?></span></p>
                                 <p><b><?php echo order_by;?>: </b><span> <?php echo $user; ?></span></p>
                                 <p><b><?php echo payment_method;?>: </b><span> <?php echo $payment; ?></span></p>
                                 <p><b><?php echo shipping_charge;?>: </b><span> <?php echo $currency.$basic[0]['shipping_charge']; ?></span></p>
                                 <p><b><?php echo total_amount;?>: </b><span> <?php echo $currency.$basic[0]['total_amount']; ?></span></p>
                                 <p><b><?php echo purchase_on;?>: </b><span> <?php echo $basic[0]['date']; ?></span></p>
                                 <p><b><?php echo order_status;?>: </b><span> <?php echo $basic[0]['order_status']; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                                 
                                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    <?php echo order_billing_info;?>
                                </h4>
                                <div class="rgt-col-para brdr-none">
                                   <p><b><?php echo name;?>: </b><span> <?php echo $billing[0]['f_name'].' '. $billing[0]['l_name']; ?></span></p>
                                   <p><b><?php echo email_id;?>: </b><span> <?php echo $billing[0]['email_id']; ?></span></p>
                                   <p><b><?php echo address;?>: </b><span> <?php echo $billing[0]['addr_1'].' '.$billing[0]['addr_2']; ?></span></p>
                                   <p><b><?php echo contact_no;?>: </b><span> <?php echo $billing[0]['contact_no']; ?></span></p>
                                   <p><b><?php echo city;?>: </b><span> <?php echo $billing[0]['city']; ?></span></p>
                                   <p><b><?php echo state_province;?>: </b><span> <?php echo $billing[0]['state']; ?></span></p>
                                   <p><b><?php echo country;?>: </b><span> <?php echo $billing[0]['country']; ?></span></p>
                                   <p><b><?php echo zip_postal_code;?>: </b><span> <?php echo $billing[0]['postal_code']; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                                                    
                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    <?php echo order_shipping_details;?>
                                </h4>
                                <div class="rgt-col-para brdr-none">
                                   <p><b><?php echo name;?>: </b><span> <?php echo $shipping[0]['f_name'].' '. $shipping[0]['l_name']; ?></span></p>
                                   <p><b><?php echo email_id;?>: </b><span> <?php echo $shipping[0]['email_id']; ?></span></p>
                                   <p><b><?php echo address;?>: </b><span> <?php echo $shipping[0]['addr_1'].' '.$shipping[0]['addr_2']; ?></span></p>
                                   <p><b><?php echo contact_no;?>: </b><span> <?php echo $shipping[0]['contact_no']; ?></span></p>
                                   <p><b><?php echo city;?>: </b><span> <?php echo $shipping[0]['city']; ?></span></p>
                                   <p><b><?php echo state_province;?>: </b><span> <?php echo $shipping[0]['state']; ?></span></p>
                                   <p><b><?php echo country;?>: </b><span> <?php echo $shipping[0]['country']; ?></span></p>
                                   <p><b><?php echo zip_postal_code;?>: </b><span> <?php echo $shipping[0]['postal_code']; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                                      
                                                
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    <?php echo product_details;?>
                                </h4>
                                <div class="rgt-col-para brdr-none">
                                     <div class="panel-body">
										<div class="table-responsive">
											<table class="table table-hover table-custom">
												<thead>
													<tr>
														<th><?php echo product_name;?></th>
														<th><?php echo quantity;?></th>
														<th><?php echo specification;?></th>
														<th><?php echo amount;?></th>
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