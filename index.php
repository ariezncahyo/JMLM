<?php
	session_start();
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
            
            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators carousel-indicators-custom">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="http://placehold.it/1150x450" alt="text">
                </div>
                <div class="item">
                  <img src="http://placehold.it/1150x450" alt="text">
                </div>
                <div class="item">
                  <img src="http://placehold.it/1150x450" alt="text">
                </div>
                <div class="item">
                  <img src="http://placehold.it/1150x450" alt="text">
                </div>
                <div class="item">
                  <img src="http://placehold.it/1150x450" alt="text">
                </div>
              </div>
            
              <!-- Controls -->
              <a class="left lt-rt carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right lt-rt carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
            
        </div><!-- column -->
    </div><!-- row -->

    </div>	
<!-- slider ends -->

<!-- products section -->

<div class="row col-product row-mrgn-nul">
    <div class="col-sm-12">
        <div class="container">
        
            <div class="row">
                
                <div class="col-sm-3">
                    <a href="product-description.php" class="hvr-no-decortn">
                        <div class="container-products">
                            <p class="prod-para">
                                Lorem ipsum dolor sit Lorem Ipsum
                            </p>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="img-container">
                                        <img src="images/prod1.png" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-3">
                    <a href="product-description.php" class="hvr-no-decortn">
                        <div class="container-products">
                            <p class="prod-para">
                                Lorem ipsum dolor sit Lorem Ipsum
                            </p>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="img-container">
                                        <img src="images/prod1.png" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-3">
                    <a href="product-description.php" class="hvr-no-decortn">
                        <div class="container-products">
                            <p class="prod-para">
                                Lorem ipsum dolor sit Lorem Ipsum
                            </p>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="img-container">
                                        <img src="images/prod1.png" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-3">
                    <a href="product-description.php" class="hvr-no-decortn">
                        <div class="container-products">
                            <p class="prod-para">
                                Lorem ipsum dolor sit Lorem Ipsum
                            </p>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="img-container">
                                        <img src="images/prod1.png" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            
        </div><!-- container ends -->
    </div><!-- cols ends -->
</div><!-- row ends -->
						

<?php
	include 'v-templates/footer.php';
?>