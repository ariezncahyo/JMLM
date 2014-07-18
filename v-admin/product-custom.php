<?php
	$pageTitle = 'Product Customization';
	//getting product id
	if(!isset($GLOBALS['_GET']['pid']))
	{
		header("Location: list-product.php");
	}
	$pid = $GLOBALS['_GET']['pid'];
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
        <div id="page-wrapper">
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
                <div class="col-lg-12">
                    <h1 class="page-header">Product Customization</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                    <form role="form" action="v-includes/functions/function.product-custom.php" method="post">
                        <h4 class="page_form_caption">Fill Up Product Information</h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Select Product Specification</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="speci">
                                    <option value="color">Color</option>
                                    <option value="size">Size</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                            	<input type="hidden" name="pro" value="<?php echo $pid; ?>" />
                            	<input type="hidden" name="op" value="set_product" />
                                <input type="submit" class="btn btn-success btn-lg" value="Submit" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
            
            <?php 
				if(isset($GLOBALS['_GET']['action'])) {
				//get values of product
				$product_details = $manageContent->getInformationForEdit('product_info','product_id',$_GET['pid']); 
			?>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                	
                    <form role="form" action="v-includes/functions/function.product-custom.php" method="post">
                    	<?php if($_GET['action'] == 'add'){?>
                        <h4 class="page_form_caption">Add Information About <?php echo $product_details[0]['name'] ?> <?php echo $_GET['speci'] ?></h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Product Color</label>
                            <div class="col-sm-5 color_textbox">
                                <input type="text" class="form-control pro_custom_color pull-left" name="pro[]" />
                                <div class="pull-left"><button type="button" class="btn btn-danger btn-sm color_delete">Delete</button></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                            	<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>" />
                                <input type="hidden" name="speci" value="<?php echo $_GET['speci']; ?>" />
                            	<input type="hidden" name="op" value="add_pro" />
                                <input type="button" class="btn btn-warning btn-lg add_speci" value="Add Another" />
                                <input type="submit" class="btn btn-success btn-lg" value="Submit" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php } else if($_GET['action'] == 'edit') { ?>
                        <h4 class="page_form_caption">Edit Information About <?php echo $product_details[0]['name'] ?> <?php echo $_GET['speci'] ?></h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Product Color</label>
                            <div class="col-sm-5 color_textbox">
                                <?php
									//getting values
									$manageContent->getProductCustomValue($_GET['pid'],$_GET['speci']);
								?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                            	<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>" />
                                <input type="hidden" name="speci" value="<?php echo $_GET['speci']; ?>" />
                            	<input type="hidden" name="op" value="edit_pro" />
                                <input type="button" class="btn btn-warning btn-lg add_speci" value="Add Another" />
                                <input type="submit" class="btn btn-success btn-lg" value="Update" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php } ?>
                    </form>
                    
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
            <?php }  ?>
            <!-- previous page link -->
            <p class="previous_page_link"><a href="product-info.php?pid=<?php echo $pid; ?>">Back To Previous Page</a></p>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
