<?php
	session_start();
	if(isset($_SESSION['admin']))
	{
		header("Location: admin.php");
	}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manager Admin</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Admin CSS - Include with every page -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" id="admin_index_heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    	<!-- div for showing success message--->
                        <div class="alert alert-success" id="success_msg"></div>
                        <!-- div for showing warning message--->
                        <div class="alert alert-danger" id="warning_msg"></div>
                        
                        <form role="form" action="v-includes/functions/function.login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/asynch-function.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!--Admin Scripts - Include with every page -->
    <script src="js/admin.js"></script>

<?php
	//checking for session variable and showing the result
	if(isset($_SESSION['success']))
	{
		echo '<script type="text/javascript">alertSuccess("'.$_SESSION['success'].'");</script>';
		unset($_SESSION['success']);
	}
	else if(isset($_SESSION['warning']))
	{
		echo '<script type="text/javascript">alertWarning("'.$_SESSION['warning'].'");</script>';
		unset($_SESSION['warning']);
	}
?>

</body>

</html>
