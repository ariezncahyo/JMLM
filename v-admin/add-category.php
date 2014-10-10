<?php
	$pageTitle = 'Add Category';
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
                    <h1 class="page-header">Add Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                    <form role="form" action="v-includes/functions/function.add-category.php" method="post">
                        <h4 class="page_form_caption">Fill Up Category Information</h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Category Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Nested Under</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="cat[]" id="add_cat">
                                	<option value="-1">-- Select A Category --</option>
                                    <?php
										//get product category list
										$manageContent->getProductRootCategory();
									?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="add_subcat"></div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Upload Photo</label>
                            <div class="col-sm-7">
                                <input type="file" name="picture" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-success btn-lg" value="Submit Data" />
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
