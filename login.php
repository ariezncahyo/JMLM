<?php
	session_start();
	$page_title = 'Login';
	//include template files
	include 'v-templates/header-guest.php';
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
        </div><!-- collapsenavprof ends -->
        
    </div><!-- container fluid ends -->
</nav>

<div class="row row-mrgn-nul row-mrgn-cart hd-carousel">
    <div class="col-sm-12">
    </div>
</div>

<!-- log in section -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="sign-log-in">Log In</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="log-in-content">
                <form class="form-horizontal" action="forgot-password.php" role="form" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Email : </label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control form-cart" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Password : </label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control form-cart" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Keep me logged in for 2 weeks
                            </label>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-warning checkout-btn">Log In</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 nul-pad col-sm-9">
                            <button type="submit" class="btn btn-link btn-link-custom">Forgot password</button>
                        </div>
                    </div>
                </form>
            </div><!-- log in content section ends -->
        </div>
    </div>
</div><!-- container for log in section ends -->
				
<?php
	include 'v-templates/footer.php';
?>