<?php
	$page_title = 'Checkout';
	//include template files
	include 'v-templates/header.php';
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
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
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">First Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="First Name">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Last Name">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Company</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Company">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Email Address">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Address">
                                    </div>
                                    <div class="col-sm-10 mrgn-tp-cart">
                                      <input type="text" class="form-cart form-control" placeholder="Address">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">City</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="City">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Zip/Postal Code</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Zip/Postal Code">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Telephone</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Telephone">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">State/Province</label>
                                        <div class="col-sm-12">
                                          <select class="form-cart form-control">
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Country</label>
                                        <div class="col-sm-12">
                                          <select class="form-cart form-control">
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Customer Type</label>
                                        <div class="col-sm-12">
                                          <select class="form-cart form-control">
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                     <div class="col-sm-10">
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Ship to this address
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Ship to different address
                                          </label>
                                        </div>
                                     </div>
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button class="btn btn-warning btn-lg checkout-btn">Continue</button>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
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
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">First Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="First Name">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Last Name">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Company</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Company">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Email Address">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Address</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-cart form-control" placeholder="Address">
                                    </div>
                                    <div class="col-sm-10 mrgn-tp-cart">
                                      <input type="text" class="form-cart form-control" placeholder="Address">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">City</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="City">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Zip/Postal Code</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Zip/Postal Code">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Telephone</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-cart form-control" placeholder="Telephone">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 nul-pad">
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">State/Province</label>
                                        <div class="col-sm-12">
                                          <select class="form-cart form-control">
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Country</label>
                                        <div class="col-sm-12">
                                          <select class="form-cart form-control">
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-v col-sm-12 col-md-12 col-lg-12 control-label">Customer Type</label>
                                        <div class="col-sm-12">
                                          <select class="form-cart form-control">
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                            <option>Lorem Ipsum 1</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                     <div class="col-sm-10">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" value="">
                                            Use Billing Address
                                          </label>
                                        </div>
                                     </div>
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button class="btn btn-warning btn-lg checkout-btn">Continue</button>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
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
                            <form role="form" method="post">
                                <div class="col-sm-12">
                                    <h5 class="ship-text">
                                        Air Shipping (Delivery timeline 10 working days. Working days does not include Sat and Sun)<br>
                                        <span class="ship-text-span">Rs.25 (Per Piece) Total.   Rs. 275</span>
                                    </h5>
                                </div>
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button class="btn btn-warning btn-lg checkout-btn">Continue</button>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
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
                            <form role="form" method="post">
                                <div class="col-sm-10">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                        <h4 class="ship-text ship-text-span">Online Payment</h4>
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        <h4 class="ship-text ship-text-span">Cheque / Bank Transfer (Your order will be on hold until the full payment is received)</h4>
                                      </label>
                                    </div>
                                 </div>
                                <div class="row mrgn-tp-cart">
                                    <div class="col-md-12">
                                        <div class="cart-btn">
                                            <button class="btn btn-warning btn-lg checkout-btn">Continue</button>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive">
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
                        <form role="form" method="post" action="purchased.php">
                            <div class="col-sm-10">
                                <table class="table table-bordered table-order-review">
                                    <thead>
                                        <tr><th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr></thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Lorem Ipsum<br>
                                                Loremlo<br>
                                                <span>S</span><br>
                                                Lore<br>
                                                <span>Lorem</span>
                                            </td>
                                            <td><span>Rs.199</span></td>
                                            <td>1</td>
                                            <td><span>Rs.199</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Lorem Ipsum<br>
                                                Loremlo<br>
                                                <span>S</span><br>
                                                Lore<br>
                                                <span>Lorem</span>
                                            </td>
                                            <td><span>Rs.199</span></td>
                                            <td>1</td>
                                            <td><span>Rs.199</span></td>
                                        </tr>
                                        <tr>
                                            <td class="brdr-right-nul"><span>Subtotal</span></td>
                                            <td class="brdr-left-nul brdr-right-nul"></td>
                                            <td class="brdr-left-nul brdr-right-nul"></td>
                                            <td><span>Rs.2,189</span></td>
                                        </tr>
                                        <tr>
                                            <td class="brdr-right-nul"><span>Shipping &amp; Handling (Air Shipping (Delivery timeline 10 working days. Working days does not include Sat and Sun))</span></td>
                                            <td class="brdr-left-nul brdr-right-nul"></td>
                                            <td class="brdr-left-nul brdr-right-nul"></td>
                                            <td><span>Rs.2,189</span></td>
                                        </tr>
                                        <tr>
                                            <td class="brdr-right-nul"><span class="grand-head">Grand Total</span></td>
                                            <td class="brdr-left-nul brdr-right-nul"></td>
                                            <td class="brdr-left-nul brdr-right-nul"></td>
                                            <td><span>Rs.2,189</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                             </div>
                            <div class="row mrgn-tp-cart">
                                <div class="col-md-6">
                                   <a href="cart.php" class="edit-cart btn-link-custom">EDIT YOUR CART</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-btn">
                                        <button class="btn btn-warning checkout-btn">Continue</button>
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
