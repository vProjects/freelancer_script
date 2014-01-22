<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor')
	{
		header("Location: index.php");
	}
	$pageTitle = 'JOB LIST';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
            <?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
                <h3 class="find_job_heading">My Jobs</h3>
                <div class="find_job_outline">
                	<div class="col-md-12 find_job_part">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-9">
                        	<h4 class="job_title">Project Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="col-md-4 project_description_skills"><span class="project_description_topic">Total Proposal</span>: 3</p>
                            <p class="col-md-4"><span class="project_description_topic">Job Is Open</span></p>
                            <p><a href="#">Client Info</a></p>
                            <p class="col-md-12 project_description_skills"><span class="project_description_topic">You have submitted the proposal on 15th jan 2014.</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 find_job_part">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-9">
                        	<h4 class="job_title">Project Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="col-md-4 project_description_skills"><span class="project_description_topic">Total Proposal</span>: 3</p>
                            <p class="col-md-4"><span class="project_description_topic">Job Is Open</span></p>
                            <p><a href="#">Client Info</a></p>
                            <p class="col-md-12 project_description_skills"><span class="project_description_topic">You have submitted the proposal on 15th jan 2014.</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 find_job_part">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-9">
                        	<h4 class="job_title">Project Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="col-md-4 project_description_skills"><span class="project_description_topic">Total Proposal</span>: 3</p>
                            <p class="col-md-4"><span class="project_description_topic">Job Is Open</span></p>
                            <p><a href="#">Client Info</a></p>
                            <p class="col-md-12 project_description_skills"><span class="project_description_topic">You have submitted the proposal on 15th jan 2014.</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 find_job_part">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-9">
                        	<h4 class="job_title">Project Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="col-md-4 project_description_skills"><span class="project_description_topic">Total Proposal</span>: 3</p>
                            <p class="col-md-4"><span class="project_description_topic">Job Is Open</span></p>
                            <p><a href="#">Client Info</a></p>
                            <p class="col-md-12 project_description_skills"><span class="project_description_topic">You have submitted the proposal on 15th jan 2014.</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 find_job_part">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-9">
                        	<h4 class="job_title">Project Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="col-md-4 project_description_skills"><span class="project_description_topic">Total Proposal</span>: 3</p>
                            <p class="col-md-4"><span class="project_description_topic">Job Is Open</span></p>
                            <p><a href="#">Client Info</a></p>
                            <p class="col-md-12 project_description_skills"><span class="project_description_topic">You have submitted the proposal on 15th jan 2014.</span></p>
                        </div>
                    </div>
                    <div class="col-md-12 find_job_part">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-9">
                        	<h4 class="job_title">Project Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="col-md-4 project_description_skills"><span class="project_description_topic">Total Proposal</span>: 3</p>
                            <p class="col-md-4"><span class="project_description_topic">Job Is Open</span></p>
                            <p><a href="#">Client Info</a></p>
                            <p class="col-md-12 project_description_skills"><span class="project_description_topic">You have submitted the proposal on 15th jan 2014.</span></p>
                        </div>
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