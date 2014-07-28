<?php
	$pageTitle = 'Filtered Order List';
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
                    <h1 class="page-header">Filtered Order List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
            	<div class="col-sm-12">
                	<div class="btn-group pull-left order_btn_grp">
                    	<button class="btn btn-success btn-lg"><a href="list-order.php">Full List</a></button>
                        <button class="btn btn-primary btn-lg"><a href="filtered-order.php">Filtered List</a></button>
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
                	<form role="form" method="post" class="filter_order_form">
                    	<h4 class="page_form_caption">Filtered Value</h4>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Filtered By</label>
                            <div class="col-sm-5">
                                <select name="filter-name" class="form-control" id="order_filter">
                                	<option>Select A Value</option>
                                    <option value="date" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'date') { echo 'selected="selected"'; } ?>>Date</option>
                                    <option value="product" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'product') { echo 'selected="selected"'; } ?>>Product Name</option>
                                    <option value="user" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'user') { echo 'selected="selected"'; } ?>>User Category</option>
                                    <option value="payment_method" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'payment_method') { echo 'selected="selected"'; } ?>>Payment Method</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="filter-fromdate">
                            <label class="control-label admin_form_label col-sm-3">From Date</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control date_range" name="from_date" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'date') { echo 'value="'.$_GET['value1'].'"'; } ?> />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="filter-todate">
                            <label class="control-label admin_form_label col-sm-3">To Date</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control date_range" name="to_date" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'date') { echo 'value="'.$_GET['value2'].'"'; } ?>/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="filter-pro">
                            <label class="control-label admin_form_label col-sm-3">Select Product Name</label>
                            <div class="col-sm-5">
                                <select name="pro" class="form-control">
                                	<?php
										if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'product')
										{
											$manageContent->getSystemProductList($_GET['value']);
										}
										else
										{
											$manageContent->getSystemProductList('');
										}
									?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="filter-user">
                            <label class="control-label admin_form_label col-sm-3">Select User</label>
                            <div class="col-sm-5">
                                <select name="user_type" class="form-control">
                                	<option value="user" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'user' && $_GET['value'] == 'user') { echo 'selected="selected"'; } ?>>Member</option>
                                    <option value="Guest" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'user' && $_GET['value'] == 'Guest') { echo 'selected="selected"'; } ?>>Guest</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="filter-payment">
                            <label class="control-label admin_form_label col-sm-3">Payment Method</label>
                            <div class="col-sm-5">
                                <select name="payment_method" class="form-control">
                                	<option value="online" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'payment_method' && $_GET['value'] == 'online') { echo 'selected="selected"'; } ?>>Online Payment</option>
                                    <option value="bank" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'payment_method' && $_GET['value'] == 'bank') { echo 'selected="selected"'; } ?>>Bank Transfer</option>
                                    <option value="cod" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'payment_method' && $_GET['value'] == 'cod') { echo 'selected="selected"'; } ?>>Cash On Delivery</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5 col-sm-offset-3">
                                <input type="button" class="btn btn-success btn-lg" id="filter-btn" value="Submit Data" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                    </form>
                    <?php
						//get order list
						if(isset($GLOBALS['_GET']['filter']))
						{
							$filter = $GLOBALS['_GET']['filter'];
					?>
                    <div class="table-responsive">
                    	<table class="table table-bordered tabe-striped">
                        	<thead>
                            	<tr>
                                	<th>Order Id</th>
                                    <th>Bill To Name</th>
                                    <th>Ship To Name</th>
                                    <th>Purchased On</th>
                                    <th>Payment Method</th>
                                    <th>Amount</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
									//get order list
									if($filter == 'date')
									{
										$manageContent->getOrderFromDateLimit($_GET['value1'],$_GET['value2']);
									}
									else if($filter == 'product')
									{
										$manageContent->getOrderFromProductId($_GET['value']);
									}
									else if($filter == 'user')
									{
										$manageContent->getOrderOfMember($_GET['value']);
									}
									else if($filter == 'payment_method')
									{
										$manageContent->getOrderFromPaymentMethod($_GET['value']);
									}
								?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
