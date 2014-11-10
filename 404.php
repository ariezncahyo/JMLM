<?php
	$page_title = 'Membership Purchase';
	//include template files
	include 'v-templates/header.php';
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>

<div class="row row-mrgn-nul row-mrgn-cart hd-carousel">
    <div class="col-sm-12">
    </div>
</div>

<!-- container for error message section starts -->
<div class="container">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-3">
        	<!-- error message text starts -->
            <div class="email-verify-txt e-404">
            	<h3 class="tnk-u">
                404 Not Found
                </h3>
                <p class="verified-txt">
                    For buying products <a href="<?php echo $baseUrl?>products/">Click Here</a><br />
                    And if you want to go to home page <a href="<?php echo $baseUrl?>">Click Here</a>
                </p>
           </div>
           <!-- error message text ends -->
        </div>
    </div>
</div>
<!-- container for error message section ends -->
				
<?php
	include 'v-templates/footer.php';
?>