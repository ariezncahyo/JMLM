<?php
	$page_title = 'Checkout';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
?>
<?php
	//checking for empty cart
	if(!isset($GLOBALS['_COOKIE'][$_SESSION['user_id']]))
	{
		header("Location: view-cart/");
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

<!-- checkout form -->
<?php
	//getting values of user info
	$userInfo = $manageContent->getUserInfo();
	//get paypal payment method
	$payment_method = $manageContent->getPaypalPaymentMethodStatus();
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
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default panel-default-custom">
                <div class="panel-heading">
                  <h4 class="panel-title panel-title-custom">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="checkout-one">
                      Billing Information
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="head-bill">
                                Billing Information
                            </h4>
                            <form role="form" id="billing_info">
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">First Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="bill_fname" placeholder="First Name" name="f_name" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['f_name'].'"'; } ?>>
                                      <div class="form-error" id="err_bill_fname"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="bill_lname" placeholder="Last Name" name="l_name" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['l_name'].'"'; } ?>>
                                      <div class="form-error" id="err_bill_lname"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Company</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="bill_comp" placeholder="Company" name="company" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['company'].'"'; } ?>>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="bill_email" placeholder="Email Address" name="email_id" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['email_id'].'"'; } ?>/>
                                      <div class="form-error" id="err_bill_email"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="bill_addr1" placeholder="Address" name="addr1" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['addr_1'].'"'; } ?>>
                                      <div class="form-error" id="err_bill_addr1"></div>
                                    </div>
                                    <div class="col-sm-10 mrgn-tp-cart">
                                      <input type="text" class="form-cart form-control" id="bill_addr2" placeholder="Address" name="addr2" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['addr_2'].'"'; } ?>>
                                      <div class="form-error" id="err_bill_addr2"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">City</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="bill_city" placeholder="City" name="city" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['city'].'"'; } ?>>
                                          <div class="form-error" id="err_bill_city"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Zip/Postal Code</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="bill_zip" placeholder="Zip/Postal Code" name="postal_code" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['postal_code'].'"'; } ?>>
                                          <div class="form-error" id="err_bill_zip"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Phone Number</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="bill_phone" placeholder="Phone Number" name="phone" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['phone'].'"'; } ?>>
                                          <div class="form-error" id="err_bill_phone"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">State/Province</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="bill_state" placeholder="State" name="state" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['state'].'"'; } ?>>
                                          <div class="form-error" id="err_bill_state"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Country</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="bill_country" placeholder="Country" name="country" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['country'].'"'; } ?>>
                                          <div class="form-error" id="err_bill_country"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button type="button" class="btn btn-warning btn-lg checkout-btn" id="billing_btn" data-toggle="collapse" data-parent="#accordion"  data-target="#collapseTwo">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default panel-default-custom">
                <div class="panel-heading">
                  <h4 class="panel-title panel-title-custom">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="checkout-two">
                      Shipping Information
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="head-bill">
                                Shipping Information
                            </h4>
                            <form role="form" id="shipping_info">
                            	<div class="col-sm-10">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" name="addr_condition" id="addr_condition">
                                        Use Billing Address
                                      </label>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">First Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="ship_fname" placeholder="First Name" name="f_name">
                                      <div class="form-error" id="err_ship_fname"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="ship_lname" placeholder="Last Name" name="l_name">
                                      
                                      <div class="form-error" id="err_ship_lname"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Company</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Company" name="company">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="ship_email" placeholder="Email Address" name="email_id">
                                      <div class="form-error" id="err_ship_email"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" id="ship_addr1" placeholder="Address" name="addr1">
                                      <div class="form-error" id="err_ship_addr1"></div>
                                    </div>
                                    <div class="col-sm-10 mrgn-tp-cart">
                                      <input type="text" class="form-cart form-control" id="ship_addr2" placeholder="Address" name="addr2">
                                      <div class="form-error" id="err_ship_addr2"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">City</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="ship_city" placeholder="City" name="city">
                                          <div class="form-error" id="err_ship_city"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Zip/Postal Code</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="ship_zip" placeholder="Zip/Postal Code" name="postal_code">
                                          <div class="form-error" id="err_ship_zip"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Telephone</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="ship_phone" placeholder="Telephone" name="phone">
                                          <div class="form-error" id="err_ship_phone"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">State/Province</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="ship_state" placeholder="State" name="state">
                                          <div class="form-error" id="err_ship_state"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Country</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" id="ship_country" placeholder="State" name="country">
                                          <div class="form-error" id="err_ship_country"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                     
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button type="button" class="btn btn-warning btn-lg checkout-btn" id="shipping_btn" data-toggle="collapse" data-parent="#accordion"  data-target="#collapseThree">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default panel-default-custom">
                <div class="panel-heading">
                  <h4 class="panel-title panel-title-custom">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" id="checkout-three">
                      Shipping Method
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="head-bill">
                                Shipping Method
                            </h4>
                            <form role="form" id="shipping_method">
                                <div class="col-sm-12">
                                    <h5 class="ship-text">
                                        <?php
											//get shipping cost
											$manageContent->getShippingChargesInCheckoutPage();
										?>
                                    </h5>
                                </div>
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button type="button" class="btn btn-warning btn-lg checkout-btn" id="shipping_method_btn" data-toggle="collapse" data-parent="#accordion"  data-target="#collapsefour">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default panel-default-custom">
                <div class="panel-heading">
                  <h4 class="panel-title panel-title-custom">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour" id="checkout-four">
                      Payment Information
                    </a>
                  </h4>
                </div>
                <div id="collapsefour" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="head-bill">
                                Payment Information
                            </h4>
                            <form role="form" id="payment_info">
                                <div class="col-sm-10">
                                    <div class="radio" id="bank">
                                      <label>
                                        <input type="radio" name="payment_info" value="bank" checked="checked">
                                        <h4 class="ship-text ship-text-span">Cheque / Bank Transfer (Your order will be on hold until the full payment is received)</h4>
                                      </label>
                                    </div>
                                    <div class="radio" id="online">
                                      <label>
                                        <input type="radio" name="payment_info" value="online">
                                        <h4 class="ship-text ship-text-span">Online Payment</h4>
                                      </label>
                                    </div>
                                    <div class="radio" id="cod">
                                      <label>
                                        <input type="radio" name="payment_info" value="cod">
                                        <h4 class="ship-text ship-text-span">Cash On Delivery</h4>
                                      </label>
                                    </div>
                                    <div class="form-error" id="err_payment_info"></div>
                                 </div>
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button type="button" class="btn btn-warning btn-lg checkout-btn" id="payment_info_btn" data-toggle="collapse" data-parent="#accordion"  data-target="#collapsefive">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default panel-default-custom">
                <div class="panel-heading">
                  <h4 class="panel-title panel-title-custom">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive" id="checkout-five">
                      Order Review
                    </a>
                  </h4>
                </div>
                <div id="collapsefive" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="col-sm-12">
                        <h4 class="head-bill">
                            Order Review
                        </h4>
                        <div  id="cod_btn">
	                        <form role="form" id="order_info">
	                            <div class="col-sm-10">
	                                <table class="table table-bordered table-order-review">
	                                    <thead>
	                                        <tr><th>Product Name</th>
	                                        <th>Specification</th>
	                                        <th>Price</th>
	                                        <th>Qty</th>
	                                        <th>Subtotal</th>
	                                    </tr></thead>
	                                    <tbody>
	                                        
	                                        <?php
												//get order details
												$manageContent->getAmountDetailsInCheckoutPage();
											?>
	                                        
	                                    </tbody>
	                                </table>
	                             </div>
	                            <div class="row mrgn-tp-cart">
	                                <div class="col-md-6">
	                                   <a href="<?php echo $baseUrl;?>view-cart/" class="edit-cart btn-link-custom">EDIT YOUR CART</a>
	                                </div>
	                                <div class="col-md-6">
	                                    <div class="cart-btn">
	                                        <button type="button" class="btn btn-warning checkout-btn" id="order_overview_btn">CHECKOUT</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </form>
                        </div>
                        
                        <div id="paypal_btn">
                            <div class="col-sm-10">
                                <table class="table table-bordered table-order-review">
                                    <thead>
                                        <tr><th>Product Name</th>
                                        <th>Specification</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr></thead>
                                    <tbody>
                                        
                                        <?php
											//get order details
											$manageContent->getAmountDetailsInCheckoutPage();
										?>
                                        
                                    </tbody>
                                </table>
                             </div>
                            <div class="row mrgn-tp-cart">
                                <div class="col-md-6">
                                   <a href="<?php echo $baseUrl;?>view-cart/" class="edit-cart btn-link-custom">EDIT YOUR CART</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-btn">
                                    	<?php 
                                    	
                                    	if($payment_method == 0)
										{
											echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">';
										}
										elseif ($payment_method == 1) 
										{
											echo '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">';
										}
                                    	?>
                                        	<input type="hidden" name="cmd" value="_xclick">
											<input type="hidden" name="business" value="K5DS2MUFW8KXN">
											<input type="hidden" name="lc" value="SG">
											<input type="hidden" name="item_name" value="Total Price">
											<input type="hidden" name="item_number" value="<?php $manageContent->getTotalProductInCart(); ?>">
											<input type="hidden" name="amount" value="<?php echo $_SESSION['total_amount']; ?>">
											<input type="hidden" name="currency_code" value="SGD">
											<input type="hidden" name="button_subtype" value="services">
											<input type="hidden" name="no_note" value="0">
											<input type="hidden" name="no_shipping" value="2">
											<input type="hidden" name="rm" value="1">
											<input type="hidden" name="return" value="http://test.dip.com.sg/mlm/v-includes/functions/function.paypal-return.php?action=<?php echo md5('order_success'); ?>">
											<input type="hidden" name="cancel_return" value="http://test.dip.com.sg/mlm/v-includes/functions/function.paypal-return.php?action=<?php echo md5('order_decline'); ?>">
											<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
											<input type="submit" class="btn btn-warning checkout-btn" value="PAYPAL PAYMENT"/>
										</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
				

<?php
	include 'v-templates/footer.php';
?>
