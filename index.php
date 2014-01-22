<?php
	session_start();
	$pageTitle = 'LOGIN';
	include 'v-templates/header.php';
?>
<!-- header starts here -->
<div class="header_outline">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header_heading">Freelancer Script</div>
            </div>
        </div>
    </div>
</div>
<!-- header ends here -->
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        	<?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-8 col-md-offset-2 login_box_outline">
            	<form action="v-includes/manageData.php" class="form-horizontal" method="post" id="login_form">
                	<div class="form-group v-form_control">
                    	<label class="col-md-2 control-label login_form_label">Email Id</label>
                        <div class="col-md-9">
      						<input type="email" class="form-control" placeholder="Email" name="email">
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-2 control-label login_form_label">Password</label>
                        <div class="col-md-9">
      						<input type="password" class="form-control" placeholder="Password" name="password">
    					</div>
                    </div>
                    <div class="form-group v-form_control">
  						<label class="col-md-offset-2 col-md-5 login_form_label">
    						<input type="radio" name="category" value="employer" id="login_employer">
    						Employer
  						</label>
  						<label class="col-md-5 login_form_label">
    						<input type="radio" name="category" value="contractor" id="login_contractor">
    						Contractor
                            <div id="err_login_radio"></div>
  						</label>
					</div>
                     <div class="form-group v-form_control">
                        <div class="col-md-offset-2 col-md-9">
      						<input type="button" class="btn btn-danger pull-right login_form_submit" value="LOGIN" onclick="validateLoginForm('login_form');">
    					</div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
       </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>