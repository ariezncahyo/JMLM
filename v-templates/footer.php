
<!-- footer -->
<div id="footer">
					
	<div id="footer-inner" class="container">
		<div class="col-sm-12">
        	<div id="footer-nav">
				<ul class="footer-nav">
					<?php
						$links = $manageContent->getFooterPageLinks();
						if(!empty($links[0]['id']))
						{
							foreach($links as $link)
							{
								echo '<li><a href='.$baseUrl.$link['page_link'].'>'.$link['name'].'</a></li>';
							}
						}
					?>
				</ul>
            </div>
            <div id="footer-social">
            	<div>
					<a href="https://www.facebook.com/" title="Facebook" target="_blank"><img src="<?php echo $baseUrl;?>images/icons/facebook.png" class="img-social-foot" /></a>
					<a href="https://twitter.com/" title="Twitter" target="_blank"><img src="<?php echo $baseUrl;?>images/icons/twitter.png" class="img-social-foot" /></a>
					<a href="https://plus.google.com/" title="Google Plus" target="_blank"><img src="<?php echo $baseUrl;?>images/icons/g-plus.png" class="img-social-foot" /></a>
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
	
	$('#AddButton').on('click', function () {
    	var input = $('#pro_quan');
    	input.val(parseFloat(input.val(), 10) + 1);
	})

	$('#MinusButton').on('click', function () {
	    var input = $('#pro_quan');
	    if(parseFloat(input.val(), 10) > 0)
	    {
	    	input.val(parseFloat(input.val(), 10) - 1);
	    }
	    
	})
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
