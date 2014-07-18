<!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.plugin.js"></script>
    <script src="js/jquery.datepick.js"></script>
    <script src="js/asynch-function.js"></script>
    <script src="js/upload.js"></script>
    <script src="js/jquery.Jcrop.min.js"></script>
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
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!--  Admin Scripts - Include with every page -->
    <script src="js/admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>
    <!-- script added to load the file browser automatically for ckeditor -->
    <script src="//cdn.ckeditor.com/4.4.1/full/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('editor1', { filebrowserBrowseUrl: 'ss/index.html'});
		CKEDITOR.replace('editor2', { filebrowserBrowseUrl: 'ss/index.html'});
    </script>
    
    <script type="text/javascript">
		$('#per_date').datepick({
			dateFormat: 'yyyy-mm-dd',
			minDate: new Date(1900, 1 - 1, 01), 
			maxDate: new Date(),
			yearRange: '1900:2014',
			showTrigger: '#calImg'
		});
		
		$('.date_range').datepick({
			dateFormat: 'yyyy-mm-dd',
			minDate: new Date(1900, 1 - 1, 01), 
			maxDate: new Date(),
			yearRange: '1900:2014',
			showTrigger: '#calImg'
		});
		
		$('.exp_date').datepick({
			dateFormat: 'yyyy-mm-dd', 
			minDate: new Date(),
			maxDate: '+1y',
			showTrigger: '#calImg'
		});
	</script>
    
</body>

</html>