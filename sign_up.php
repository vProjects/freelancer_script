<?php
	session_start();
	$pageTitle = 'SIGNUP';
	include 'v-templates/header.php';
	
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        <?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-8 col-md-offset-2 login_box_outline">
            	<form action="v-includes/manageData.php" class="form-horizontal" method="post" id="signup_form" enctype="multipart/form-data">
                	<h3 class="form_heading">Registration Form</h3>
                	<div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">First Name</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="First Name" id="signup_name" name="f_name">
                            <div id="err_signup_name"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Last Name</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Last Name" id="signup_lname" name="l_name">
                            <div id="err_signup_lname"></div>
    					</div>
                    </div>
                    <!--
                    <div class="form-group v-form_control">
                                            <label class="col-md-3 control-label login_form_label">Date Of Birth</label>
                                            <div class="col-md-8">
                                                  <input type="text" class="form-control" placeholder="Only Birth Year" id="calender_date" name="dob">
                                                <div id="err_calender_date"></div>
                                            </div>
                                        </div>-->
                    
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Gender</label>
  						<label class="col-md-4 login_form_label">
    						<input type="radio" name="gender" value="male" id="signup_male">
    						Male
  						</label>
  						<label class="col-md-4 login_form_label">
    						<input type="radio" name="gender" value="female" id="signup_female">
    						Female
                            <div id="err_gender"></div>
  						</label>
                        
					</div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Email Id</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Email" id="signup_email" name="email">
                            <div id="err_signup_email"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Contact No</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Contact No" id="signup_contact" name="contact_no">
                            <div id="err_signup_contact"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Address</label>
                        <div class="col-md-8">
      						<textarea class="form-control" placeholder="Address Details" id="signup_address" name="address" rows="5"></textarea>
                            <div id="err_signup_address"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Password</label>
                        <div class="col-md-8">
      						<input type="password" class="form-control" placeholder="Password" name="password" id="signup_password" name="password">
                            <div id="err_signup_password"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Confirm Password</label>
                        <div class="col-md-8">
      						<input type="password" class="form-control" placeholder="Confirm Password" id="signup_confirm_password" name="confirm_password">
                            <div id="err_signup_confirm_password"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Profile Image</label>
                        <div class="col-md-8">
      						<input type="file" name="photo" class="form-control" />
    					</div>
                    </div>
                    <div class="form-group v-form_control">
  						<label class="col-md-offset-3 col-md-4 login_form_label">
    						<input type="radio" name="category" value="employer" id="signup_employer">
    						Employer
  						</label>
  						<label class="col-md-4 login_form_label">
    						<input type="radio" name="category" value="contractor" id="signup_contractor">
    						Contractor
                            <div id="err_radio"></div>
  						</label> 
					</div>
                     <div class="form-group v-form_control">
                        <div class="col-md-offset-3 col-md-8">
      						<input type="button" class="btn btn-primary login_form_submit" value="SIGNUP" onclick="validateSignupForm('signup_form')">
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