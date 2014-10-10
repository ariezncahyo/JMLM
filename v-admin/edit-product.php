<?php
	$pageTitle = 'Edit Product';
	include 'v-templates/header.php';
?>
<?php
	//getting product id from get method
	$pid = $GLOBALS['_GET']['pid'];
	//get values of product
	$product_details = $manageContent->getInformationForEdit('product_info','product_id',$pid);
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
                    <h1 class="page-header">Edit Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                    <form role="form" action="v-includes/functions/function.edit-product.php" method="post">
                        <h4 class="page_form_caption">Fill Up Product Information</h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Product Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" value="<?php echo $product_details[0]['name'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Selected Category</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" readonly="readonly" value="<?php echo $manageContent->getValueFromId('product_category','categoryId',$product_details[0]['category'],'name') ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Select Category For Edit</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="cat[]" id="add_cat">
                                	<option value="-1">-- Select An Category --</option>
                                    <?php
										//get product category list
										$manageContent->getProductCategoryList();
									?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="add_subcat"></div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Short Description</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="short_des" rows="4"><?php echo $product_details[0]['short_description'] ?></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="des" id="editor1"><?php echo $product_details[0]['description'] ?></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Old Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="old_price" value="<?php echo $product_details[0]['old_price'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Guest Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="guest_price" value="<?php echo $product_details[0]['guest_price'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Member Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="member_price" value="<?php echo $product_details[0]['member_price'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Special Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="special_price" value="<?php echo $product_details[0]['special_price'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Point Value</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="pv" value="<?php echo $product_details[0]['point_value'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Product Stock</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="stock" value="<?php echo $product_details[0]['stock'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Expiry Date</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control exp_date" name="exp_date" value="<?php echo $product_details[0]['exp_date'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Maximum Selection</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="maxpick" value="<?php echo $product_details[0]['maxpick'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Featured Product</label>
                            <div class="col-sm-4">
                                <select name="feature" class="form-control">
                                	<?php
										$manageContent->checkFeatureProduct($pid);
									?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                            	<input type="hidden" name="pid" value="<?php echo $product_details[0]['product_id'] ?>" />
                                <input type="submit" class="btn btn-success btn-lg" value="Submit" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <a class="previous_page_link" href="product-info.php?pid=<?php echo $product_details[0]['product_id'] ?>">Back to Previous Page</a>
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
