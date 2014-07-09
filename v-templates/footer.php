<div class="row row-mrgn-nul hd-carousel">
					<div class="col-sm-12">
					</div>
				</div>
						
				<!-- footer -->
					
					<div class="container mrgn-btm">
						<div class="row">
							<div class="col-sm-12">
								
								<div class="row">
									
									<div class="col-sm-2">
										<p class="company-label">
											<a href="#">Company</a>
										</p>
									</div>
									
									<div class="col-sm-offset-7 col-sm-3">
										
										<div class="row">
											<div class="col-sm-3">
												
												<div class="img-logo-footer">
													<img src="images/logo-small.png" />
												</div><!-- img logo footer -->
												
											</div>	
												
											<div class="col-sm-9 pad-social">
												<p class="label-social"><a href="#">Lorem Ipsum</a></p>
											</div>
												
										</div>
												
										<div class="row">
											<div class="col-sm-offset-3 col-sm-9 pad-social">
												<a href="#"><img src="images/facebook.png" class="img-social-foot" /></a>
												<a href="#"><img src="images/twitter.png" class="img-social-foot" /></a>
												<a href="#"><img src="images/g-plus.png" class="img-social-foot" /></a>
											</div>
										</div>
											
									</div>
									
								</div><!-- row -->
								
							</div><!-- cols ends -->
						</div><!-- row ends -->
					</div>
					
				<!-- footer ends -->
<script>
  $(function () {
    $('#myTab a:first').tab('show')
  });
</script>
<script src="dist/js/custom.js"></script>
<script src="js/asynch-function.js"></script>
<script src="js/validiation.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.datepick.js"></script>

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
