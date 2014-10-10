<?php
	$pageTitle = 'Membership Order List';
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
                    <h1 class="page-header">Membership Order List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
            	<div class="col-sm-12">
            		
                	<div class="btn-group pull-left order_btn_grp">
                    	<button class="btn btn-success"><a href="list-membership-order.php?list=Processing">On Process</a></button>
                        <button class="btn btn-primary"><a href="list-membership-order.php?list=Completed">Complete Order List</a></button>
                        <button class="btn btn-danger"><a href="list-membership-order.php?list=Cancel">Cancel Order List</a></button>
                    </div>
                    <ul class="pagination pull-right list-pagination">
                      <li><a href="#">«</a></li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">»</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                    	<table class="table table-bordered tabe-striped">
                        	<thead>
                            	<tr>
                                	<th>Order Id</th>
                                	<th>User</th>
                                    <th>Purchased On</th>
                                    <th>Payment Method</th>
                                    <th>Amount</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		if(isset($GLOBALS['_GET']['list']))
									{
										//get order list
										$manageContent->getMembershipOrderList($GLOBALS['_GET']['list']);
									}
									else 
									{
										//get order list
										$manageContent->getMembershipOrderList('Processing');
									}
								?>
                            </tbody>
                        </table>
                    </div>
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
