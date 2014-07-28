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
        <div class="col-sm-4 col-sm-offset-4">
            <div class="email-verify-txt">
                <h3 class="tnk-u">
                    Your Membership Is Invalid
                </h3>
                <p class="verified-txt">
                    You have to verify your email by clicking the link send to your email id
                </p>
                <!--<a href="profile.php" class="btn-link-custom clk-prof-btn">
                    Click here to go to your profile
                </a>-->
            </div><!-- email verifiy text ends -->
        </div>
    </div>
</div><!-- container for log in section ends -->

<?php
	include 'v-templates/footer.php';
?>