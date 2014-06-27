<?php
	session_start();
	$page_title = 'WithDraw';
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
                    
                    <div class="head-profile-checkout">
                        withdraw amount
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        Total Amount in Your Account: <span class="amt-account">$300.30</span>
                    </h1>
                    
                    <form class="form-horizontal">
                        
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Withdraw Amount: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" placeholder="In Figure" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-11">
                                <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" /><label for="checkbox-1-1"></label>
                                <span class="label-custom">
                                    Withdraw by Account
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-4">
                                <button type="submit" class="btn btn-custom-profile">SUBMIT</button>
                            </div>
                        </div>
                        
                    </form>
                    
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>