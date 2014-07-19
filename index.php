<?php
	$page_title = 'Home';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>				
        <div class="row row-mrgn-nul hd-carousel">
            <div class="col-sm-12">
            </div>
        </div>
        
<!-- slider -->
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
           <?php
		   		//include slider file
				include 'v-templates/home-slider.php';
		   ?>
        </div><!-- column -->
    </div><!-- row -->

    </div>	
<!-- slider ends -->

<!-- products section -->

<div class="row col-product row-mrgn-nul">
    <div class="col-sm-12">
        <div class="container pro_container">
        
            <div class="row">
            	<?php
					//getting active category list
					$manageContent->getActiveProductCategoryList();
				?>
            </div>
            
        </div><!-- container ends -->
    </div><!-- cols ends -->
</div><!-- row ends -->
						

<?php
	include 'v-templates/footer.php';
?>