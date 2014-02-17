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
				//initialize parameter
				$job_visible = 0;
				foreach($jobs as $job)
				{
					//checking for job is awarded or not
					if(empty($job['award_id']))
					{
						//getting total proposal
						$rowcount = $this->manage_content->getRowValue("bid_info","project_id",$job['project_id']);
						echo '<div class="col-md-12 job_part">
								<h3 class="job_title"><a href="post_bid.php?id='.$job['project_id'].'"> '.$job['project_name'].'</a></h3>
								<p class="col-md-4"><span class="project_description_topic">Price</span>: '.$job['price_range'].'</p>
								
								<p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: '.$rowcount.'</p>
								<p class="col-md-12">'.$job['project_description'].'</p>
								<p class="col-md-12"><span class="project_description_topic">Skills Required</span>: '.$job['skills'].'</p>
							</div>';
						//increasing no of job visible
						$job_visible = $job_visible + 1;
					}	
				}
				//checking for no of job visible
				if($job_visible == 0)
				{
					echo '<h3 style="color:#ff0000; text-align:center;">No Project List Found</h3>';
				}
			}
			else
			{
				echo '<h3 style="color:#ff0000; text-align:center;">No Project List Found</h3>';
			}	
		}
		
		/*
		 method for awarding job to the given bid id
		 Auth: Dipanjan
		*/
		function awardJob($project_id,$award_id)
		{
			$update = $this->manage_content->updateValueWhere("project_info","award_id",$award_id,"project_id",$project_id);
			
		}
		
		/*
		 method for inserting chat message
		 Auth: Dipanjan
		*/
		function insertingChatMessage($chat_id,$project_id,$user_id,$bid_id,$message)
		{
			//getting current date and time
			$curdate = $this->getCurrentDate();
			$curtime = $this->getCurrentTime();
			//column name
			$column_name = array('chat_id','project_id','user_id','bid_id','message','date','time');
			//column values
			$column_value = array($chat_id,$project_id,$user_id,$bid_id,$message,$curdate,$curtime);
			//insertion of message
			$insert = $this->manage_content->insertValue("chat_info",$column_name,$column_value);
			//showing the message history
			if($insert == 1)
			{
				$chat = $this->getChatDetails($chat_id);
			}
		}
		
		/*
		 method for getting chat details list
		 Auth: Dipanjan
		*/
		function getChatDetails($chat_id)
		{
			//get chat details
			$chat_details = $this->manage_content->getValueWhere_descending("chat_info","*","chat_id",$chat_id);
			//checking for empty value
			if(!empty($chat_details[0]))
			{
				foreach($chat_details as $chat_detail)
				{
					//getting user profile image
					$user_info = $this->manage_content->getValue_where("user_info","*","user_id",$chat_detail['user_id']);
					if(!empty($user_info[0]['profile_image']))
					{
						$profile_image = $user_info[0]['profile_image'];
					}
					else
					{
						$profile_image = 'http://placehold.it/50x50/ffcdff';
					}
					//checking for employer or contractor user id
					if(substr($chat_detail['user_id'],0,3) == 'EMP')
					{
						echo '<div class="col-md-12 message_box">
								<textarea class="alert alert-info col-md-10 chat-thread">'.$chat_detail['message'].'</textarea> 
								<img src="'.$profile_image.'" alt="userImage" class="img-circle col-md-2 chat-image">
							</div>';
					}
					else if(substr($chat_detail['user_id'],0,3) == 'CON')
					{
						echo '<div class="col-md-12 message_box">
								<img src="'.$profile_image.'" alt="userImage" class="img-circle col-md-2 chat-image">
								 <textarea class="alert alert-success col-md-10 chat-thread">'.$chat_detail['message'].'</textarea> 
							</div>';
					}
				}
			}
		}
		
		/*
		 method for getting current date
		 Auth: Dipanjan
		*/
		function getCurrentDate()
		{
			$date = date('y-m-d');
			return $date;
		}
		
		/*
		 method for getting current time
		 Auth: Dipanjan
		*/
		function getCurrentTime()
		{
			$time = date('h:i:s a');
			return $time;
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
		//for awarding job
		case 'award':
		{
			//awarding job to given bid id
			$award = $fetchData->awardJob($GLOBALS['_POST']['project_id'],$GLOBALS['_POST']['award_id']);
			break;
		}
		//for insertion of chat message
		case 'chatMessage':
		{
			//inserting the message to database
			$chatMessage = $fetchData->insertingChatMessage($GLOBALS['_POST']['chat_id'],$GLOBALS['_POST']['project_id'],$GLOBALS['_POST']['user_id'],$GLOBALS['_POST']['bid_id'],$GLOBALS['_POST']['message']);
			break;
		}
	}

?>