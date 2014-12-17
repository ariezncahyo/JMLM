<?php
	$pageTitle = 'Membership Price and Currency';
	include 'v-templates/header.php';
	//for getting paypal payment method 
	$paypal_payment = $manageContent->getPaypalPaymentMethodStatus();
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
                    	
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Edit PAYPAL payment method</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.edit-payment-method.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Price</label>
                                    <div class="col-sm-5">
                                        <input type="radio" style="width:4%;" name="paypal_payment_method" value="0" <?php if($paypal_payment==0){ ?> checked="checked" <?php } ?>><span style="margin-right: 2%">Default</span> <input type="radio" style="width:4%;" name="paypal_payment_method" value="1" <?php if($paypal_payment==1){ ?> checked="checked" <?php } ?>><span>Testing Purpose</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="<?php echo md5('edit_paypal_payment_method') ?>" />
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
