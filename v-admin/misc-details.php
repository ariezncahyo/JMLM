<?php
	$pageTitle = 'Membership Price and Currency';
	include 'v-templates/header.php';
	//for getting system currency
	$currency = $manageContent->getSystemCurrency('product');
	//for getting membership product price
	$price = $manageContent->getMemProductPrice();
	//for geting shipping cost
	$shipping = $manageContent->getShippingCost();
	//for getting base url
	$baseUrl = $manageContent->getBaseUrl();
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
                    <h2 class="page-header">Miscellaneous Details</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Edit Membership Product Price</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.edit-misc-details.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Price</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="price" value="<?php echo $price; ?>"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="<?php echo md5('edit_mem_price') ?>" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
            <!-- /.row -->
             <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Edit System Currency</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.edit-misc-details.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Currency</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="currency" value="<?php echo $currency; ?>" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="<?php echo md5('edit_currency') ?>" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Edit Shipping Cost</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.edit-misc-details.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Shipping Cost</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="shipping_cost" value="<?php echo $shipping; ?>" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="<?php echo md5('edit_ship_charge') ?>" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Edit Base Url</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.edit-misc-details.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Base Url</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="base_url" value="<?php echo $baseUrl; ?>" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="<?php echo md5('edit_baseUrl') ?>" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
