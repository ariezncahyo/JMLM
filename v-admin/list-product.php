<?php
	$pageTitle = 'Product List';
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
                    <h1 class="page-header">Product List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
            	<div class="col-sm-12">
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
                                	<th>Product Name</th>
                                    <th>Category</th>
                                    <th>Upload Date</th>
                                    <th>Expiry date</th>
                                    <th>Featured</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
									//get product list
									$manageContent->getProductList();
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
