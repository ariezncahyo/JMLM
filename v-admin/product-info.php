<?php
	$pageTitle = 'Product Info';
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
                    <h1 class="page-header">Product Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                    	<?php
							if(isset($GLOBALS['_GET']['action']))
							{
								$action = $GLOBALS['_GET']['action'];
								//getting product basic ingo
								if($action == 'basic')
								{
									$manageContent->getProBasicInfo($pid);
								}
								//getting product description
								if($action == 'description')
								{
									$manageContent->getProductDescription($pid);
								}
							}
							else
							{
								//get basic info
								$manageContent->getProBasicInfo($pid);
							}
						?>
                    </div>
                    <!-- previous page link -->
                   <p class="previous_page_link"><a href="list-product.php">Back To Previous Page</a></p>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Product Quick Links</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<a href="product-info.php?pid=<?php echo $pid ?>&action=basic" class="list-group-item"><i class="fa fa-info fa-fw"></i> Product Basic Info</a>
                                <a href="product-info.php?pid=<?php echo $pid ?>&action=description" class="list-group-item"><i class="fa fa-info fa-fw"></i> Product Description</a>
                                <a href="add-product-image.php?pid=<?php echo $pid ?>" class="list-group-item"><i class="fa fa-info fa-fw"></i> Product Image</a>
                                <a href="product-video.php?pid=<?php echo $pid ?>" class="list-group-item"><i class="fa fa-info fa-fw"></i> Product Video Link</a>
                                <a href="edit-product.php?pid=<?php echo $pid ?>" class="list-group-item"><i class="fa fa-info fa-fw"></i> Edit Product Info</a>
                                <a href="product-custom.php?pid=<?php echo $pid ?>" class="list-group-item"><i class="fa fa-info fa-fw"></i> Product Customization</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
