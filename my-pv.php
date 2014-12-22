<?php
	$page_title = 'My PV';
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
					if(isset($GLOBALS['_GET']['p1']))
					{
						$page1 = $GLOBALS['_GET']['p1'];
					}
					else
					{
						$page1 = 0;
					}
					
					if(isset($GLOBALS['_GET']['p2']))
					{
						$page2 = $GLOBALS['_GET']['p2'];
					}
					else
					{
						$page2 = 0;
					}
					//set max index
					$max_index = 10;
				?>
                
                <div class="col-sm-9">
                    
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th><?php echo numberlang;?></th>
                                    <th><?php echo order_id;?></th>
                                    <th><?php echo product_name;?></th>
                                    <th><?php echo quantity;?></th>
                                    <th><?php echo purchased_by;?></th>
                                    <th><?php echo date;?></th>
                                    <th><?php echo point_value;?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                	$user_pv_child = $manageContent->getUserPointValueListByChild($page1);
									$manageContent->getUserTotalPointValueByChild($_SESSION['user_id']); 
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <?php
                    	//calling pagination function
                    	$manageContent->Uipagination($page1, $user_pv_child[0], 'my-pv.php?', $max_index, $user_pv_child[1],'p1');
                    ?>
                    
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th><?php echo numberlang;?></th>
                                    <th><?php echo order_id;?></th>
                                    <th><?php echo product_name;?></th>
                                    <th><?php echo quantity;?></th>
                                    <th><?php echo date;?></th>
                                    <th><?php echo point_value;?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                	$user_pv = $manageContent->getUserPointValueListByHimself($page2);
									$manageContent->getUserTotalPointValueByHimself($_SESSION['user_id']); 
									//get user total point value
									$manageContent->getUserTotalPointValue();
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <?php
                    	//calling pagination function
                    	$manageContent->Uipagination($page1, $user_pv[0], 'my-pv.php?', $max_index, $user_pv[1],'p2');
                    ?>
                    
                </div><!-- col-sm-9 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>