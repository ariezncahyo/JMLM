<?php
	$pageTitle = 'Page Link List';
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
                    <h1 class="page-header">MyPage Link List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<?php
            
            	$limit = 15;
            	$start = 0;
				if(!empty($_GET['page']))
				{
					$start = ($_GET['page'] - 1) * $limit;
				}
				$active = 'class = "active"';
				$pagelink_details = $manageContent->getPageLinksCount();
				$total_pages = count($pagelink_details)/15;
            
            ?>
            <div class="row adm_row">
            	<div class="col-sm-12">
                	<ul class="pagination pull-right list-pagination">
                      <?php 
                    	
	                		if(!empty($_GET['page']) && ($_GET['page'] > 1))
							{
								echo '<li><a href="page-link-list.php?page='.($_GET['page']-1).'">«</a></li>';
							}
							else
							{
								echo '<li><a href="page-link-list.php?page=1">«</a></li>';
							}
                    		
                    	
	                      for($i=1;$i<=ceil($total_pages);$i++)
						  {
						  	if($i == $_GET['page'])	
							{
								echo '<li '.$active.'><a href="page-link-list.php?page='.$i.'">'.$i.'</a></li>';
							}
							elseif(($_GET['page']) == '' && ($i == 1))
							{
								echo '<li '.$active.'><a href="page-link-list.php?page='.$i.'">'.$i.'</a></li>';
							}
							else	 
							{
								echo '<li><a href="page-link-list.php?page='.$i.'">'.$i.'</a></li>';
							}
						  }
						  
						  	if(!empty($_GET['page']) && ($_GET['page'] < ceil($total_pages)))
							{
								echo '<li><a href="page-link-list.php?page='.($_GET['page']+1).'">»</a></li>';
							}
							elseif(empty($_GET['page']) && ($total_pages > 1))
							{
								echo '<li><a href="page-link-list.php?page=2">»</a></li>';
							}
							else 
							{
								echo '<li><a href="page-link-list.php?page='.ceil($total_pages).'">»</a></li>';	
							}

					  ?>
                    </ul>
                </div>
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-tasks fa-fw"></i> List Of MyPage Link Details</div>
                        <div class="panel-body">
                        	<div class="table-responsive">
                            	<table class="table table-bordered table-hover table-striped">
                                	<thead>
                                    	<tr>
                                        	<th>Page Name</th>
                                            <th>Page Link</th>
                                            <th>Top Link</th>
                                            <th>Navbar Link</th>
                                            <th>Footer Link</th>
                                            <th>Action</th>
                                            <th>Current Status</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											//getting page link list
											$manageContent->getMypageLinkListWithLimit($start, $limit);
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
