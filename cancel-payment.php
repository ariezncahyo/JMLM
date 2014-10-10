<?php
	$page_title = 'Cancel Payment';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
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
                    Your Paypal Transaction is Unsuccessfull
                </h3>
                <p class="verified-txt">
                    Please repay the amount to complete the order
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