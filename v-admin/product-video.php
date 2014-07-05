<?php
	$pageTitle = 'Add Video';
	include 'v-templates/header.php';
?>
<?php
	$pid = $GLOBALS['_GET']['pid'];
	//get video status
	$status = $manageContent->getProductVideoStatus($pid);
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
                    <h1 class="page-header">Product Video</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                    <form role="form" action="v-includes/functions/function.product-video.php" method="post">
                        <h4 class="page_form_caption">Fill Up Product Video Information</h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">YouTube Video Link</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="video" value="<?php if(!empty($status[0]['video'])) { echo $status[0]['video']; } ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                            	<input type="hidden" name="pid" value="<?php echo $pid ?>" />
                                <?php
									if(empty($status[0]))
									{
										echo '<input type="submit" class="btn btn-success btn-lg" value="Insert" />';
									}
									else
									{
										echo '<input type="submit" class="btn btn-success btn-lg" value="Update" />';
									}
								?>
                                
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
