<?php
	$page_title = 'Bank Account';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
?>
<?php
	//include another template file
	include 'v-templates/header-user.php';
	//calling the bll function for showing bank details
	$bank_value=$manageContent->getUserBankDetails();
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
                
                <div class="col-sm-9">
                    
                    <div class="head-profile-checkout">
                        your account details
                    </div>
                    <?php if(!empty($bank_value)) { ?>
                    
                    <form class="form-horizontal" action="<?php echo $baseUrl;?>v-includes/functions/function.edit-bank_details.php" method="post" id="user_bank_frm">
                        
                        <div class="form-group mrgn-tp-profile">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Account Holder Name</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="ac_holder_name" value="<?php echo $bank_value[0]['ac_holder_name'] ?>" />
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Account Number</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="ac_number" value="<?php echo $bank_value[0]['ac_number'] ?>" />
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Your Bank Name</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="bank_name" value="<?php echo $bank_value[0]['bank_name'] ?>" />
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Branch Name</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="branch_name" value="<?php echo $bank_value[0]['branch_name'] ?>" />
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">IFSC Code</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="ifsc_code" value="<?php echo $bank_value[0]['ifsc_code'] ?>" />
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Tax Number</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="tax_number" value="<?php echo $bank_value[0]['tax_number'] ?>" />
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-5">
                                <button type="submit" class="btn btn-custom-profile" id="user_bank_btn">UPDATE</button>
                            </div>
                        </div>
                        
                    </form>
                    <?php } else { ?>
                    
                    <form class="form-horizontal" action="<?php echo $baseUrl;?>v-includes/functions/function.create-bank_details.php" method="post" id="user_bank_frm" >
                        
                        <div class="form-group mrgn-tp-profile">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Account Holder Name</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="ac_holder_name" id="bnk_ac_holder_name" />
                                <div class="form-error" id="err_ac_holder_name"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Account Number</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="ac_number" id="bnk_ac_number" />
                                <div class="form-error" id="err_ac_number"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Your Bank Name</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="bank_name" id="bnk_bank_name" />
                                <div class="form-error" id="err_bank_name"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Branch Name</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="branch_name" id="bnk_branch_name" />
                                <div class="form-error" id="err_branch_name"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">IFSC Code</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="ifsc_code" id="bnk_ifsc_code" />
                                <div class="form-error" id="err_ifsc_code"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-sm-offset-1 label-profile">Tax Number</label>
                            <div class="col-sm-offset-1 col-sm-5">
                                <input class="form-control form-profile" type="text" name="tax_number" id="bnk_tax_number" />
                                <div class="form-error" id="err_tax_number"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-5">
                                <button type="button" class="btn btn-custom-profile" id="user_bank_btn">SUBMIT</button>
                            </div>
                        </div>
                        
                    </form>
                    <?php } ?>
                    
                </div><!-- col-sm-8 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>