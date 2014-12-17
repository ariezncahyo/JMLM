<?php
	$page_title = 'Product';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
	//searching for products
	if(isset($_POST['product_name']))
	{
		$product_name = $_POST['product_name'];
		$pro_details = $manageContent->searchProductLikely($product_name, $baseUrl);
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
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
                    <a href="<?php echo $baseUrl;?>products/" class="banner-h"><span class="banner-spn">PRODUCTS</span> ></a>
                </div><!-- banner link -->
            </div><!-- head banner -->
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
        	<?php include 'v-templates/category-sidebar.php'; ?>
        </div>
        <div class="col-sm-9">
            <div id="products-banner">  
            	<img src="<?php echo $baseUrl;?>images/banners/products-banner.jpg" title="Products" />   
				<div class="products-banner-title">
					<a href="<?php echo $baseUrl;?>products/">PRODUCTS</a>
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
					elseif(isset($pro_details[0]))
					{
						$manageContent->getProductListBySearch($pro_details);
					}
					else
					{
						$manageContent->getFeatureProductList();
					}
				?>
         	</div>      
        </div>                
    </div>
</div>
						
<?php
	include 'v-templates/footer.php';
?>