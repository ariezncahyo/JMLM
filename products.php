<?php
	$page_title = 'Product';
	//include template files
	include 'v-templates/header-guest.php';
?>
<?php
	if(isset($GLOBALS['_GET']['cat']))
	{
		$cat_id = $GLOBALS['_GET']['cat'];
	}
	else
	{
		$cat_id = '';
	}
	if(isset($GLOBALS['_GET']['l']))
	{
		$level = $GLOBALS['_GET']['l'];
	}
	else
	{
		$level = 1;
	}
?>
						
<!-- banner -->

<div class="container">
	
    <div class="row">
        <div class="col-sm-12">
            <div class="head-banner">
                <div class="banner-link">
                    <a href="products.php" class="banner-h"><span class="banner-spn">PRODUCTS</span> ></a>
                </div><!-- banner link -->
            </div><!-- head banner -->
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
        	<?php include 'v-templates/category-sidebar.php'; ?>
        </div>
        <div class="col-sm-9">
            <div class="banner">    
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2 pad-social">
                        <div class="products-btn">
                            <a href="products.php">PRODUCTS</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner ends -->
            
            <!-- products section -->
            <div class="row">
                <?php
					//get product list
					if(!empty($cat_id))
					{
						$manageContent->getProductListOfCategory($cat_id);
					}
					else
					{
						$manageContent->getFeatureProductList();
					}
				?>
         	</div>      
        </div>                
    </div>
          
						
<?php
	include 'v-templates/footer.php';
?>