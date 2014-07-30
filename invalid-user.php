<?php
	$page_title = 'Invalid User';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest' || !isset($_SESSION['invalid']))
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
        <div class="col-lg-12">
            <!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
        	<?php if($_SESSION['invalid'] == 'Membership deactivated') { ?>
            <div class="email-verify-txt">
                <h3 class="tnk-u">
                    Your Membership Is Not Activated
                </h3>
                <p class="verified-txt">
                    You have to purchase membership to become Member of the system
                </p>
                <a href="buy-membership.php" class="btn-link-custom clk-prof-btn">
                    Click here to purchase Membership
                </a>
            </div><!-- membership activation text ends -->
            <?php } else if($_SESSION['invalid'] == 'Email Not Verified') { ?>
            <div class="email-verify-txt">
                <h3 class="tnk-u">
                    Your Membership Is Invalid
                </h3>
                <p class="verified-txt">
                    You have to verify your email by clicking the link send to your email id
                </p>
            </div><!-- email verifiy text ends -->
            <?php } ?>
        </div>
    </div>
</div><!-- container for log in section ends -->

<?php
	include 'v-templates/footer.php';
?>