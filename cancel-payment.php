<?php
	$page_title = 'Cancel Payment';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
?>
<?php 
	if(!isset($GLOBALS['_GET']['fn']))
	{
		header("Location: index.php");
	}
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
        <div class="col-sm-6 col-sm-offset-3">
            <div class="email-verify-txt">
                <h3 class="tnk-u">
                    <?php echo your_paypal_transaction_is_unsuccessfull;?>
                </h3>
                <p class="verified-txt">
                    <?php echo please_repay_the_amount_to_complete_the_order;?>
                </p>
                <a class="btn-link-custom clk-prof-btn">
                    <?php echo please_keep_this_for_tracking;?>
                </a>
            </div><!-- email verifiy text ends -->
        </div>
    </div>
</div><!-- container for log in section ends -->
				
<?php
	include 'v-templates/footer.php';
?>