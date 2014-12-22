<?php
	$page_title = 'Membership Purchase';
	//include template files
	include 'v-templates/header.php';
?>
<?php 
	if(!isset($_SESSION['mem_order_id']))
	{
		header("Location: index.php");
	}
?>
<?php
	$order_id = $_SESSION['mem_order_id'];
	//unset product session values
	unset($_SESSION['mem_order_id']);
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
                    <?php echo thank_you;?>
                </h3>
                <p class="verified-txt">
                    <?php echo for_your_purchase;?> ,<br />
                    <?php echo your_order_id_is?> <?php echo $order_id; ?>
                </p>
                <a class="btn-link-custom clk-prof-btn">
                    <?php please_keep_this_for_tracking;?>
                </a>
            </div><!-- email verifiy text ends -->
        </div>
    </div>
</div><!-- container for log in section ends -->
				
<?php
	include 'v-templates/footer.php';
?>