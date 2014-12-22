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
                404 <?php echo not_found;?>
                </h3>
                <p class="verified-txt">
                    <?php echo for_buying_products;?> <a href="<?php echo $baseUrl?>products/"><?php echo click_here;?></a><br />
                    <?php echo and_if_you_want_to_go_to_home_page;?> <a href="<?php echo $baseUrl?>"><?php echo click_here;?></a>
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