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
                
                <div class="col-sm-9">
                    
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>2</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>4</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>5</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="amt-color">Gross Amount</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="amt-color">Withdrew Amount</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="amt-color">Net Amount</td>
                                    <td>$22.45</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>