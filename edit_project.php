<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'employer')
	{
		header("Location: index.php");
	}
	$pageTitle = 'EDIT PROJECT';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        	<?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
            	<h3 class="project_list_heading">Edit Project</h3>
                <form class="form-horizontal" method="post">
                	<div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Project Title</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Project Title">
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Project Description</label>
                        <div class="col-md-8">
      						<textarea rows="6" class="form-control" placeholder="Project Description"></textarea>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Skills Required</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Skills Required">
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Price Range</label>
                        <div class="col-md-8">
      						<select class="form-control">
                            	<option>Below $100</option>
                                <option>$100 - $500</option>
                                <option>$500 - $1000</option>
                                <option>Above $1000</option>
                            </select>
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Preffered Location</label>
                        <div class="col-md-8">
      						<input type="text" class="form-control" placeholder="Preffered Location">
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                    	<label class="col-md-3 control-label login_form_label">Upload File</label>
                        <div class="col-md-8">
      						<input type="file" class="form-control">
    					</div>
                    </div>
                    <div class="form-group v-form_control">
                        <div class="col-md-offset-3 col-md-9">
      						<input type="submit" class="btn btn-primary login_form_submit" value="SUBMIT">
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