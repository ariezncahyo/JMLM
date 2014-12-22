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
                    <?php echo your_membership_is_not_activated;?>
                </h3>
                <p class="verified-txt">
                    <?php echo you_have_to_purchase_membership_to_become_member_of_the_system;?>
                </p>
                <a href="<?php echo $baseUrl;?>buy-membership/" class="btn-link-custom clk-prof-btn">
                    <?php echo click_here_to_purchase_membership;?>
                </a>
            </div><!-- membership activation text ends -->
            <?php } else if($_SESSION['invalid'] == 'Email Not Verified') { ?>
            <div class="email-verify-txt">
                <h3 class="tnk-u">
                    <?php echo your_membership_is_invalid;?>
                </h3>
                <p class="verified-txt">
                    <?php echo you_have_to_verify_your_email_by_clicking_the_link_send_to_your_email_id;?>
                </p>
            </div><!-- email verifiy text ends -->
            <?php } ?>
        </div>
    </div>
</div><!-- container for log in section ends -->

<?php
	include 'v-templates/footer.php';
?>