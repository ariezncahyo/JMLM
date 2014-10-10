<?php
	$page_title = 'My Wallet';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
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
					if(isset($GLOBALS['_GET']['p']))
					{
						$page = $GLOBALS['_GET']['p'];
					}
					else
					{
						$page = 0;
					}
					//set max index
					$max_index = 10;
				?>
                
                <div class="col-sm-9">
                    
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Order Id</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                	$user_money = $manageContent->getUserMoneyList($page);
									$manageContent->getUserTotalMoney(); 
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <?php 
                    	//calling pagination function
                    	$manageContent->wallet_pagination($page, $user_money[0], 'my-wallet.php?', $max_index, $user_money[1]);
                    ?>
                    
                </div><!-- col-sm-9 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>