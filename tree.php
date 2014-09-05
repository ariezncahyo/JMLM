<?php
	$page_title = 'Profile Setting';
	//include template files
	include 'v-templates/header.php';
	if($_SESSION['user_id'] == 'Guest')
	{
		header("Location: index.php");
	}
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user.php");
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
                
                <div class="col-sm-9 over-x-cont">
                    
                    <div class="tree-container">
                    	
                    	<!-- main person -->
	                    <div class="row">
	                    	<div class="col-sm-4 col-sm-offset-4">
	                    		<img src="images/user-icon.png" class="img-responsive center-block mrgn-tp-cart">
	                    		<h2 class="txt-hd-tree">whole seller</h2>
	                    		<div class="pro_info_topic mrgn-tp-cart">Membership Id</div>
					            <div class="pro_info_text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-sm-6 col-sm-offset-3">
	                    		<div class="mrgn-tree-brdr-scnd">
	                    			<img src="images/border.png" class="fl-wid">
	                    		</div>
	                    	</div>
	                    </div>
	                    <!-- second subcategory -->
	                    <div class="row">
	                    	<div class="col-sm-3 col-sm-offset-2">
	                    		<img src="images/local-distribuiter-icon.png" class="img-responsive center-block mrgn-tp-cart">
	                    		<h2 class="txt-hd-tree-scnd">local distributer</h2>
	                    		<div class="mrgn-tp-cart fnt-scnd-tree-topic">Membership Id</div>
					            <div class="fnt-scnd-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-3 col-sm-offset-2">
	                    		<img src="images/global-distribuiter-icon.png" class="img-responsive center-block mrgn-tp-cart">
	                    		<h2 class="txt-hd-tree-scnd">global distributer</h2>
	                    		<div class="mrgn-tp-cart fnt-scnd-tree-topic">Membership Id</div>
					            <div class="fnt-scnd-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-sm-4 col-sm-offset-1">
	                    		<div class="mrgn-tree-brdr">
	                    			<img src="images/border.png" class="fl-wid">
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-4 col-sm-offset-2">
	                    		<div class="mrgn-tree-brdr">
	                    			<img src="images/border.png" class="fl-wid">
	                    		</div>
	                    	</div>
	                    </div>
	                    <!-- 3rd subcategory -->
	                    <div class="row">
	                    	<div class="col-sm-3">
	                    		<img src="images/agent-icon.png" class="img-responsive center-block mrgn-tp-cart">
	                    		<h2 class="txt-hd-tree-scnd">agent</h2>
	                    		<div class="mrgn-tp-cart fnt-scnd-tree-topic">Membership Id</div>
					            <div class="fnt-scnd-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-3">
	                    		<img src="images/retailer-icon.png" class="img-responsive center-block mrgn-tp-cart">
	                    		<h2 class="txt-hd-tree-scnd">retailer</h2>
	                    		<div class="mrgn-tp-cart fnt-scnd-tree-topic">Membership Id</div>
					            <div class="fnt-scnd-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-3">
	                    		<img src="images/member-icon.png" class="img-responsive center-block mrgn-tp-cart">
	                    		<h2 class="txt-hd-tree-scnd">member</h2>
	                    		<div class="mrgn-tp-cart fnt-scnd-tree-topic">Membership Id</div>
					            <div class="fnt-scnd-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-3">
	                    		<img src="images/whole-saler-icon.png" class="img-responsive center-block mrgn-tp-cart">
	                    		<h2 class="txt-hd-tree-scnd">whole seller</h2>
	                    		<div class="mrgn-tp-cart fnt-scnd-tree-topic">Membership Id</div>
					            <div class="fnt-scnd-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-sm-3">
	                    		<div class="mrgn-tree-brdr">
	                    			<img src="images/border2.png" class="fl-wid">
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-3">
	                    		<div class="mrgn-tree-brdr">
	                    			<img src="images/border2.png" class="fl-wid">
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-3">
	                    		<div class="mrgn-tree-brdr">
	                    			<img src="images/border2.png" class="fl-wid">
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-3">
	                    		<div class="mrgn-tree-brdr">
	                    			<img src="images/border2.png" class="fl-wid">
	                    		</div>
	                    	</div>
	                    </div>
	                    <!-- 4th subcategory -->
	                    <div class="row">
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    	<div class="col-sm-1">
	                    		<img src="images/member2-icon.png" class="img-responsive center-block">
	                    		<h2 class="txt-hd-tree-lst">member</h2>
	                    		<div class="mrgn-tp-cart fnt-lst-tree-topic">Membership Id</div>
					            <div class="fnt-lst-tree-text">DSJ68SD4634DFS654S</div>
	                    	</div>
	                    </div>
                    	
                    </div>
                    
                </div>
                
            </div><!-- row ends -->
            
        </div>
    </div>
</div>
				
<?php
	include 'v-templates/footer.php';
?>