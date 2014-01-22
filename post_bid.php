<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor')
	{
		header("Location: index.php");
	}
	$pageTitle = 'POST BID';
	include 'v-templates/header.php';
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
            <?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
                <div class="col-md-7">
                	<!-- project description starts here -->
                    <div class="project_description col-md-12">
                        <h3 class="project_description_heading">Project Title</h3>
                        <p class="project_description_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p><span class="project_description_topic">Skills Required</span>: HTML, CSS</p>
                        <p><span class="project_description_topic">Price Range</span>: $200 - $300</p>
                        <p><span class="project_description_topic">Time Remaining</span>: 14days 22hour</p>
                        <p><span class="project_description_topic">Preffered Location</span>: Any Where</p>
                        <p><span class="project_description_topic">Uploaded File</span>: No Files</p>
                        <div class="clearfix"></div>
                    </div>
                    <!-- project description ends here -->
                    <div class="proposal_outline col-md-12">
                        <div class="col-md-12">
                            <h4 class="proposal_heading pull-left">Proposal List</h4>
                            <h4 class="pull-right no_proposal"><span class="project_description_topic">Total Proposal</span>: 5</h4>
                        </div>
                        <div class="bid_proposal_part col-md-12">
                            <div class="col-md-2"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                            <div class="col-md-10">
                                <h4 class="proposal_bidder_name">Company Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                                <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                            </div>
                        </div>
                        <div class="bid_proposal_part col-md-12">
                            <div class="col-md-2"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                            <div class="col-md-10">
                                <h4 class="proposal_bidder_name">Company Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                                <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                            </div>
                        </div>
                        <div class="bid_proposal_part col-md-12">
                            <div class="col-md-2"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                            <div class="col-md-10">
                                <h4 class="proposal_bidder_name">Company Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                                <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                            </div>
                        </div>
                        <div class="bid_proposal_part col-md-12">
                            <div class="col-md-2"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
                            <div class="col-md-10">
                                <h4 class="proposal_bidder_name">Company Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
                                <p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price"> $500.00</span></p>
                            </div>
                        </div>
                        <div class="bid_proposal_part col-md-12">
                            <div class="col-md-2"><img src="img/thumb64-80-1413559917-vasu_naman.jpg" /></div>
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
                <!-- bidding part starts here -->
                <div class="col-lg-5">
                	<div class="bid_outline">
                    	<h4 class="bid_heading">Describe Your Proposal</h4>
                        <form action="#" method="post">
                        	<textarea rows="20" class="bid_textarea col-md-12"></textarea>
                            <p class="col-md-12 project_description_skills">Cost</p>
                            <input type="text" class="form-control bid_text" placeholder="Cost Of this Project">
                            <p class="col-md-12 project_description_skills">Time Required</p>
                            <input type="text" class="form-control bid_text" placeholder="Time Required">
                            <input type="submit" class="btn btn-success btn-lg pull-right" value="SUBMIT"/>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- bidding part ends here -->
            </div>
            <div class="clearfix"></div>
       </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>