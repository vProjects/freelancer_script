<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'employer')
	{
		header("Location: index.php");
	}
	$pageTitle = 'POST PROJECT';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        	<?php include 'v-templates/navbar.php';?>
            <div class="col-md-12 login_box_outline">
            	<h3 class="project_list_heading">Post A Project</h3>
                <form action="v-includes/manageData.php" class="form-horizontal" method="post" id="postProject_form" enctype="multipart/form-data">
                	<div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Project Title</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Project Title" id="postProject_name" name="project_name">
                            <div id="err_postProject_name"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Project Description</label>
                        <div class="col-md-8">
      						<textarea rows="6" class="form-control" placeholder="Project Description" id="postProject_description" name="project_description"></textarea>
                            <div id="err_postProject_description"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Skills Required</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Skills Required" id="postProject_skills" name="skills">
                            <div id="err_postProject_skills"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Price Range</label>
                        <div class="col-md-8">
      						<select class="form-control" id="postProject_price" name="price_range">
                            	<option value="Below $100">Below $100</option>
                                <option value="$100 - $500">$100 - $500</option>
                                <option value="$500 - $1000">$500 - $1000</option>
                                <option value="Above $1000">Above $1000</option>
                            </select>
                            <div id="err_postProject_price"></div>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Time Range</label>
                        <div class="col-md-8">
      						<select class="form-control" name="time_range">
                            	<option value="Within 3 Days">Within 3 Days</option>
                                <option value="Within 1 week">Within 1 week</option>
                                <option value="Within 2 week">Within 2 week</option>
                                <option value="Within 1 month">Within 1 month</option>
                                <option value="Within 2 month">Within 2 month</option>
                                <option value="Above 2 month">Above 2 month</option>
                            </select>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Preffered Location</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Preffered Location" name="preferred_location">
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Upload File</label>
                        <div class="col-md-8">
      						<input type="file" class="form-control" name="files">
                            <!--<p class="add_file_link pull-left">Add Another File</p>
                            <p class="remove_file_link pull-left">Remove File</p>-->
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                        <div class="col-md-offset-3 col-md-9">
      						<input type="button" class="btn btn-primary login_form_submit" value="SUBMIT" onclick="validateProjectPostForm('postProject_form');">
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