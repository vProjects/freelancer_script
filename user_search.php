<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']))
	{
		header("Location: index.php");
	}
	$pageTitle = 'USER SEARCH';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
			<?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
                <form class="form-inline">
                    <input type="text" class="form-control search_textbox" name="user_name" placeholder="type user first name" id="user_search_element">
                    <input type="button" class="btn btn-danger" value="search" 
                    onClick="userDetailsSearch(<?php echo '\''.$_SESSION['user_id'].'\'' ?>);">
                </form>
                <div class="table-responsive" id="user_search_result">
                
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