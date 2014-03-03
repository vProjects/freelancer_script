<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor')
	{
		header("Location: index.php");
	}
	$pageTitle = 'PERSONAL INFO';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        <?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-8 col-md-offset-2 login_box_outline">
            	<form action="v-includes/manageData.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<h3 class="form_heading">Personal Information</h3>
                	<?php
						$personal_info = $manageContent->getPersonalInfo($_SESSION['user_id']);
					?>
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