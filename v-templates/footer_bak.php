
<!-- footer -->
<div id="footer">
					
	<div id="footer-inner" class="container">
		<div class="col-sm-12">
        	<div id="footer-nav">
				<ul class="footer-nav">
					<li class="first"><a href="<?php echo $baseUrl;?>myPage.php?id=<?php echo 'p541836a6dd1da'; ?>">Company History</a></li>
					<li><a href="<?php echo $baseUrl;?>myPage.php?id=<?php echo 'p54183ceaf255b'; ?>">Culture</a></li>
					<li><a href="<?php echo $baseUrl;?>myPage.php?id=<?php echo 'p54183fca07ee9'; ?>">Future</a></li>
					<li><a href="<?php echo $baseUrl;?>myPage.php?id=<?php echo 'p541841628c586'; ?>">Opportunity</a></li>
					<li><a href="<?php echo $baseUrl;?>myPage.php?id=<?php echo 'p54184a5d7dd30'; ?>">Our Team</a></li>
					<li class="last"><a href="<?php echo $baseUrl;?>products.php">Products</a></li>
				</ul>
            </div>
            <div id="footer-social">
            	<div>
					<a href="#"><img src="<?php echo $baseUrl;?>images/facebook.png" class="img-social-foot" /></a>
					<a href="#"><img src="<?php echo $baseUrl;?>images/twitter.png" class="img-social-foot" /></a>
					<a href="#"><img src="<?php echo $baseUrl;?>images/g-plus.png" class="img-social-foot" /></a>
				</div>
            </div>
		</div>
		<div class="col-sm-12">
			<div id="footer-copyright">Copyright © 2014 Di Huang. All Rights Reserved.</p></div>					
			<div id="footer-payment">
				<div>
					<a href="#" title="Paypal"><img src="<?php echo $baseUrl;?>images/icons/paypal.png" class="img-social-foot" /></a>
					<a href="#" title="Visa"><img src="<?php echo $baseUrl;?>images/icons/visa.png" class="img-social-foot" /></a>
					<a href="#" title="Mastercard"><img src="<?php echo $baseUrl;?>images/icons/mastercard.png" class="img-social-foot" /></a>
                    <a href="#" title="Efinity"><img src="<?php echo $baseUrl;?>images/icons/efinity.png" class="img-social-foot" /></a>
				</div>							
			</div>				
		</div><!-- row ends -->
	</div> 
       		
</div><!-- footer ends -->

<script>
  $(function () {
    $('#myTab a:first').tab('show')
  });
</script>
<script src="<?php echo $baseUrl;?>dist/js/custom.js"></script>
<script src="<?php echo $baseUrl;?>js/asynch-function.js"></script>
<script src="<?php echo $baseUrl;?>js/validiation.js"></script>
<script src="<?php echo $baseUrl;?>js/jquery.plugin.js"></script>
<script src="<?php echo $baseUrl;?>js/jquery.datepick.js"></script>
<script src="<?php echo $baseUrl;?>js/shopping-cart.js"></script>

<script type="text/javascript">
	$('.dob').datepick({
		dateFormat: 'yyyy-mm-dd',
		minDate: new Date(1900, 1 - 1, 01), 
		maxDate: new Date(),
		yearRange: '1900:2014',
		showTrigger: '#calImg'
	});
</script>
	<?php
		//checking for session variable and showing the result
		if(isset($_SESSION['success']))
		{
			echo '<script type="text/javascript">alertSuccess("'.$_SESSION['success'].'");</script>';
			unset($_SESSION['success']);
		}
		else if(isset($_SESSION['warning']))
		{
			echo '<script type="text/javascript">alertWarning("'.$_SESSION['warning'].'");</script>';
			unset($_SESSION['warning']);
		}
	?>
</body>
</html>
