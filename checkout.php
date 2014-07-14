<?php
	$page_title = 'Checkout';
	//include template files
	include 'v-templates/header.php';
?>
<?php
	//checking for empty cart
	if(!isset($GLOBALS['_COOKIE'][$_SESSION['user_id']]))
	{
		header("Location: view-cart.php");
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
                                      <input type="text" class="form-cart form-control" placeholder="First Name" name="f_name" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['f_name'].'"'; } ?>>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Last Name" name="l_name" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['l_name'].'"'; } ?>>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Company</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Company" name="company" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['company'].'"'; } ?>>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Email Address" name="email_id" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['email_id'].'"'; } ?>/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Address" name="addr1" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['addr_1'].'"'; } ?>>
                                    </div>
                                    <div class="col-sm-10 mrgn-tp-cart">
                                      <input type="text" class="form-cart form-control" placeholder="Address" name="addr2" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['addr_2'].'"'; } ?>>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">City</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="City" name="city" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['city'].'"'; } ?>>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Zip/Postal Code</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Zip/Postal Code" name="postal_code" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['postal_code'].'"'; } ?>>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Phone Number</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Phone Number" name="phone" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['phone'].'"'; } ?>>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">State/Province</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="State" name="state" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['state'].'"'; } ?>>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Country</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Country" name="country" <?php if(!empty($userInfo[0])) { echo 'value="'.$userInfo[0]['country'].'"'; } ?>>
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
                                      <input type="text" class="form-cart form-control" placeholder="First Name" name="f_name">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Last Name" name="l_name">
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
                                      <input type="text" class="form-cart form-control" placeholder="Email Address" name="email_id">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Address" name="addr1">
                                    </div>
                                    <div class="col-sm-10 mrgn-tp-cart">
                                      <input type="text" class="form-cart form-control" placeholder="Address" name="addr2">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">City</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="City" name="city">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Zip/Postal Code</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Zip/Postal Code" name="postal_code">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Telephone</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Telephone" name="phone">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">State/Province</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="State" name="state">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Country</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="State" name="country">
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
                                    <div class="radio" id="online">
                                      <label>
                                        <input type="radio" name="payment_info" value="online" checked="checked">
                                        <h4 class="ship-text ship-text-span">Online Payment</h4>
                                      </label>
                                    </div>
                                    <div class="radio" id="bank">
                                      <label>
                                        <input type="radio" name="payment_info" value="bank">
                                        <h4 class="ship-text ship-text-span">Cheque / Bank Transfer (Your order will be on hold until the full payment is received)</h4>
                                      </label>
                                    </div>
                                    <div class="radio" id="cod">
                                      <label>
                                        <input type="radio" name="payment_info" value="cod">
                                        <h4 class="ship-text ship-text-span">Cash On Delivery</h4>
                                      </label>
                                    </div>
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
                                   <a href="view-cart.php" class="edit-cart btn-link-custom">EDIT YOUR CART</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-btn">
                                        <button type="button" class="btn btn-warning checkout-btn" id="order_overview_btn">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
