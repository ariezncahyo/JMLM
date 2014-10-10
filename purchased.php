<?php
	$page_title = 'Purchase';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
	}
?>
<?php 
	//getting previous page name
	$page_name = substr(strrchr($_SERVER['HTTP_REFERER'],'/'),1);

	/*if($page_name != 'function.paypal-return.php' || !isset($GLOBALS['_GET']))
	{
		if($page_name != 'checkout.php' || !isset($_SESSION['order_id']))
		{
			header("Location: index.php");
		}
	}*/
		
?>
<?php
	$order_id = $_SESSION['order_id'];
	//unset session and cookie
	$manageContent->destroyProductCookie();
	//unset product session values
	unset($_SESSION['order_id']);
	unset($_SESSION['total_amount']);
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>

<div class="row row-mrgn-nul row-mrgn-cart hd-carousel">
    <div class="col-sm-12">
    </div>
</div>

<!-- verification section -->

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="email-verify-txt">
                <h3 class="tnk-u">
                    Thank You
                </h3>
                <p class="verified-txt">
                    For your purchase ,<br />
                    Your order id is <?php echo $order_id; ?>
                </p>
                <a class="btn-link-custom clk-prof-btn">
                    Please keep this for tracking
                </a>
            </div><!-- email verifiy text ends -->
        </div>
    </div>
</div><!-- container for log in section ends -->
				
<?php
	include 'v-templates/footer.php';
?>