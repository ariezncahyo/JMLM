<?php
	$pageTitle = 'User Withdraw Info';
	if(!empty($_GET['action']) && isset($_GET['action']))
	{
		if($_GET['action']==0 )
		{
			$status=0;
		}
		else
		{
			$status=1;
		}
	}
	else 
	{
		$status=0;
	}
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
                    <h1 class="page-header">User Withdraw Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
            	<div class="col-sm-12">
                	<div class="btn-group pull-left order_btn_grp">
                    	<button class="btn btn-success btn-lg"><a href="user-withdraw-info.php?action=0">Withdraw Processing</a></button>
                        <button class="btn btn-primary btn-lg"><a href="user-withdraw-info.php?action=1">Withdraw Completed</a></button>
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
                                	<th>Withdraw Id</th>
                                    <th>UserId</th>
                                    <th>Withdraw Method</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <?php if($status == 0) 
                                    {
                                    	echo '<th>Details</th>';
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            	//get currency type
                            	$currency=$manageContent->getSystemCurrency('product');
                            	//get withdraw processing or processed list
								$manageContent->getMembersWithdrawListByStatus($status);
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
