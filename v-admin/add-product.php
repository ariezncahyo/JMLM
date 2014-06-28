<?php
	$pageTitle = 'Add Product';
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
                    <h1 class="page-header">Add Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                    <form role="form" action="v-includes/functions/function.add-product.php" method="post">
                        <h4 class="page_form_caption">Fill Up Product Information</h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Product Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Category</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="cat" id="pro_cat">
                                	<option>-- Select An Category --</option>
                                    <?php
										//get product category list
										$manageContent->getProductCategoryList();
									?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="pro_subcat"></div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="des" id="editor1"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Old Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="old_price" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Guest Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="guest_price" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Member Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="member_price" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Special Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="special_price" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Distribution Rate</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="distribution_rate" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Product Stock</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="stock" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Expiry Date</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control exp_date" name="exp_date" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Maximum Selection</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="maxpick" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Featured Product</label>
                            <div class="col-sm-4">
                                <select name="feature" class="form-control">
                                	<option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-success btn-lg" value="Submit" />
                                <input type="reset" class="btn btn-danger btn-lg" value="Reset Data" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
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
