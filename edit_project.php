<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'employer')
	{
		header("Location: index.php");
	}
	$pageTitle = 'EDIT PROJECT';
	include 'v-templates/header.php';
	//getting values from get request
	$project_id = $GLOBALS['_GET']['id'];
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        	<?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
            	<h3 class="project_list_heading">Edit Project</h3>
                <?php 
					if(isset($project_id))
					{
						$edit_project = $manageContent->editProject($project_id);
					}
					else
					{
						echo '<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Project Details Found</p>';
					}
				?>
            </div>
            <div class="clearfix"></div>
       </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>