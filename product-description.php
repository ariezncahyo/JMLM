<?php
	$page_title = 'Product Description';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
	}
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
            <!--<div class="img-prod-cart">
            	<li>
                	<img class="img-responsive" src="images/basket-egg.jpg" />
                </li>
                <li>
                	<img class="img-responsive" src="images/basket-egg.jpg" />
                </li>
                <div class="clearfix"></div>
            </div>-->
            <?php
				//getting product pic details
				$manageContent->getProductImageInDetailsPage($product_id);
			?>
        </div>
        <div class="col-sm-9">
            <h3 class="cart-prod-name"><?php echo $pro_details[0]['name'] ?></h3>
            <p class="stock-avail">In Stock <span class="status-stk">(<?php echo $pro_details[0]['remaining_stock'] ?> items available)</span></p>
            <p class="price-cart">
			<?php
				echo $manageContent->getSystemCurrency('product').$pro_details[0][$manageContent->getUserPrice()];
			?>
            </p>
            <div class="row">
                <div class="col-sm-5">
                    <div class="det-cont-form">
                        <form method="post" role="form" name="shopping-cart">
                        	<div class="specification_details">
								<?php
                                    //getting product custom values
                                    $manageContent->getProductCustomValue($product_id);
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="lbl-cart">Quantity</label>
                                <input type="text" class="form-control form-cart quant-cart" name="quantity" id="pro_quan"/>
                                <div class="form-error" id="err_pro_quan"></div>
                            </div>
                            <div class="form-group">
                            	<input type="hidden" name="mx" value="<?php echo $pro_details[0]['maxpick'] ?>" />
                                <button type="button" class="btn btn-lg btn-warning" id="add-to-cart">Add To Cart</button>
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