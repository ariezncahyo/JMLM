<?php
	$page_title = 'Home';
	//include template files
	include 'v-templates/header-guest.php';
?>
						
        <div class="row row-mrgn-nul hd-carousel">
            <div class="col-sm-12">
            </div>
        </div>
        
<!-- slider -->
    <div class="container">
        
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