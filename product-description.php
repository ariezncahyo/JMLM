<?php
	$page_title = 'Product Description';
	//include template files
	include 'v-templates/header.php';
?>
<?php
	if(!isset($GLOBALS['_GET']['pro']))
	{
		header("Location: index.php");
	}
	
	$product_id = $GLOBALS['_GET']['pro'];
	//get product details
	$pro_details = $manageContent->getProductDetailsInDescriptionPage($product_id);
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
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
	<div class="row">
        <div class="col-lg-12">
            <!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row row-cart pro_des_row">
        <div class="col-sm-3">
            <div class="img-prod-cart">
                <img class="img-responsive" src="images/basket-egg.jpg" />
            </div>
        </div>
        <div class="col-sm-9">
            <h3 class="cart-prod-name"><?php echo $pro_details[0]['name'] ?></h3>
            <p class="stock-avail">In Stock <span class="status-stk">(<?php echo $pro_details[0]['stock'] ?> items available)</span></p>
            <p class="price-cart"><?php echo $pro_details[0]['member_price'] ?></p>
            <div class="row">
                <div class="col-sm-5">
                    <div class="det-cont-form">
                        <form method="post" role="form">
                            <?php
								//getting product custom values
								$manageContent->getProductCustomValue($product_id);
							?>
                            <div class="form-group">
                                <label class="lbl-cart">Quantity</label>
                                <input type="text" class="form-control form-cart quant-cart" name="quantity"/>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-lg btn-warning">Add To Cart</button>
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
              <li><a href="#des2" data-toggle="tab">Review</a></li>
              <li><a href="#des3" data-toggle="tab">YouTube Video</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane fade in active" id="des1">
                    <div class="row">
                        <div class="col-sm-12 mrgn-tp-cart">
                            <?php
								echo $pro_details[0]['description'];
							?>
                        </div>
                    </div>
                </div>
              <div class="tab-pane fade" id="des2">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-12 mrgn-tp-cart">
                            <?php
								echo $pro_details[0]['description'];
							?>
                        </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="des3">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="youTube_outline">
                            	<?php
									//get youTube video
									$manageContent->getProductLink($product_id);
								?>
                            </div>
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
                <?php 
					$manageContent->getRelativeProductListOfCategory($pro_details[0]['category'],$pro_details[0]['product_id']); 
				?>
            </div>
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>