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
            <div class="row adm_row">
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
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
									//get member list
									$manageContent->getFullMemberList();
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
