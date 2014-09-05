<?php
	$pageTitle = 'System-Money';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
		$balance = $manageContent->getSystemMoneyInfo();
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
                    <h1 class="page-header"> System Money Information </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-sm-4">
                	<div class="panel panel-default">
                		<div class="panel-heading">
                			<i class="fa fa-list fa-fw"></i> Total Credit
                		</div>
                		<div class="panel-body">
                			<h1><?php echo $manageContent->getSystemCurrency('product').$balance[1];  ?> </h1>
                		</div>
                	</div>
                </div>
                <div class="col-sm-4">
                	<div class="panel panel-default">
                		<div class="panel-heading">
                			<i class="fa fa-list fa-fw"></i> Total Debit
                		</div>
                		<div class="panel-body">
                			<h1><?php echo $manageContent->getSystemCurrency('product').$balance[2];  ?> </h1>
                		</div>
                	</div>
                </div>
                <div class="col-sm-4">
                	<div class="panel panel-default">
                		<div class="panel-heading">
                			<i class="fa fa-list fa-fw"></i> System Balance
                		</div>
                		<div class="panel-body">
                			<h1><?php echo $manageContent->getSystemCurrency('product').$balance[0];  ?> </h1>
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