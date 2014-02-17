<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor')
	{
		header("Location: index.php");
	}
	$pageTitle = 'FIND JOB';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
            <?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
                <form class="form-horizontal">
                	<div class="form-group v-form_control">
                    	<label class="col-md-2 control-label login_form_label">Categories</label>
                        <div class="col-md-4">
      						<select class="form-control" id="findjob_category">
                            	<option value="all_jobs">All Categories</option>
                                <option value="IT & Programming">IT & Programming</option>
                                <option value="Design & Multimedia">Design & Multimedia</option>
                            </select>
    					</div>
                    </div>
                </form>
                <div class="job_list_outline">
                	<?php $job_list = $manageContent->getAllJobList(); ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
       </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>