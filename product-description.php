<?php
	session_start();
	$page_title = 'Product Description';
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

<!-- cart section -->

<div class="container">
    <div class="row row-cart">
        <div class="col-sm-3">
            <div class="img-prod-cart">
                <img class="img-responsive" src="images/basket-egg.jpg" />
            </div>
        </div>
        <div class="col-sm-9">
            <h3 class="cart-prod-name">Lorem Ipsum 95BCJ</h3>
            <p class="stock-avail">In Stock <span class="status-stk">(101 items available)</span></p>
            <p class="price-cart">S$1234</p>
            <div class="row">
                <div class="col-sm-5">
                    <div class="det-cont-form">
                        <form method="post" role="form">
                            <div class="form-group">
                                <label class="lbl-cart">Lorem Ipsum</label>
                                <select class="form-control form-cart">
                                    <option>select one</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="lbl-cart">Lorem Ipsum</label>
                                <select class="form-control form-cart">
                                    <option>select one</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                    <option>Lorem Ipsum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="lbl-cart">Quantity</label>
                                <input type="text" class="form-control form-cart quant-cart" />
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-lg btn-warning">
                                    Add To Cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row ends -->
    <div class="row mrgn-tp-cart">
        <div class="col-sm-12">
            <ul class="nav nav-tabs nav-tabs-cart" id="myTab">
              <li class="active"><a href="#des1" data-toggle="tab">Description</a></li>
              <li><a href="#des2" data-toggle="tab">Lorem Details</a></li>
              <li><a href="#des3" data-toggle="tab">Lorem Details More</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane fade in active" id="des1">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="cart-det-para mrgn-tp-cart">
                                lorem Ipsum : Lorem ipsum<br />
                                lorem ipsum : loremm ipsum lorem 2525 lorem.
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor: Lorem ips sit.<br />
                                Lorem ipsum dolor: Lorem ips.<br />
                                Lorem ipsum dolor: Lorem ipsum<br />
                                Lorem ipsum dolor: Lorem ipsum dolor
                            </p>
                        </div>
                    </div>
                </div>
              <div class="tab-pane fade" id="des2">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="cart-det-para mrgn-tp-cart">
                                lorem Ipsum : Lorem ipsum<br />
                                lorem ipsum : loremm ipsum lorem 2525 lorem.
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor: Lorem ips sit.<br />
                                Lorem ipsum dolor: Lorem ips.<br />
                                Lorem ipsum dolor: Lorem ipsum<br />
                                Lorem ipsum dolor: Lorem ipsum dolor
                            </p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="des3">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="cart-det-para mrgn-tp-cart">
                                lorem Ipsum : Lorem ipsum<br />
                                lorem ipsum : loremm ipsum lorem 2525 lorem.
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <h4 class="cart-det-head">
                                Lorem ipsum dolor sit amet
                            </h4>
                            <p class="cart-det-para">
                                Lorem ipsum dolor: Lorem ips sit.<br />
                                Lorem ipsum dolor: Lorem ips.<br />
                                Lorem ipsum dolor: Lorem ipsum<br />
                                Lorem ipsum dolor: Lorem ipsum dolor
                            </p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div><!-- container ends -->

<!-- related products section -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="cart-prod-name rel-head">
                Related Products : 
            </h3>
            <div class="row row-rel-prod mrgn-btm">
                <div class="col-sm-3">
                    <a href="product-description.php">
                        <div class="rel-prod img-thumbnail">
                            <img class="img-responsive" src="images/curly.jpg" />
                            <p class="cart-prod-name-rel">
                                Lorem Ipsum Dolor
                            </p>
                            <p class="price-cart-rel">S$ 1234</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="product-description.php">
                        <div class="rel-prod img-thumbnail">
                            <img class="img-responsive" src="images/curly.jpg" />
                            <p class="cart-prod-name-rel">
                                Lorem Ipsum Dolor
                            </p>
                            <p class="price-cart-rel">S$ 1234</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="product-description.php">
                        <div class="rel-prod img-thumbnail">
                            <img class="img-responsive" src="images/curly.jpg" />
                            <p class="cart-prod-name-rel">
                                Lorem Ipsum Dolor
                            </p>
                            <p class="price-cart-rel">S$ 1234</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="product-description.php">
                        <div class="rel-prod img-thumbnail">
                            <img class="img-responsive" src="images/curly.jpg" />
                            <p class="cart-prod-name-rel">
                                Lorem Ipsum Dolor
                            </p>
                            <p class="price-cart-rel">S$ 1234</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>