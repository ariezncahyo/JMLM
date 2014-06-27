<?php
	session_start();
	$page_title = 'View Cart';
	//include template files
	include 'v-templates/header-guest.php';
?>
						
<!-- navbar second profile -->

<nav class="navbar navbar-scnd-prof" role="navigation">
    <div class="container">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle nav-toggle-custom" data-toggle="collapse" data-target="#collapsenavscndprof">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar icn-custom"></span>
                <span class="icon-bar icn-custom"></span>
                <span class="icon-bar icn-custom"></span>
            </button>
        </div><!-- navbar-header ends -->
        
        <!-- navbar elements for toggling -->
        <div class="collapse navbar-collapse" id="collapsenavscndprof">
            <ul class="nav navbar-nav nav-custom-scnd-prof">
                <li><a href="index.php"><span class="active-scnd-prof">HOME</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">ABOUT US</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">SERVICES</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">MEDIA</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">MEMBERSHIP</span></a></li>
            </ul>
        </div><!-- collapsenavprof ends -->
        
    </div><!-- container fluid ends -->
</nav>

<div class="row row-mrgn-nul row-mrgn-cart hd-carousel">
    <div class="col-sm-12">
    </div>
</div>

<!-- view cart section -->

<div class="container">
    <div class="row">
        <form method="post" role="form" action="checkout.php">
        <div class="col-sm-8">
            <h3 class="cart-prod-name">
                Your shopping cart - 2 Items
            </h3>
            <div class="view-cart-container">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="rmv">
                            <button class="btn btn-link btn-rmv">x</button>
                        </div><!-- rmv ends -->
                    </div>
                    <div class="col-sm-2 col-xs-5">
                        <img src="images/curly.jpg" class="img-responsive" />
                    </div>
                    <div class="col-sm-5 col-xs-7">
                        <p class="prod-v-crt-name">
                            Lorem Ipsum 101AKT
                        </p>
                        <p class="prod-details-v-cart">
                            <span class="lbl-det">
                                Lorem Ipsum : 
                            </span>
                            <span class="lbl-rslt">
                                101ab , 
                            </span>
                            <span class="lbl-det">
                                Lorem Ips : 
                            </span>
                            <span class="lbl-rslt">
                                lorem
                            </span>
                        </p>
                        <p class="prod-details-v-cart">
                            <span class="lbl-det">
                                Lorem Ipsum : 
                            </span>
                            <span class="lbl-rslt">
                                lorem Ipsum 101abc
                            </span>
                        </p>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <div class="quant-cart-v-cart">
                            <p class="price-cart-rel">S$199</p>
                            <p class="mult-v-cart">x</p>
                            <div class="quant-num">
                                <input type="text" class="form-control form-cart" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <p class="price-cart-rel">S$199</p>
                    </div>
                </div><!-- row ends -->
            </div><!-- view cart container ends -->
            <div class="view-cart-container">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="rmv">
                            <button class="btn btn-link btn-rmv">x</button>
                        </div><!-- rmv ends -->
                    </div>
                    <div class="col-sm-2 col-xs-5">
                        <img src="images/curly.jpg" class="img-responsive" />
                    </div>
                    <div class="col-sm-5 col-xs-7">
                        <p class="prod-v-crt-name">
                            Lorem Ipsum 101AKT
                        </p>
                        <p class="prod-details-v-cart">
                            <span class="lbl-det">
                                Lorem Ipsum : 
                            </span>
                            <span class="lbl-rslt">
                                101ab , 
                            </span>
                            <span class="lbl-det">
                                Lorem Ips : 
                            </span>
                            <span class="lbl-rslt">
                                lorem
                            </span>
                        </p>
                        <p class="prod-details-v-cart">
                            <span class="lbl-det">
                                Lorem Ipsum : 
                            </span>
                            <span class="lbl-rslt">
                                lorem Ipsum 101abc
                            </span>
                        </p>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <div class="quant-cart-v-cart">
                            <p class="price-cart-rel">S$199</p>
                            <p class="mult-v-cart">x</p>
                            <div class="quant-num">
                                <input type="text" class="form-control form-cart" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <p class="price-cart-rel">S$199</p>
                    </div>
                </div><!-- row ends -->
            </div><!-- view cart container ends -->
            <div class="sub-total">
                <div class="row">
                    <div class="col-sm-2">
                        <button class="btn btn-link btn-link-custom">
                            Empty Your Cart
                        </button>
                    </div>
                    <div class="col-sm-offset-7 col-sm-3">
                        <p class="prod-v-crt-name">Subtotal : S$199</p>
                    </div>
                </div>
            </div>
        </div><!-- col-sm-8 ends -->
        <div class="col-sm-4">
            <div class="checkout-content">
                <div class="row">
                    <div class="col-xs-8">
                        <p class="prod-v-crt-name">
                            Subtotal : 
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p class="prod-v-crt-name txt-rt">$199</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <p class="prod-v-crt-name">
                            Shipping Cost :  
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p class="prod-v-crt-name txt-rt">$0</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <p class="prod-v-crt-name">
                            Discount :   
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p class="prod-v-crt-name txt-rt">$0</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <p class="prod-v-crt-total">
                            <em>Shipping Cost :  </em>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p class="prod-v-crt-total txt-rt"><em>$199</em></p>
                    </div>
                </div>
                <div class="row btn-cust-row">
                    <div class="col-xs-6">
                        <button class="btn btn-warning pull-left">
                            Continue Shopping
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <button class="btn btn-warning pull-right">
                            Go To Checkout
                        </button>
                    </div>
                </div>
            </div><!-- checkout-content ends -->
        </div>
        </form>
    </div><!-- row ends -->
</div><!-- container ends -->
				
<?php
	include 'v-templates/footer.php';
?>