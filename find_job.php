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
      						<select class="form-control">
                            	<option>All Categories</option>
                                <option>IT & Programming</option>
                                <option>Design & Multimedia</option>
                            </select>
    					</div>
                    </div>
                </form>
                <div class="job_list_outline">
                	<div class="col-md-12 job_part">
                    	<h3 class="job_title">Project Title</h3>
                        <p class="col-md-4 project_description_skills"><span class="project_description_topic">Price</span>: $200 - $300</p>
                        <p class="col-md-4"><span class="project_description_topic">Time Remaining</span>: 3days 22hour</p>
                        <p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: 3</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span class="project_description_topic">Skills Required</span>: HTML, CSS, PHP, .NET</p>
                    </div>
                    <div class="col-md-12 job_part">
                    	<h3 class="job_title">Project Title</h3>
                        <p class="col-md-4 project_description_skills"><span class="project_description_topic">Price</span>: $200 - $300</p>
                        <p class="col-md-4"><span class="project_description_topic">Time Remaining</span>: 3days 22hour</p>
                        <p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: 3</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span class="project_description_topic">Skills Required</span>: HTML, CSS, PHP, .NET</p>
                    </div>
                    <div class="col-md-12 job_part">
                    	<h3 class="job_title">Project Title</h3>
                        <p class="col-md-4 project_description_skills"><span class="project_description_topic">Price</span>: $200 - $300</p>
                        <p class="col-md-4"><span class="project_description_topic">Time Remaining</span>: 3days 22hour</p>
                        <p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: 3</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span class="project_description_topic">Skills Required</span>: HTML, CSS, PHP, .NET</p>
                    </div>
                    <div class="col-md-12 job_part">
                    	<h3 class="job_title">Project Title</h3>
                        <p class="col-md-4 project_description_skills"><span class="project_description_topic">Price</span>: $200 - $300</p>
                        <p class="col-md-4"><span class="project_description_topic">Time Remaining</span>: 3days 22hour</p>
                        <p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: 3</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span class="project_description_topic">Skills Required</span>: HTML, CSS, PHP, .NET</p>
                    </div>
                    <div class="col-md-12 job_part">
                    	<h3 class="job_title">Project Title</h3>
                        <p class="col-md-4 project_description_skills"><span class="project_description_topic">Price</span>: $200 - $300</p>
                        <p class="col-md-4"><span class="project_description_topic">Time Remaining</span>: 3days 22hour</p>
                        <p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: 3</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span class="project_description_topic">Skills Required</span>: HTML, CSS, PHP, .NET</p>
                    </div>
                    <div class="col-md-12 job_part">
                    	<h3 class="job_title">Project Title</h3>
                        <p class="col-md-4 project_description_skills"><span class="project_description_topic">Price</span>: $200 - $300</p>
                        <p class="col-md-4"><span class="project_description_topic">Time Remaining</span>: 3days 22hour</p>
                        <p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: 3</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span class="project_description_topic">Skills Required</span>: HTML, CSS, PHP, .NET</p>
                    </div>
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