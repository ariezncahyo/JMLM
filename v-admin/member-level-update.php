<?php
	$pageTitle = 'Member Level Update Info';
	//getting member id
	if(!isset($GLOBALS['_GET']['uid']))
	{
		header("Location: member-level-list.php");
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
                    <h1 class="page-header">Update Member Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row adm_row">
                <div class="col-lg-12">
                	
                    <?php
						//get member list
						$info=$manageContent->getMemberLevelDetails($uid);
					?>
					<form role="form" action="v-includes/functions/function.member-level-info-update.php" method="post">
                        <h4 class="page_form_caption"> Update Information</h4>
                         <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Promotion Point Value</label>
                            <div class="col-sm-7">
                            	<!-- readonly input field applies only on member_level 0 -->
                                <input <?php if($info[0]['member_level']==0)echo 'readonly="readonly"'; ?> type="text" class="form-control" name="pv" value="<?php echo $info[0]['promotion_pv'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Referral Fee</label>
                            <div class="col-sm-7">
                            	<!-- readonly input field applies only on member_level 0 -->
                                <input <?php if($info[0]['member_level']==0)echo 'readonly="readonly"'; ?> type="text" class="form-control" name="rf" value="<?php echo $info[0]['RF'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Overriding Fee</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="of" value="<?php echo $info[0]['OF'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Personal Commission</label>
                            <div class="col-sm-7">
                            	<!-- readonly input field applies only on member_level 0 -->
                                <input <?php if($info[0]['member_level']==0)echo 'readonly="readonly"'; ?> type="text" class="form-control" name="pc" value="<?php echo $info[0]['PC'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                        //Auth: Debo
                        if($info[0]['member_category'] == 'Global Distributor'){ ?>
						<div class="form-group">
                            <label class="control-label admin_form_label col-sm-3">Pool Sharing</label>
                            <div class="col-sm-7">
                            	<input type="text" class="form-control" name="ps" value="<?php echo $info[0]['PS'] ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                            	<!-- sending member level id -->
                            	<input type="hidden" name="member_level" value="<?php echo $info[0]['member_level'] ?>" />
                            	<input type="submit" class="btn btn-success btn-lg" value="Update" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
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
