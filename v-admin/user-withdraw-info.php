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
            <?php
            	$limit = 15;
            	$start = 0;
				if(!empty($_GET['page']))
				{
					$start = ($_GET['page'] - 1) * $limit;
				}
				$active = 'class = "active"';
				$member_withdraw_list = $manageContent->getCountMembersWithdrawListByStatus($status);
				$total_pages = count($member_withdraw_list)/15;
			?>	
            <!-- /.row -->
            <div class="row adm_row">
            	<div class="col-sm-12">
                	<div class="btn-group pull-left order_btn_grp">
                    	<a href="user-withdraw-info.php?action=0"><button class="btn btn-success btn-lg">Withdraw Processing</button></a>
                        <a href="user-withdraw-info.php?action=1"><button class="btn btn-primary btn-lg">Withdraw Completed</button></a>
                    </div>
                    <ul class="pagination pull-right list-pagination">
                      <?php 
                    	
	                		if(!empty($_GET['page']) && ($_GET['page'] > 1))
							{
								echo '<li><a href="user-withdraw-info.php?page='.($_GET['page']-1).'">«</a></li>';
							}
							else
							{
								echo '<li><a href="user-withdraw-info.php?page=1">«</a></li>';
							}
                    		
                    	
	                      for($i=1;$i<=ceil($total_pages);$i++)
						  {
						  	if($i == $_GET['page'])	
							{
								echo '<li '.$active.'><a href="user-withdraw-info.php?page='.$i.'">'.$i.'</a></li>';
							}
							elseif(($_GET['page']) == '' && ($i == 1))
							{
								echo '<li '.$active.'><a href="user-withdraw-info.php?page='.$i.'">'.$i.'</a></li>';
							}
							else	 
							{
								echo '<li><a href="user-withdraw-info.php?page='.$i.'">'.$i.'</a></li>';
							}
						  }
						  
						  	if(!empty($_GET['page']) && ($_GET['page'] < ceil($total_pages)))
							{
								echo '<li><a href="user-withdraw-info.php?page='.($_GET['page']+1).'">»</a></li>';
							}
							elseif(empty($_GET['page']) && ($total_pages > 1))
							{
								echo '<li><a href="user-withdraw-info.php?page=2">»</a></li>';
							}
							else
							{
								echo '<li><a href="user-withdraw-info.php?page='.ceil($total_pages).'">»</a></li>';
							}

					  ?>
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
                            	//get withdraw processing or processed list
								$manageContent->getMembersWithdrawListByStatusAndLimit($status,$start,$limit);
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
