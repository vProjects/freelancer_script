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
                            <th class="col-md-4">Description</th>
                            <th>Skills Required</th>
                            <th class="col-md-2">Price Range</th>
                            <th class="col-md-2">Date & Time</th>
                            <th>Preferred Location</th>
                            <th>File Uploaded</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<tr>
                        	<td>HTMl Design</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                            <td>HTML, CSS</td>
                            <td>$200 - $300</td>
                            <td>01-01-2014</td>
                            <td>Any Where</td>
                            <td>No</td>
                        </tr>
                        <tr>
                        	<td>HTMl Design</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                            <td>HTML, CSS</td>
                            <td>$200 - $300</td>
                            <td>01-01-2014</td>
                            <td>Any Where</td>
                            <td>No</td>
                        </tr>
                        <tr>
                        	<td>HTMl Design</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                            <td>HTML, CSS</td>
                            <td>$200 - $300</td>
                            <td>01-01-2014</td>
                            <td>Any Where</td>
                            <td>No</td>
                        </tr>
                        <tr>
                        	<td>HTMl Design</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                            <td>HTML, CSS</td>
                            <td>$200 - $300</td>
                            <td>01-01-2014</td>
                            <td>Any Where</td>
                            <td>No</td>
                        </tr>
                        <tr>
                        	<td>HTMl Design</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                            <td>HTML, CSS</td>
                            <td>$200 - $300</td>
                            <td>01-01-2014</td>
                            <td>Any Where</td>
                            <td>No</td>
                        </tr>
                        <tr>
                        	<td>HTMl Design</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                            <td>HTML, CSS</td>
                            <td>$200 - $300</td>
                            <td>01-01-2014</td>
                            <td>Any Where</td>
                            <td>No</td>
                        </tr>
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