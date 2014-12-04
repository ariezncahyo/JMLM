<?php
	$pageTitle = 'Member List';
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
                    <h1 class="page-header">Member List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php
            
            	$limit = 15;
            	$start = 0;
				if(!empty($_GET['page']))
				{
					$start = ($_GET['page'] - 1) * $limit;
				}
				$active = 'class = "active"';
				$member_details = $manageContent->getMemberCount();
				$total_pages = count($member_details)/15;
            
            ?>
            <div class="row adm_row">
            	<div class="col-sm-12">
                	<ul class="pagination pull-right list-pagination">
                      <?php 
                    	
	                		if(!empty($_GET['page']) && ($_GET['page'] > 1))
							{
								echo '<li><a href="member-list.php?page='.($_GET['page']-1).'">«</a></li>';
							}
							else
							{
								echo '<li><a href="member-list.php?page=1">«</a></li>';
							}
                    		
                    	
	                      for($i=1;$i<=ceil($total_pages);$i++)
						  {
						  	if($i == $_GET['page'])	
							{
								echo '<li '.$active.'><a href="member-list.php?page='.$i.'">'.$i.'</a></li>';
							}
							elseif(($_GET['page']) == '' && ($i == 1))
							{
								echo '<li '.$active.'><a href="member-list.php?page='.$i.'">'.$i.'</a></li>';
							}
							else	 
							{
								echo '<li><a href="member-list.php?page='.$i.'">'.$i.'</a></li>';
							}
						  }
						  
						  	if(!empty($_GET['page']) && ($_GET['page'] < ceil($total_pages)))
							{
								echo '<li><a href="member-list.php?page='.($_GET['page']+1).'">»</a></li>';
							}
							elseif(empty($_GET['page']) && ($total_pages > 1))
							{
								echo '<li><a href="member-list.php?page=2">»</a></li>';
							}
							else
							{
								echo '<li><a href="member-list.php?page='.ceil($total_pages).'">»</a></li>';
							}

					  ?>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                    	<table class="table table-bordered tabe-striped">
                        	<thead>
                            	<tr>
                                	<th>User Id</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email Id</th>
                                    <th>Status</th>
                                    <th>Member Level</th>
                                    <th>Details</th>
                                 </tr>
                            </thead>
                            <tbody>
                            	<?php
									//get member list
									$manageContent->getFullMemberListWithLimit($start, $limit);
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
