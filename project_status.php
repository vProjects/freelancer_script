<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'employer')
	{
		header("Location: index.php");
	}
	$pageTitle = 'PROJECT STATUS';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
        	<?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
            	<!-- project description starts here -->
                <div class="project_description">
                	<h3 class="project_description_heading">Project Title</h3>
                    <p class="project_description_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p class="col-md-4 project_description_skills"><span class="project_description_topic">Skills Required</span>: HTML, CSS</p>
                    <p class="col-md-4"><span class="project_description_topic">Price Range</span>: $200 - $300</p>
                    <p class="col-md-4"><span class="project_description_topic">Preffered Location</span>: Any Where</p>
                    <p><span class="project_description_topic">Uploaded File</span>: No Files</p>
                    <div class="clearfix"></div>
                </div>
                <!-- project description ends here -->
                <div class="proposal_outline">
                	<div class="col-md-12">
                	<h4 class="proposal_heading pull-left">Proposal List</h4>
                    <h4 class="pull-right no_proposal"><span class="project_description_topic">Total Proposal</span>: 5</h4>
                    </div>
                    <div class="proposal_part col-md-12">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-10">
                        	<h4 class="proposal_bidder_name">Company Name</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                            <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                        </div>
                    </div>
                    <div class="proposal_part col-md-12">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-10">
                        	<h4 class="proposal_bidder_name">Company Name</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                            <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                        </div>
                    </div>
                    <div class="proposal_part col-md-12">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-10">
                        	<h4 class="proposal_bidder_name">Company Name</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                            <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                        </div>
                    </div>
                    <div class="proposal_part col-md-12">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-10">
                        	<h4 class="proposal_bidder_name">Company Name</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                            <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                        </div>
                    </div>
                    <div class="proposal_part col-md-12">
                    	<div class="col-md-1"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                        <div class="col-md-10">
                        	<h4 class="proposal_bidder_name">Company Name</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                            <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
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