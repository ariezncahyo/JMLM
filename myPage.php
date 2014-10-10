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
                        <div class="col-sm-6">
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
            <!-- <div class="contact-container"> Uncomment Jacky -->
            	<?php /* Uncomment Jacky
	            <div class="row mypage_details">
	                <div class="col-sm-12">
	                    <h2 class="cmpny-hstry-hd"><?php echo $data['page_name'];?></h2>
	                    <?php
	                    	//getting mypage image
	                    	if(!empty($data['image']))
							{
								echo '<img src="images/'.$data['image'].'" class="img-responsive img-future-banner" />';
							}
	                    ?>
	                </div>
	            </div>
                */ ?>
                
                <!-- Added Jacky -->
                <?php if(!empty($data['image'])) { ?>
					<div id="banner">
						<?php if(!empty($data['image'])) {
							echo '<img src="images/'.$data['image'].'" title="'.$data['page_name'].'" />';
						} ?>        
						<div class="banner-txt">
							<p class="banner-title"><a href="#"><?php echo $data['page_name'];?></a></p>
							
							<p class="banner-desc"><?php echo $data['page_banner_desc'];?> <!-- add and echo banner_desc --></p>
						</div> 
					</div><!-- banner -->
				<?php } else { ?>
                	<h2 class="cmpny-hstry-hd"><?php echo $data['page_name'];?></h2>
				<?php } ?>
	            <!-- End Added Jacky -->
                
	            <div class="row mypage_details">
	                <div class="col-sm-12">
	                	<?php
	                		echo $data['page_content'];
	                	?>
	                </div>
	            </div>
            <!-- </div> Uncomment Jacky --> <!-- contact-container ends -->
        </div><!-- cols ends -->
    </div><!-- row ends -->
</div><!-- container ends -->

<?php
	include 'v-templates/footer.php';
?>