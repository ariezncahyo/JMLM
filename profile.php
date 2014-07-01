<?php
	$page_title = 'Profile';
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
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                                <p class="rgt-col-para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="rgt-col-para brdr-none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                    
                    <div class="rgt-col-divs">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="rgt-col-hd">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <div class="rgt-col-para plc-blnk-rgt brdr-none">
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- right column divs ends -->
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>