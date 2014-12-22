<?php
	$page_title = 'My Order';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>

<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row row-prof">
        <div class="col-sm-12">
            
            <div class="row mrgn-btm">
                
                <?php
					//include left sidebar
					include 'v-templates/sidebar-user.php';
				?>
				<?php
					
				?>
                
                <div class="col-sm-9">
                    
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th><?php echo order_id;?></th>
                                    <th><?php echo purchase_on;?></th>
                                    <th><?php echo payment_method;?></th>
                                    <th><?php echo total_amount;?></th>
                                    <th><?php echo status;?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                 $manageContent->getOrderHistory();
                                	
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <?php 
                    	
                    ?>
                    
                </div><!-- col-sm-9 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>