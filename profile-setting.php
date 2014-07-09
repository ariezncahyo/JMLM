<?php
	$page_title = 'Profile Setting';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>

<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row row-prof">
        <div class="col-sm-12">
            
            <div class="row mrgn-btm">
                
                <?php
					//include left sidebar
					include 'v-templates/sidebar-user.php';
				?>
                
                <div class="col-sm-8">
                    
                    <div class="head-profile-checkout">
                        profile settings
                    </div>
                    
                    <h3 class="hd-scnd-profile mrgn-tp-profile">
                        Personal Information
                    </h1>
                    
                    <form class="form-horizontal">
                        
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Name: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Date of Birth: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Gender: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <select class="form-control form-profile">
                                    <option>Select</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Contact: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Email: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Password: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Title1: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Title2: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">City: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Country: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Your State: </label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input class="form-control form-profile" type="text" />
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