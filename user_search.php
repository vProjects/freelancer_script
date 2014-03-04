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
                    <!--<input type="text" class="form-control search_textbox" name="user_name" placeholder="type user first name" id="user_search_element">-->
                    <div class="input-group">
                    	<div class="input-group-btn">
                            <select id="search_category" class="btn btn-default">
                            	<option value="" class="search_category_value">select search category </option>
                            	<option value="f_name" class="search_category_value">First Name</option>
                                <option value="l_name" class="search_category_value">Last name</option>
                                <option value="skills" class="search_category_value">Skills</option>
                                <option value="email_id" class="search_category_value">Email Id</option>
                            </select>
                        </div>
                        <input type="text" class="form-control search_textbox" id="user_search_element" placeholder="type search value">
                        <input type="button" class="btn btn-danger user_search_submit" value="search" 
                    onClick="userDetailsSearch(<?php echo '\''.$_SESSION['user_id'].'\'' ?>);">
                    </div>
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