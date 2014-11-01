<?php
	$pageTitle = 'Add Page Link';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
        <div id="page-wrapper">
        	<!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">MyPage Link Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	<?php
							if(isset($GLOBALS['_GET']['id']) && $GLOBALS['_GET']['action'] == 'edit')
							{
								$manageContent->getMyPageLinkDetails($GLOBALS['_GET']['id']);
							}
							else
							{
						?>
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Add MyPage Link Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.add-page-link.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pgname" placeholder="page name that appears on link" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Link</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pglink" placeholder="e.g: myPage/[your page id] or any other page link"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Top Link</label>
                                    <div class="col-sm-4">
                                        <select name="toplink" class="form-control">
                                        	<option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Navbar</label>
                                    <div class="col-sm-4">
                                        <select name="navbar" class="form-control">
                                        	<option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Footer Link</label>
                                    <div class="col-sm-4">
                                        <select name="footerlink" class="form-control">
                                        	<option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="action" value="INSERT" />
                                        <input type="submit" class="btn btn-success btn-lg" value="SUBMIT" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                   
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
