<?php
	$page_title = 'Product Description';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
?>
<?php
	if(!isset($GLOBALS['_GET']['name']))
	{
		header("Location: index.php");
	}
	
	$product_name = $GLOBALS['_GET']['name'];
	//get product details
	$pro_details = $manageContent->getProductDetailsInDescriptionPage($product_name, $baseUrl);
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
            <?php
				//getting product pic details
				$manageContent->getProductImageInDetailsPage($pro_details[0]['product_id']);
			?>
        </div>
        <div class="col-sm-5">
            <h3 class="cart-prod-name"><?php echo $pro_details[0]['name'] ?></h3>
            <p class="stock-avail"><?php echo in_stock;?> <span class="status-stk">(<?php echo $pro_details[0]['remaining_stock'].' '.items_available ?>)</span></p>
            <p class="price-cart">
			<?php
				echo $manageContent->getSystemCurrency('product').$pro_details[0][$manageContent->getUserPrice()];
			?>
            </p>
            <div class="row">
                <div class="col-sm-10">
                    <div class="det-cont-form">
                        <form method="post" role="form" name="shopping-cart">
                        	<div class="specification_details">
								<?php
                                    //getting product custom values
                                    $manageContent->getProductCustomValue($pro_details[0]['product_id']);
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="lbl-cart">Quantity </label>
                                <div>
	                                <input type="Button" id='MinusButton' value="-" />
									<input type="text" class="form-cart quant-cart" name="quantity" id="pro_quan" value="1" />
									<input type="Button" id='AddButton' value="+" />
								</div>
                                <div class="form-error" id="err_pro_quan"></div>
                            </div>
                            <div class="form-group">
                            	<input type="hidden" name="mx" value="<?php echo $pro_details[0]['maxpick'] ?>" />
                                <button type="button" class="btn btn-lg btn-warning" id="add-to-cart"><?php echo add_to_cart;?></button>
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
              <li class="active"><a href="#des1" data-toggle="tab"><?php echo description;?></a></li>
              <li><a href="#des2" data-toggle="tab"><?php echo review;?></a></li>
              <li><a href="#des3" data-toggle="tab"><?php echo youtube_video;?></a></li>
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
                        <div class="col-sm-8 mrgn-tp-cart">
                            <?php
								$manageContent->getProductReview($pro_details[0]['product_id']);
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
									$manageContent->getProductLink($pro_details[0]['product_id']);
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

<input type="hidden" id="productId" value="<?php echo $pro_details[0]['product_id'];?>" />
<!-- related products section -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="cart-prod-name rel-head">
                <?php echo related_products;?> :
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