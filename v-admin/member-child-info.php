<?php
	$pageTitle = 'Member Child Info';
	//getting member id
	if(!isset($GLOBALS['_GET']['uid']))
	{
		header("Location: member-list.php");
	}
	$uid = $GLOBALS['_GET']['uid'];
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
                    <h1 class="page-header">Member Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
	               <?php
                    	//getting member child info
						$manageContent->getMemChildList($uid);
					?>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Quick Links</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<a href="member-info.php?uid=<?php echo $uid ?>&action=basic" class="list-group-item"><i class="fa fa-info fa-fw"></i> Member Basic Info</a>
                                <a href="member-info.php?uid=<?php echo $uid ?>&action=money" class="list-group-item"><i class="fa fa-info fa-fw"></i> Member Money Info</a>
                            	<a href="member-info.php?uid=<?php echo $uid ?>&action=points" class="list-group-item"><i class="fa fa-info fa-fw"></i> Member Point Info</a>
                            	<a href="member-info.php?uid=<?php echo $uid ?>&action=withdraw" class="list-group-item"><i class="fa fa-info fa-fw"></i> Member Withdraw Info</a>
  								<a href="member-info.php?uid=<?php echo $uid ?>&action=order" class="list-group-item"><i class="fa fa-info fa-fw"></i> Member Order Info</a>                         
                           		<a href="member-child-info.php?uid=<?php echo $uid ?>" class="list-group-item"><i class="fa fa-info fa-fw"></i> Member Child Info</a>  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
