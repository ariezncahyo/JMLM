<?php
	$pageTitle = 'Pool Share List';
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
                    <h1 class="page-header">Pool Share List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-tasks fa-fw"></i> Pool Info</div>
                        <div class="panel-body">
                        	<?php
                        		//getting pool sharing details
                        		$manageContent->getPoolShareDetails();
                        	?>
                        </div>
                    </div>
                	
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-tasks fa-fw"></i> List Of Pool Share Details</div>
                        <div class="panel-body">
                        	<div class="table-responsive">
                            	<table class="table table-bordered table-hover table-striped">
                                	<thead>
                                    	<tr>
                                            <th>Specification</th>
                                            <th>Distributed PV</th>
                                            <th>Date From</th>
                                            <th>Date To</th>
                                            <th>Distribution On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											//getting pool sharing list
											$manageContent->getPoolShareList();
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
