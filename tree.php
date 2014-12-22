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
	if(!empty($_GET['id']) && isset($_GET['id']))
	{
		$userId = $_GET['id'];
	}
	else 
	{
		$userId = $_SESSION['user_id'];
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
                
                <div class="col-sm-9">
                    <div class="main-container">
                    	<!--local-member block start-->
                    		<?php
	                    		//setting variable to value 1
	                    		$level = 1;
								//calling method from BLL library
	                    		$manageContent->getTreeData($userId, $level);
								$parent = $manageContent->getParent($userId);
								if($parent[0])
								{
									echo '<a href="'.$parent[0]['user_id'].'"><span class="parent-link">'.back_to_parent.'</span></a>';
								}
                    		?>
                    	</div><!--local-member block end-->
                    	
                    	<div class="clearfix"></div>
                    </div><!--main container end-->
               </div><!-- col-sm-9 ends -->
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>