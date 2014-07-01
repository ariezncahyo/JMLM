<?php
	$page_title = 'My Wallet';
	//include template files
	include 'v-templates/header-user.php';
?>
				
				
<!-- navbar second profile -->

<nav class="navbar navbar-scnd-prof" role="navigation">
    <div class="container">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle nav-toggle-custom" data-toggle="collapse" data-target="#collapsenavscndprof">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar icn-custom"></span>
                <span class="icon-bar icn-custom"></span>
                <span class="icon-bar icn-custom"></span>
            </button>
        </div><!-- navbar-header ends -->
        
        <!-- navbar elements for toggling -->
        <div class="collapse navbar-collapse" id="collapsenavscndprof">
            <ul class="nav navbar-nav nav-custom-scnd-prof">
                <li><a href="index.php"><span class="active-scnd-prof">HOME</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">ABOUT US</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">SERVICES</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">MEDIA</span></a></li>
                <li><a href="#"><span class="hvr-scnd-prof">MEMBERSHIP</span></a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right nav-custom-scnd-prof">
                <form role="form" method="post" class="form-prof">
                    <div class="form-group">
                        <div class="col-sm-12 pad-social">
                            <input type="text" placeholder="Search" class="form-control customsearch-prof" />
                            <img src="images/search-logo.png" class="img-search-prof" />
                        </div>
                    </div>
                </form>
            </ul>
        </div><!-- collapsenavprof ends -->
        
    </div><!-- container fluid ends -->
</nav>

<div class="container">
    <div class="row row-prof">
        <div class="col-sm-12">
            
            <div class="row mrgn-btm">
                
                <?php
					//include left sidebar
					include 'v-templates/sidebar-user.php';
				?>
                
                <div class="col-sm-8">
                    
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>2</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>4</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>1</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Lorem Ipsum</td>
                                    <td>5</td>
                                    <td>20.06.2014</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="amt-color">Gross Amount</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="amt-color">Withdrew Amount</td>
                                    <td>$22.45</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="amt-color">Net Amount</td>
                                    <td>$22.45</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>