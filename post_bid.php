<?php
	session_start();
	//checking for session variable
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor')
	{
		header("Location: index.php");
	}
	$pageTitle = 'POST BID';
	include 'v-templates/header.php';
	$project_id = $GLOBALS['_GET']['id'];
?>
<!-- body starts here -->
<div class="container body_page_outline">
    <div class="row">
    	<div class="body_page">
            <?php include 'v-templates/navbar.php'; ?>
            <div class="col-md-12 login_box_outline">
                <?php
					if(isset($project_id))
					{
						$project_details = $manageContent->getProjectDetails($project_id);
						
					}
					else
					{
						echo '<div class="col-lg-7">
								<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Project Details Found</p>
							</div>';
					}
				?>
                <?php 
					//checking for valid project id number
					$result = $manageContent->validProjectId($project_id);
					if($result == 1)
					{ 
						$bid_id = $manageContent->getBidId($project_id,$_SESSION['user_id']);
						if(empty($bid_id))
						{ ?>						
                    
                <div class="col-lg-5">
                	<div class="bid_outline">
                    	<h4 class="bid_heading">Describe Your Proposal</h4>
                        <form action="v-includes/manageData.php" method="post" enctype="multipart/form-data">
                        	<textarea rows="20" class="bid_textarea col-md-12" name="description"></textarea>
                            <p class="col-md-12 project_description_skills">Cost</p>
                            <input type="text" class="form-control bid_text col-md-12" placeholder="Cost Of this Project" name="price">
                            <p class="col-md-12 project_description_skills">Time Required</p>
                            <select class="form-control bid_select col-md-12" name="time_range">
                            	<option value="Within 3 Days">Within 3 Days</option>
                                <option value="Within 1 week">Within 1 week</option>
                                <option value="Within 2 week">Within 2 week</option>
                                <option value="Within 1 month">Within 1 month</option>
                                <option value="Within 2 month">Within 2 month</option>
                                <option value="Above 2 month">Above 2 month</option>
                            </select>
                            <p class="col-md-12 project_description_skills">Attach File</p>
                            <input type="file" name="files" class="col-md-12">
                            <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" />
                            <input type="hidden" name="action" value="insert" />
                            <input type="submit" class="btn btn-success btn-lg pull-right" value="SUBMIT"/>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <!-- bidding part ends here -->
				<?php } else { $manageContent->getBidDescription($bid_id); } } ?>
            </div>
            <div class="clearfix"></div>
       </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>