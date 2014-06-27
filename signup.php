<?php
	session_start();
	$page_title = 'Signup';
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

<!-- sign up section -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="sign-log-in">Sign Up</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <div class="sign-up-content">
                <form class="form-horizontal" method="post" action="email-verification.php" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">First Name : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="First Name" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Last Name : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="Last Name" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Username : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="Username" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Gender : </label>
                        <div class="col-sm-9">
                          <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                Male
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                Female
                              </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Date of Birth : </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-cart" placeholder="Date of Birth" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Address : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="Address" >
                          <input type="text" class="form-control form-cart mrgn-tp-cart" placeholder="Address" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Town/City : </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-cart" placeholder="Town/City" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Postal Code : </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-cart" placeholder="Postal Code" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Phone Number : </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control form-cart" placeholder="Phone Number" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Company : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="Company" >
                        </div>
                      </div>
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
                        <label class="col-sm-3 form-v-sign-up control-label">Confirm Password : </label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control form-cart" placeholder="Confirm Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 form-v-sign-up control-label">Password Hint : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control form-cart" placeholder="Password Hint" >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                          <button type="submit" class="btn btn-warning checkout-btn">Sign Up</button>
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