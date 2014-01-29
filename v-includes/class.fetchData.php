<?php
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	//class for fetching data of ajax request
	class fetchData{
		public $manage_content;
		
		/*
		 method for constructing DAL class
		 Auth: Dipanjan
		*/

		function __construct()
		{	
			$this->manage_content = new ManageContent_DAL();
			return $this->manage_content;
		}
		
		/*
		 method for getting the job list of given ccategory
		 Auth: Dipanjan
		*/
		function getJobList($category)
		{
			//getting values from database
			$jobs = $this->manage_content->getValue_likely_descending("project_info","*","category",$category);
			//printing them in page
			if(!empty($jobs[0]))
			{
				foreach($jobs as $job)
				{
					//getting total proposal
					$rowcount = $this->manage_content->getRowValue("bid_info","project_id",$job['project_id']);
					echo '<div class="col-md-12 job_part">
							<h3 class="job_title"><a href="post_bid.php?id='.$job['project_id'].'"> '.$job['project_name'].'</a></h3>
							<p class="col-md-4 project_description_skills"><span class="project_description_topic">Price</span>: '.$job['price_range'].'</p>
							<p class="col-md-4"><span class="project_description_topic">Time Remaining</span>: 3days 22hour</p>
							<p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: '.$rowcount.'</p>
							<p>'.$job['project_description'].'</p>
							<p><span class="project_description_topic">Skills Required</span>: '.$job['skills'].'</p>
						</div>';
				}
			}
			else
			{
				echo '<h3 style="color:#ff0000; text-align:center;">No Project List Found</h3>';
			}	
		}
			
	}
	
	/* receiving data from UI layer Form */
	//making object of class fetchData 
	$fetchData = new fetchData();
	//applying switch case
	switch($GLOBALS['_POST']['refData']){
		//for category search in job list page
		case 'category':
		{
			//getting the job list
			$job_list = $fetchData->getJobList($GLOBALS['_POST']['categoryValue']);
			break;
		}
	}

?>