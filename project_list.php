<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'employer')
	{
		header("Location: index.php");
	}
	$pageTitle = 'PROJECT LIST';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
            <?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
            	<h3 class="project_list_heading">List of Project Posted</h3>
                <div class="table-responsive">
                <table class="table table-bordered project_list_table">
                	<thead>
                    	<tr>
                        	<th>Project Title</th>
                            <th class="col-md-3 col-sm-4 col-xs-4">Description</th>
                            <th>Skills Required</th>
                            <th>Price Range</th>
                            <th>Time Range</th>
                            <th>Date & Time</th>
                            <th>Preferred Location</th>
                            <th>File Uploaded</th>
                            <th>Edit Project</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $project_list = $manageContent->getProjectList($_SESSION['user_id']); ?>
                    </tbody>
                </table>
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