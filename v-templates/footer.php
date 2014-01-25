<!-- footer starts here -->
<div class="footer">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4 footer_part">
            	<h3 class="footer_heading">Lorem Ipsum</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="col-md-4 footer_part">
            	<h3 class="footer_heading">Lorem Ipsum</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="col-md-4 footer_part">
            	<h3 class="footer_heading">Lorem Ipsum</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>
</div>
<!-- footer ends here -->
<!-- copyright section starts here -->
<div class="copyright">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<p>2013 © FREELANCER SCRIPT. ALL Rights Reserved. 
                <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </div>
    </div>
</div>
<!-- copyright section ends here -->

<!--Import the bootstrap JS-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
<script src="js/validiation.js"></script>
<script src="js/operational_function.js"></script>
<!--- cdn for calendar view date -->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
	$(function() {
	  $( "#calender_date" ).datepicker();
	  $( "#calender_date" ).datepicker("option", "dateFormat","yy-mm-dd");
	 });
</script>
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