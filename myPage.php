<?php
	//include template files
	include 'v-templates/header.php';
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$pageid = $_GET['id'];
	}
	else
	{
		header("Location: index.php");
	}
	$data = $manageContent->getPageDetails($pageid);
	$page_title = $data['page_name'];
	
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
	}
?>
<?php
	
	
	
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>
						
<!-- banner -->

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
        <div class="col-sm-12">
            <div class="head-banner">
                <div class="banner-link">
                    <div class="row">
                        <div class="col-sm-2">
                            <a href="mypage.php?id=<?php echo $pageid; ?>" class="banner-h"><span class="banner-spn"><?php echo $data['page_name'];?></span> ></a>
                        </div>
                    </div>
                </div><!-- banner link -->
            </div><!-- head banner -->
        </div>
    </div>
</div><!-- container -->

<!-- banner ends -->

<!-- contact us section -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="contact-container">
	            <div class="row">
	                <div class="col-sm-8">
	                    <h2 class="cmpny-hstry-hd"><?php echo $data['page_name'];?></h2>
	                    <!-- <img src="images/company-history-banner.png" class="img-responsive img-future-banner" /> -->
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-sm-9">
	                	<?php
	                		echo $data['page_content'];
	                	?>
	                </div>
	            </div>
            </div><!-- contact-container ends -->
        </div><!-- cols ends -->
    </div><!-- row ends -->
</div><!-- container ends -->

<?php
	include 'v-templates/footer.php';
?>