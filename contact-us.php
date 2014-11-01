<?php
	$page_title = 'Contact Us';
	//include template files
	include 'v-templates/header.php';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
?>
						
<!-- contact us section -->

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
    <div class="row">
        <div class="col-sm-12 contact-container">
            
            <div class="row">
                <div class="col-sm-8">
                    <div class="banner-contact">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8">
                                <p class="contact-banner-para">
                                    Lorem ipsum dolor sit<br />
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                </p>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <img src="<?php echo $baseUrl;?>images/contact.png" class="img-responsive" />
                            </div>
                        </div>
                    </div><!-- banner contact ends -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    
                    <h3 class="contact-head">
                        Telephone
                    </h3>
                    <p class="contact-para">
                        Lorem ipsum : 123456789<br />
                        Lorem Ipsum (lorem ipsum) : 123456789<br />
                        Lorem ipsum : 123456789
                    </p>
                    
                    <h3 class="contact-head">
                        Fax Number
                    </h3>
                    <p class="contact-para">
                        Lorem Ipsum (lorem ipsum) : 123456789<br />
                        Lorem ipsum : 123456789
                    </p>
                    
                    <h3 class="contact-head">
                        Address
                    </h3>
                    <p class="contact-para">
                        Lorem Ipsum Lorem Ipsum Lorem.Ipsum<br /> 
                        0 Lorem Ipsum<br /> 
                        000 Lorem Ipsum<br /> 
                        Lorem 0001
                    </p>
                    
                    <h3 class="contact-head">
                        E-mail
                    </h3>
                    <p class="contact-para">
                        loremipsum@lorem.ipsum
                    </p>
                    
                    <h3 class="contact-head">
                        Operating Hours
                    </h3>
                    <p class="contact-para">
                        Lorem Ipsum (lorem ipsum) : 123456789<br /> 
                        000 Lorem ipsum<br />
                        Lorem ipsum (0am-0pm)<br />
                        Lorem ipsum dolor sit amet
                    </p>
                    
                </div>
            </div>
            
        </div><!-- cols ends -->
    </div><!-- row ends -->
</div><!-- container ends -->
						
<?php
	include 'v-templates/footer.php';
?>