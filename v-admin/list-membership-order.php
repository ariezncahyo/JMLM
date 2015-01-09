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
            <?php
            
            	$limit = 15;
            	$start = 0;
				if(!empty($_GET['page']))
				{
					$start = ($_GET['page'] - 1) * $limit;
				}
				$active = 'class = "active"';
				if(isset($GLOBALS['_GET']['list']))
				{
					//get order list
					$membershipOrder_details = $manageContent->getMembershipOrderListCount($GLOBALS['_GET']['list']);
				}
				else 
				{
					//get order list
					$membershipOrder_details = $manageContent->getMembershipOrderListCount('Processing');
				}
				$total_pages = count($membershipOrder_details)/15;
            
            ?>
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
                    	<a href="list-membership-order.php?list=Processing"><button class="btn btn-success">On Process</button></a>
                        <a href="list-membership-order.php?list=Completed"><button class="btn btn-primary">Complete Order List</button></a>
                        <a href="list-membership-order.php?list=Cancel"><button class="btn btn-danger">Cancel Order List</button></a>
                    </div>
                    <ul class="pagination pull-right list-pagination">
                      <?php 
                    	
	                		if(!empty($_GET['page']) && ($_GET['page'] > 1))
							{
								echo '<li><a href="list-membership-order.php?page='.($_GET['page']-1).'">«</a></li>';
							}
							else
							{
								echo '<li><a href="list-membership-order.php?page=1">«</a></li>';
							}
                    		
                    	
	                      for($i=1;$i<=ceil($total_pages);$i++)
						  {
						  	if($i == $_GET['page'])	
							{
								echo '<li '.$active.'><a href="list-membership-order.php?page='.$i.'">'.$i.'</a></li>';
							}
							elseif(($_GET['page']) == '' && ($i == 1))
							{
								echo '<li '.$active.'><a href="list-membership-order.php?page='.$i.'">'.$i.'</a></li>';
							}
							else	 
							{
								echo '<li><a href="list-membership-order.php?page='.$i.'">'.$i.'</a></li>';
							}
						  }
						  
						  	if(!empty($_GET['page']) && ($_GET['page'] < ceil($total_pages)))
							{
								echo '<li><a href="list-membership-order.php?page='.($_GET['page']+1).'">»</a></li>';
							}
							elseif(empty($_GET['page']) && ($total_pages > 1))
							{
								echo '<li><a href="list-membership-order.php?page=2">»</a></li>';
							}
							else
							{
								echo '<li><a href="list-membership-order.php?page='.ceil($total_pages).'">»</a></li>';
							}

					  ?>
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
										$manageContent->getMembershipOrderListWithLimit($GLOBALS['_GET']['list'], $start, $limit);
									}
									else 
									{
										//get order list
										$manageContent->getMembershipOrderListWithLimit('Processing', $start, $limit);
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
