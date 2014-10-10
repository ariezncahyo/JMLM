<?php
	$pageTitle = 'Membership Order Info';
	//getting product id
	if(!isset($GLOBALS['_GET']['oid']))
	{
		header("Location: list-product.php");
	}
	$oid = $GLOBALS['_GET']['oid'];
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
                    <h1 class="page-header">Membership Order Information</h1>
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
								//getting order basic ingo
								if($action == 'basic')
								{
									$manageContent->getMembershipOrderBasicInfo($oid);
								}
								//getting order status details
								else if($action == 'status')
								{
									$manageContent->getMembershipOrderChangebleStatus($oid);
								}
								
							}
							else
							{
								//get basic info
								$manageContent->getMembershipOrderBasicInfo($oid);
							}
						?>
                    </div>
                    <!-- previous page link -->
                   <p class="previous_page_link"><a href="list-membership-order.php">Back To Order List Page</a></p>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Order Quick Links</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<a href="membership-order-info.php?oid=<?php echo $oid ?>&action=basic" class="list-group-item"><i class="fa fa-info fa-fw"></i> Order Basic Info</a>
                                <a href="membership-order-info.php?oid=<?php echo $oid ?>&action=status" class="list-group-item"><i class="fa fa-info fa-fw"></i> Order Status</a>
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
