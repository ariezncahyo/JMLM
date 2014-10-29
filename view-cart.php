<?php
	$page_title = 'View Cart';
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

<div class="row row-mrgn-nul row-mrgn-cart hd-carousel">
    <div class="col-sm-12">
    </div>
</div>

<!-- view cart section -->

<div class="container view_cart_container">
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
        <!--<form method="post" role="form">-->
        <div class="col-sm-8">
            <h3 class="cart-prod-name">
                Your shopping cart - <?php $manageContent->getTotalProductInCart(); ?> Items
            </h3>
            
			<?php
				if(isset($GLOBALS['_COOKIE']['DiHuangCart']) && isset($GLOBALS['_COOKIE'][$_SESSION['user_id']]))
				{
					//get selected product list
					$cart_amount = $manageContent->getProductListInCart();
					//getting currency
					$currency = $manageContent->getSystemCurrency('product');
					//showing total amount
					echo '<div class="sub-total">
							<div class="row">
								<div class="col-sm-2">
									<a class="btn btn-link btn-link-custom" id="empty_cart">Empty Your Cart</a>
								</div>
								<div class="col-sm-offset-7 col-sm-3">
									<p class="prod-v-crt-name">Subtotal : '.$currency.$cart_amount.'</p>
								</div>
							</div>
						</div>';
				}
			?>
              
        </div><!-- col-sm-8 ends -->
        
        
        <div class="col-sm-4">
        	
			<?php
				if(isset($GLOBALS['_COOKIE']['DiHuangCart']) && isset($GLOBALS['_COOKIE'][$_SESSION['user_id']]))
				{
					//calculating total cost
					$total_cost = $cart_amount + $manageContent->getShippingCost();
					echo '<div class="checkout-content">
							<div class="row">
								<div class="col-xs-8">
									<p class="prod-v-crt-name">Subtotal : </p>
								</div>
								<div class="col-xs-4">
									<p class="prod-v-crt-name txt-rt">'.$currency.$cart_amount.'</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-8">
									<p class="prod-v-crt-name">Shipping Cost : </p>
								</div>
								<div class="col-xs-4">
									<p class="prod-v-crt-name txt-rt">'.$currency.$manageContent->getShippingCost().'</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-8">
									<p class="prod-v-crt-total"><em>Total Cost :  </em></p>
								</div>
								<div class="col-xs-4">
									<p class="prod-v-crt-total txt-rt"><em>'.$currency.$total_cost.'</em></p>
								</div>
							</div>
							<div class="row btn-cust-row">
								<div class="col-xs-6">
									<a href="products.php"><button class="btn btn-warning pull-left">Continue Shopping</button></a>
								</div>
								<div class="col-xs-6">
									<a href="checkout.php"><button class="btn btn-warning pull-right">Go To Checkout</button></a>
								</div>
							</div>
						</div>';
				}
			?>
            
        </div>
        <!--</form>-->
    </div><!-- row ends -->
</div><!-- container ends -->

<?php if($_SESSION['user_id'] == 'Guest'){ ?>

<!-- Modal -->
<div class="modal fade" id="viewCartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Lorem Ipsum</h4>
      </div>
      <div class="modal-body">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="login.php"><button type="button" class="btn btn-primary">Go to Login</button></a>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
		$('#viewCartModal').modal({
		  keyboard: false
		})
	});
</script>
<?php } ?>

<?php
	include 'v-templates/footer.php';
?>