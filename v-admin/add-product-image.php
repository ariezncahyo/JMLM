<?php
	$pageTitle = 'Add Product Image';
	//get product id
	if(!isset($GLOBALS['_GET']['pid']))
	{
		header("Location: admin.php");
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
                    <h1 class="page-header">Add Product Image</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
            	<div class="col-sm-12">
                	<h4 class="page_form_caption">Product Image Gallery</h4>
                </div>
                <?php
					//get product image gallery
					$manageContent->getProductImageList($pid);
				?>
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                    <form role="form" action="#" method="post">
                        <h4 class="page_form_caption">Upload Product Image</h4>
                        <div class="form-group">
                        	<label class="control-label admin_form_label col-sm-3">Image Order</label>
                            <div class="col-sm-6">
                              <select name="img_order" class="form-control" id="upload-img-order">
                              	<option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                              </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                        	<label class="control-label admin_form_label col-sm-3">Upload Image</label>
                            <div class="col-sm-6 upload-modal">
                            	<input type="hidden" id="pid" value="<?php echo $pid; ?>" />
                              <input type="file" name="profile pic" id="fileToUpload" value="Click to choose file" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
						    <div class="col-sm-offset-3 col-sm-8 crop-picture upload-modal">
						      
						    </div>
							<input type="hidden" id="x" name="x" />
							<input type="hidden" id="y" name="y" />
							<input type="hidden" id="w" name="w" />
							<input type="hidden" id="h" name="h" />
                            <div class="clearfix"></div>
						</div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="button" onclick="uploadFile();" name="profile picture" value="Upload" id="uploadButton" class="btn btn-lg btn-primary">
						      <input type="button" name="crop file" value="Crop" id="cropButton" class="btn btn-lg btn-primary">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
            <!-- previous page link -->
            <p class="previous_page_link"><a href="product-info.php?pid=<?php echo $pid; ?>">Back To Previous Page</a></p>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
