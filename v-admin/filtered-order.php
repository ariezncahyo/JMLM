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
            <?php
            	$limit = 15;
            	$start = 0;
				if(!empty($_GET['page']))
				{
					$start = ($_GET['page'] - 1) * $limit;
				}
				if(isset($GLOBALS['_GET']['filter']))
				{
					$filter = $GLOBALS['_GET']['filter'];
				}	
				$active = 'class = "active"';
				if($filter == 'date')
				{
					$order_details = $manageContent->getOrderFromDateLimitCount($_GET['value1'],$_GET['value2']);
				}
				else if($filter == 'product')
				{
					$order_details = $manageContent->getOrderFromProductIdCount($_GET['value']);
				}
				else if($filter == 'user')
				{
					$order_details = $manageContent->getOrderOfMemberCount($_GET['value']);
				}
				else if($filter == 'payment_method')
				{
					$order_details = $manageContent->getOrderFromPaymentMethodCount($_GET['value']);
				}
				else if($filter == 'ord_status')
		        {
		            $order_details = $manageContent->getOrderFromStatusCount($_GET['value']);
		        }
				$total_pages = count($order_details)/15;
			?>	
            <div class="row adm_row">
            	<div class="col-sm-12">
                	<div class="btn-group pull-left order_btn_grp">
                    	<button class="btn btn-success btn-lg"><a href="list-order.php">Full List</a></button>
                        <button class="btn btn-primary btn-lg"><a href="filtered-order.php">Filtered List</a></button>
                    </div>
                    <ul class="pagination pull-right list-pagination">
                      <?php 
                    		
                    		if($filter == 'date')
							{
								if(!empty($_GET['page']) && ($_GET['page'] > 1))
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page='.($_GET['page']-1).'">«</a></li>';
								}
								else
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page=1">«</a></li>';
								}
	                    		
	                    	
		                      	for($i=1;$i<=ceil($total_pages);$i++)
							  	{
								  	if($i == $_GET['page'])	
									{
										echo '<li '.$active.'><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page='.$i.'">'.$i.'</a></li>';
									}
									elseif(($_GET['page']) == '' && ($i == 1))
									{
										echo '<li '.$active.'><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page='.$i.'">'.$i.'</a></li>';
									}
									else	 
									{
										echo '<li><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page='.$i.'">'.$i.'</a></li>';
									}
						  		}
						  
							  	if(!empty($_GET['page']) && ($_GET['page'] < ceil($total_pages)))
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page='.($_GET['page']+1).'">»</a></li>';
								}
								elseif(empty($_GET['page']) && ($total_pages > 1))
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page=2">»</a></li>';
								}
								else
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value1='.$_GET['value1'].'&value2='.$_GET['value2'].'&page='.ceil($total_pages).'">»</a></li>';
								}
							}
							else
							{
								if(!empty($_GET['page']) && ($_GET['page'] > 1))
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'&page='.($_GET['page']-1).'">«</a></li>';
								}
								else
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'&page=1">«</a></li>';
								}
	                    		
	                    	
		                      	for($i=1;$i<=ceil($total_pages);$i++)
							  	{
								  	if($i == $_GET['page'])	
									{
										echo '<li '.$active.'><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'&page='.$i.'">'.$i.'</a></li>';
									}
									elseif(($_GET['page']) == '' && ($i == 1))
									{
										echo '<li '.$active.'><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'page='.$i.'">'.$i.'</a></li>';
									}
									else	 
									{
										echo '<li><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'&page='.$i.'">'.$i.'</a></li>';
									}
						  		}
						  
							  	if(!empty($_GET['page']) && ($_GET['page'] < ceil($total_pages)))
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'&page='.($_GET['page']+1).'">»</a></li>';
								}
								elseif(empty($_GET['page']) && ($total_pages > 1))
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'&page=2">»</a></li>';
								}
								else
								{
									echo '<li><a href="filtered-order.php?filter='.$filter.'&value='.$_GET['value'].'&page='.ceil($total_pages).'">»</a></li>';
								}	
							}	

					  ?>
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
                                    <option value="ord_status" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'ord_status') { echo 'selected="selected"'; } ?>>Order Status</option>
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
                        <div class="form-group" id="filter-ord">
                            <label class="control-label admin_form_label col-sm-3">Order Status</label>
                            <div class="col-sm-5">
                               <select name="ord_status" class="form-control">
                                	<option value="Processing" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'ord_status' && $_GET['value'] == 'Processing') { echo 'selected="selected"'; } ?>>Processing</option>
                                    <option value="Processed" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'ord_status' && $_GET['value'] == 'Processed') { echo 'selected="selected"'; } ?>>Processed</option>
                                    <option value="Completed" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'ord_status' && $_GET['value'] == 'Completed') { echo 'selected="selected"'; } ?>>Completed</option>
                                    <option value="Cancelled" <?php if(isset($GLOBALS['_GET']['filter']) && $_GET['filter'] == 'ord_status' && $_GET['value'] == 'Cancelled') { echo 'selected="selected"'; } ?>>Cancelled</option>
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
										$manageContent->getOrderFromDateLimitWithLimit($_GET['value1'],$_GET['value2'],$start,$limit);
									}
									else if($filter == 'product')
									{
										$manageContent->getOrderFromProductIdWithLimit($_GET['value'],$start,$limit);
									}
									else if($filter == 'user')
									{
										$manageContent->getOrderOfMemberWithLimit($_GET['value'],$start,$limit);
									}
									else if($filter == 'payment_method')
									{
										$manageContent->getOrderFromPaymentMethodWithLimit($_GET['value'],$start,$limit);
									}
									else if($filter == 'ord_status')
							        {
							            $manageContent->getOrderFromStatusWithLimit($_GET['value'],$start,$limit);
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
