<?php
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	// business layer class starts here
	class BLL_manageData
	{
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
		 method for getting project list of a employer
		 Auth: Dipanjan
		*/
		
		function getProjectList($user_id)
		{
			//getting all project details from database
			$all_projects = $this->manage_content->getValueWhere_descending("project_info","*","user_id",$user_id);
			//printing them in table
			foreach($all_projects as $all_project)
			{
				//getting no of bids
				$bids_no = $this->manage_content->getRowValue("bid_info","project_id",$all_project['project_id']);
				//checking for uploading files
				if(!empty($all_project['files']))
				{
					$file = $all_project['files'];
				}
				else
				{
					$file = 'No Files';
				}
				//checking for job is awarded or not
				if(empty($all_project['award_id']))
				{
					$status = 'Not Yet';
				}
				else
				{
					$status = 'Job Awarded';
				}
				echo '<tr>
						<td class="project_list_title"><a href="project_status.php?id='.$all_project['project_id'].'">'.$all_project['project_name'].'</a></td>
						<td>'.substr($all_project['project_description'],0,150).'</td>
						<td>'.$all_project['skills'].'</td>
						<td>'.$all_project['price_range'].'</td>
						<td>'.$all_project['time_range'].'</td>
						<td>'.$all_project['date']." ".$all_project['time'].'</td>
						<td>'.$all_project['preferred_location'].'</td>
						<td>'.$bids_no.'</td>
						<td>'.$file.'</td>
						<td>'.$status.'</td>
						<td><a href="edit_project.php?id='.$all_project['project_id'].'"><button class="btn btn-success">EDIT</button></a></td>
					</tr>';
			}
		}
		
		/*
		 method for getting project list of a employer
		 Auth: Dipanjan
		*/
		
		function editProject($project_id)
		{
			//getting project details from database
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			//showing the values in form
			if(!empty($project_details[0]))
			{
				echo '<form action="v-includes/manageData.php" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Category</label>
							<div class="col-md-8">
								<input type="text" class="form-control" placeholder="Category" value="'.$project_details[0]['category'].'" readonly="readonly">
								<select class="form-control" id="postProject_category" name="category[]" multiple="multiple">';
							$this->getCategoryList();		
							echo '</select>
							</div>
						</div>
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Project Title</label>
							<div class="col-md-8">
								<input type="text" class="form-control" placeholder="Project Title" name="project_name" value="'.$project_details[0]['project_name'].'">
							</div>
						</div>
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Project Description</label>
							<div class="col-md-8">
								<textarea rows="6" class="form-control" placeholder="Project Description" name="project_description">'.$project_details[0]['project_description'].'</textarea>
							</div>
						</div>
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Skills Required</label>
							<div class="col-md-8">
								<input type="text" class="form-control" placeholder="Skills Required" value="'.$project_details[0]['skills'].'" readonly="readonly">
								<select class="form-control" name="skills[]" multiple="multiple">';
									$this->getSkillList();
							echo '</select>
							</div>
						</div>
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Price Range</label>
							<div class="col-md-8">
								<select class="form-control" name="price_range">
									<option value="Below $100"'; if($project_details[0]['price_range'] == 'Below $100'){echo 'selected="selected"'; }echo '>Below $100</option>
									<option value="$100 - $500"'; if($project_details[0]['price_range'] == '$100 - $500'){echo 'selected="selected"'; }echo '>$100 - $500</option>
									<option value="$500 - $1000"'; if($project_details[0]['price_range'] == '$500 - $1000'){echo 'selected="selected"'; }echo '>$500 - $1000</option>
									<option value="Above $1000"'; if($project_details[0]['price_range'] == 'Above $1000'){echo 'selected="selected"'; }echo '>Above $1000</option>
								</select>
							</div>
						</div>
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Time Range</label>
							<div class="col-md-8">
								<select class="form-control" name="time_range">
									<option value="Within 3 Days"'; if($project_details[0]['time_range'] == 'Within 3 Days'){echo 'selected="selected"'; }echo '>Within 3 Days</option>
									<option value="Within 1 week"'; if($project_details[0]['time_range'] == 'Within 1 week'){echo 'selected="selected"'; }echo '>Within 1 week</option>
									<option value="Within 2 week"'; if($project_details[0]['time_range'] == 'Within 2 week'){echo 'selected="selected"'; }echo '>Within 2 week</option>
									<option value="Within 1 month"'; if($project_details[0]['time_range'] == 'Within 1 month'){echo 'selected="selected"'; }echo '>Within 1 month</option>
									<option value="Within 2 month"'; if($project_details[0]['time_range'] == 'Within 2 month'){echo 'selected="selected"'; }echo '>Within 2 month</option>
									<option value="Above 2 month"'; if($project_details[0]['time_range'] == 'Above 2 month'){echo 'selected="selected"'; }echo '>Above 2 month</option>
								</select>
							</div>
						</div>
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Preffered Location</label>
							<div class="col-md-8">
								<input type="text" class="form-control" placeholder="Preffered Location" value="'.$project_details[0]['preferred_location'].'" readonly="readonly">
								<select class="form-control" name="preferred_location[]" multiple="multiple">';
									$this->getLocationList();
							echo '</select>
							</div>
						</div>
						<div class="form-group v-form_control">
							<label class="col-md-3 control-label login_form_label">Upload File</label>
							<div class="col-md-8">
								<input type="file" class="form-control" name="files">
							</div>
						</div>
						<div class="form-group v-form_control">
							<div class="col-md-offset-3 col-md-9">
								<input type="hidden" name="project_id" value="'.$project_details[0]['project_id'].'">
								<input type="submit" class="btn btn-primary login_form_submit" value="SUBMIT">
							</div>
						</div>
					</form>';
			}
			else
			{
				echo '<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Project Details Found</p>';
			}	
		}
		
		/*
		 method for getting project status with all bids
		 Auth: Dipanjan
		*/
		function getProjectStatus($project_id)
		{
			//getting project details from database
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			
			if($project_details[0])
			{
				//checking for preferred location
				if(empty($project_details[0]['preferred_location']))
				{
					$preferred_location = 'Any Where';
				}
				else
				{
					$preferred_location = $project_details[0]['preferred_location'];
				}
				//checking for file attachment
				if(!empty($project_details[0]['files']))
				{
					$files = '<a href="'.$project_details[0]['updated_filename'].'" target="_blank">'.$project_details[0]['files'].'</a>';
				}
				else
				{
					$files = 'No Files';
				}
				//getting total no of proposal from database
				$rowcount = $this->manage_content->getRowValue("bid_info","project_id",$project_id);
				//get all the bid details of this project
				$bid_details = $this->manage_content->getValue_where("bid_info","*","project_id",$project_id);
				//showing the values in form
				echo '<!-- project description starts here -->
						<div class="project_description">
							<h3 class="project_description_heading">'.$project_details[0]['project_name'].'</h3>
							<p class="project_description_text">'.$project_details[0]['project_description'].'</p>
							<p class="col-md-4 project_description_skills"><span class="project_description_topic">Skills Required</span>: '.$project_details[0]['skills'].'</p>
							<p class="col-md-4"><span class="project_description_topic">Price Range</span>: '.$project_details[0]['price_range'].'</p>
							<p class="col-md-4"><span class="project_description_topic">Time Range</span>: '.$project_details[0]['time_range'].'</p>
							<p class="col-md-4 project_description_skills"><span class="project_description_topic">Preffered Location</span>: '.$preferred_location.'</p>
							<p class="col-md-4"><span class="project_description_topic">Uploaded File</span>: '.$files.'</p>
							<div class="clearfix"></div>
						</div>
						<!-- project description ends here -->
						<div class="proposal_outline">
							<div class="col-md-12">
							<h4 class="proposal_heading pull-left">Proposal List</h4>
							<h4 class="pull-right no_proposal"><span class="project_description_topic">Total Proposal</span>: '.$rowcount.'</h4>
							</div>';
							
						if(!empty($bid_details[0]))
						{
							//showing all the bids in order
							foreach($bid_details as $bid_detail)
							{
								// calculating total unread message for this bid 
								$unreadMessage = $this->manage_content->getRowValueFourCondition("chat_info","project_id",$project_id,"bid_id",$bid_detail['bid_id'],"user_id",$bid_detail['user_id'],"message_status",'');
								if($unreadMessage != 0)
								{
									$message_counter = '('.$unreadMessage.')';
								}
								else
								{
									$message_counter = '';
								}
								//getting the user details who have bided on this project
								$user_details = $this->manage_content->getValue_where("user_info","*","user_id",$bid_detail['user_id']);
								//setting the default image
								if(empty($user_details[0]['profile_image']))
								{
									$profile_image = 'http://placehold.it/50x50/ffcdff';;
								}
								else
								{
									$profile_image = $user_details[0]['profile_image'];
								}
								//getting chat id
								$chat = $this->manage_content->getValue_twoCoditions("chat_info","*","project_id",$project_details[0]['project_id'],"bid_id",$bid_detail['bid_id']);
								
								echo '<div class="proposal_part col-md-12">
										<div class="col-md-1"><img src="'.$profile_image.'" /></div>
										<div class="col-md-9">
											<h4 class="proposal_bidder_name">'.$user_details[0]['f_name']." ".$user_details[0]['l_name'].'</h4>
											<p>'.$bid_detail['bid_description'].'</p>
											<p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
											<p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price">'.$bid_detail['price'].'</span></p>
											<p><a href="chat.php?p_id='.$project_details[0]['project_id'].'&b_id='.$bid_detail['bid_id'].'&u_id='.$project_details[0]['user_id'].'&c_id='.$chat[0]['chat_id'].'"><img src="img/message.png" class="message_icon"><span class="message_text">Conversation'.$message_counter.'</span></a></p>
										</div>
										<div class="col-md-2">';
										if(empty($project_details[0]['award_id']))
										{
											echo '<button class="btn btn-danger btn-lg award_button" onclick="getAwarded(\''.$project_details[0]['project_id'].'\',\''.$bid_detail['bid_id'].'\')">Award</button>';
										}
										else if(!empty($project_details[0]['award_id']) && $project_details[0]['award_id'] == $bid_detail['bid_id'])
										{
											echo '<button class="btn btn-danger btn-lg award_button">Awarded</button>';
										}
											
									echo '</div>
									</div>';
							}
						}
						else
						{
							echo '<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Proposals Yet</p>';
						}
						echo '<div class="clearfix"></div>
						</div>';
			}
			else
			{
				echo '<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Project Details Found</p>';
			}
		}
		
		/*
		 method for getting all job list
		 Auth: Dipanjan
		*/
		function getAllJobList()
		{
			//getting all job list
			$job_lists = $this->manage_content->getValue_descending("project_info","*");
			//showing it on page
			//initialize parameter
			$job_visible = 0;
			foreach($job_lists as $job_list)
			{
				//checking for job awarded or not
				if(empty($job_list['award_id']))
				{
					//getting total proposal
					$rowcount = $this->manage_content->getRowValue("bid_info","project_id",$job_list['project_id']);
					echo '<div class="col-md-12 job_part">
							<h3 class="job_title"><a href="post_bid.php?id='.$job_list['project_id'].'"> '.$job_list['project_name'].'</a></h3>
							<p class="col-md-4"><span class="project_description_topic">Price</span>: '.$job_list['price_range'].'</p>
						   
							<p class="col-md-4"><span class="project_description_topic">Total Proposal</span>: '.$rowcount.'</p>
							<p class="col-md-12">'.$job_list['project_description'].'</p>
							<p class="col-md-12"><span class="project_description_topic">Skills Required</span>: '.$job_list['skills'].'</p>
						</div>';
					$job_visible = $job_visible + 1;
				}	
			}
			//checking for no of job visible
			if($job_visible == 0)
			{
				echo '<h3 style="color:#ff0000; text-align:center;">No Project List Found</h3>';
			}
		}
		
		/*
		 method for getting project details in post bid page
		 Auth: Dipanjan
		*/
		function getProjectDetails($project_id)
		{
			//getting project details
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			//checking for empty result
			if(!empty($project_details[0]))
			{
				//checking for preferred location
				if(empty($project_details[0]['preferred_location']))
				{
					$preferred_location = 'Any Where';
				}
				else
				{
					$preferred_location = $project_details[0]['preferred_location'];
				}
				//checking for file attachment
				if(!empty($project_details[0]['files']))
				{
					$files = '<a href="'.$project_details[0]['updated_filename'].'" target="_blank">'.$project_details[0]['files'].'</a>';
				}
				else
				{
					$files = 'No Files';
				}
				//getting total no of proposal from database
				$rowcount = $this->manage_content->getRowValue("bid_info","project_id",$project_id);
				//get all the bid details of this project
				$bid_details = $this->manage_content->getValue_where("bid_info","*","project_id",$project_id);
				//showing the result in page
				echo '<div class="col-md-7">
						<!-- project description starts here -->
						<div class="project_description col-md-12">
							<h3 class="project_description_heading">'.$project_details[0]['project_name'].'</h3>
							<p class="project_description_text">'.$project_details[0]['project_description'].'</p>
							<p><span class="project_description_topic">Skills Required</span>: '.$project_details[0]['skills'].'</p>
							<p><span class="project_description_topic">Price Range</span>: '.$project_details[0]['price_range'].'</p>
							<p><span class="project_description_topic">Preffered Location</span>: '.$preferred_location.'</p>
							<p><span class="project_description_topic">Uploaded File</span>: '.$files.'</p>
							<div class="clearfix"></div>
						</div>
						<!-- project description ends here -->
						<div class="proposal_outline col-md-12">
							<div class="col-md-12">
								<h4 class="proposal_heading pull-left">Proposal List</h4>
								<h4 class="pull-right no_proposal"><span class="project_description_topic">Total Proposal</span>: '.$rowcount.'</h4>
							</div>';
						
						//checking for empty bid status
						if(!empty($bid_details[0]))
						{
							foreach($bid_details as $bid_detail)
							{
								//getting the user details who have bided on this project
								$user_details = $this->manage_content->getValue_where("user_info","*","user_id",$bid_detail['user_id']);
								//setting the default image
								if(empty($user_details[0]['profile_image']))
								{
									$profile_image = 'http://placehold.it/50x50/ffcdff';
								}
								else
								{
									$profile_image = $user_details[0]['profile_image'];
								}
								echo '<div class="bid_proposal_part col-md-12">
										<div class="col-md-2"><img src="'.$profile_image.'" /></div>
										<div class="col-md-10">
											<h4 class="proposal_bidder_name">'.$user_details[0]['f_name']." ".$user_details[0]['l_name'].'</h4>
											<p>'.substr($bid_detail['bid_description'],0,150).'</p>
											<p><span class="project_description_topic">Skills</span>: HTML, CSS, PHP, .NET</p>
											<p><span class="project_description_topic">Proposal</span>:<span class="proposal_bidder_price">'.$bid_detail['price'].'</span></p>
										</div>
										
									</div>';
							}
							
						}
						else
						{
							echo '<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Proposals Yet</p>';
						}
					echo '<div class="clearfix"></div>
								</div>
							</div>
							<!-- bidding part starts here -->';
			}
			else
			{
				echo '<div class="col-lg-7">
							<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Project Details Found</p>
						</div>';
			}
		}
		
		/*
		 method for getting all job list
		 Auth: Dipanjan
		*/
		function getJobList($user_id)
		{
			//getting all bid of this user
			$bids = $this->manage_content->getValueWhere_descending("bid_info","*","user_id",$user_id);
			if(!empty($bids[0]))
			{
				foreach($bids as $bid)
				{
					//getting project details of that bid
					$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$bid['project_id']);
					//getting user details
					$user_details = $this->manage_content->getValue_where("user_info","*","user_id",$project_details[0]['user_id']);
					//getting total no of proposal
					$total_proposal = $this->manage_content->getRowValue("bid_info","project_id",$bid['project_id']);
					//checking for chat id
					$chat_id = $this->manage_content->getValue_twoCoditions("chat_info","*","project_id",$bid['project_id'],"bid_id",$bid['bid_id']);
					
					// calculating total unread message for this bid 
					$unreadMessage = $this->manage_content->getRowValueFourCondition("chat_info","project_id",$bid['project_id'],"bid_id",$bid['bid_id'],"user_id",$project_details[0]['user_id'],"message_status",'');
					if($unreadMessage != 0)
					{
						$message_counter = '('.$unreadMessage.')';
					}
					else
					{
						$message_counter = '';
					}
					
					if(!empty($chat_id[0]['chat_id']))
					{
						$chat_icon = '<a href="chat.php?p_id='.$bid['project_id'].'&b_id='.$bid['bid_id'].'&u_id='.$user_id.'&c_id='.$chat_id[0]['chat_id'].'"><img src="img/message.png" class="message_icon"><span class="message_text">Conversation'.$message_counter.'</span></a>';
					}
					else
					{
						$chat_icon = '';
					}
					//setting the default image
					if(empty($user_details[0]['profile_image']))
					{
						$profile_image = 'http://placehold.it/50x50/ffcdff';
					}
					else
					{
						$profile_image = $user_details[0]['profile_image'];
					}
					//checking for job open, closed or awarded
					if(empty($project_details[0]['award_id']))
					{
						$status = 'Job Is Open';
					}
					else if(!empty($project_details[0]['award_id']) && $project_details[0]['award_id'] == $bid['bid_id'])
					{
						$status = 'Job Is Awarded To You';
					}
					else
					{
						$status = 'Job Is Closed';
					}
					//showing all the details
					echo '<div class="col-md-12 find_job_part">
							<div class="col-md-9">
								<h4 class="job_title"><a href="post_bid.php?id='.$bid['project_id'].'">'.$project_details[0]['project_name'].'</a></h4>
								<p>'.$project_details[0]['project_description'].'</p>
								<p class="col-md-4 project_description_skills"><span class="project_description_topic">Total Proposal</span>: '.$total_proposal.'</p>
								<p class="col-md-4"><span class="project_description_topic">Price</span>: '.$bid['price'].'</p>
								<p>'.$status.'</p>
								<p class="col-md-12 project_description_skills"><span class="project_description_topic">You have submitted the proposal on '.$bid['date'].'</span></p>
								<p>'.$chat_icon.'</p>
							</div>
						</div>';
				}
			}
			else
			{
				echo '<p style="font-size:1.5em; color:#ff0000; text-align:center;">No Job Details Found</p>';
			}
		}
		
		/*
		 method for getting user bid id
		 Auth: Dipanjan
		*/
		function getBidId($project_id,$user_id)
		{
			//getting bid id of this project_id and this user id
			$bid_id = $this->manage_content->getValue_twoCoditions("bid_info","*","project_id",$project_id,"user_id",$user_id);
			if(!empty($bid_id[0]))
			{
				return $bid_id[0]['bid_id'];
			}
			else
			{
				return null;
			}
		}
		
		/*
		 method for getting bid details for updating it
		 Auth: Dipanjan
		*/
		function getBidDescription($bid_id)
		{
			//getting bidding details
			$bid_details = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			//showing the details in page
			echo '<div class="col-lg-5">
                	<div class="bid_outline">
                    	<h4 class="bid_heading">Describe Your Proposal</h4>
                        <form action="v-includes/manageData.php" method="post" enctype="multipart/form-data">
                        	<textarea rows="20" class="bid_textarea col-md-12" name="description">'.$bid_details[0]['bid_description'].'</textarea>
                            <p class="col-md-12 project_description_skills">Cost</p>
                            <input type="text" class="form-control bid_text col-md-12" placeholder="Cost Of this Project" name="price" value="'.$bid_details[0]['price'].'">
                            <p class="col-md-12 project_description_skills">Time Required</p>
                            <select class="form-control bid_select col-md-12" name="time_range">
                            	<option value="Within 3 Days"'; if($bid_details[0]['time_range'] == 'Within 3 Days'){ echo 'selected="selected"'; } echo '>Within 3 Days</option>
								<option value="Within 1 week"'; if($bid_details[0]['time_range'] == 'Within 1 week'){ echo 'selected="selected"'; } echo '>Within 1 week</option>
								<option value="Within 2 week"'; if($bid_details[0]['time_range'] == 'Within 2 week'){ echo 'selected="selected"'; } echo '>Within 2 week</option>
								<option value="Within 1 month"'; if($bid_details[0]['time_range'] == 'Within 1 month'){ echo 'selected="selected"'; } echo '>Within 1 month</option>
								<option value="Within 2 month"'; if($bid_details[0]['time_range'] == 'Within 2 month'){ echo 'selected="selected"'; } echo '>Within 2 month</option>
								<option value="Above 2 month"'; if($bid_details[0]['time_range'] == 'Above 2 month'){ echo 'selected="selected"'; } echo '>Above 2 month</option>
                            </select>
                            <p class="col-md-12 project_description_skills">Attach File</p>
                            <input type="file" name="files" class="col-md-12">
							<input type="hidden" name="bid_id" value="'.$bid_id.'">
							<input type="hidden" name="project_id" value="'.$bid_details[0]['project_id'].'">
							<input type="hidden" name="action" value="update">
                            <input type="submit" class="btn btn-success btn-lg pull-right" value="UPDATE"/>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>';
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
		 method for getting chat_id from database
		 Auth: Dipanjan
		*/
		function getChatId($project_id,$bid_id)
		{
			$chat_id = $this->manage_content->getValue_twoCoditions("chat_info","*","project_id",$project_id,"bid_id",$bid_id);
			//checking for empty result
			if(!empty($chat_id[0]['chat_id']))
			{
				return $chat_id[0]['chat_id'];
			}
			else
			{
				return uniqid('CHAT');
			}
		}
		
		/*
		 method for updating message status
		 Auth: Dipanjan
		*/
		function updateMessageStatus($chat_id,$user_id)
		{
			//get all values
			$all_chat = $this->manage_content->getValue_where("chat_info","*","chat_id",$chat_id);
			//checking for not empty values
			if(!empty($all_chat[0]))
			{
				foreach($all_chat as $chat)
				{
					if($chat['user_id'] != $user_id && empty($chat['message_status']))
					{
						//update the message status value
						$update = $this->manage_content->updateValueWhere("chat_info","message_status",1,"id",$chat['id']);
					}
				}
			}
		}
		
		/*
		 method for getting valid project id valid or not
		 Auth: Dipanjan
		*/
		function validProjectId($project_id)
		{
			//checking for valid project id
			$valid_id = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			if(!empty($valid_id) && empty($valid_id[0]['award_id']))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		
		/*
		 method for getting category list from database
		 Auth: Dipanjan
		*/
		function getCategoryList()
		{
			//getting all values of category
			$categories = $this->manage_content->getValue("category_info","*");
			//showing it on page
			if(!empty($categories))
			{
				foreach($categories as $category)
				{
					echo '<option value="'.$category['category'].'">'.$category['category'].'</option>';
				}
			}
		}
		
		/*
		 method for getting skills list from database
		 Auth: Dipanjan
		*/
		function getSkillList()
		{
			//getting all values of category
			$skills = $this->manage_content->getValue("skills_info","*");
			//showing it on page
			if(!empty($skills))
			{
				foreach($skills as $skill)
				{
					echo '<option value="'.$skill['skills'].'">'.$skill['skills'].'</option>';
				}
			}
		}
		
		/*
		 method for getting category list from database
		 Auth: Dipanjan
		*/
		function getLocationList()
		{
			//getting all values of category
			$locations = $this->manage_content->getValue("location_info","*");
			//showing it on page
			if(!empty($locations))
			{
				foreach($locations as $location)
				{
					echo '<option value="'.$location['location'].'">'.$location['location'].'</option>';
				}
			}
		}
		
		/*
		 method for getting user name
		 Auth: Dipanjan
		*/
		function getUserName($user_id)
		{
			$user_details = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			return $user_details[0]['f_name']." ".$user_details[0]['l_name'];
		}
		
		/*
		 method for getting contractor personal information
		 Auth: Dipanjan
		*/
		function getPersonalInfo($user_id)
		{
			//getting personal info
			$user_details = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			//showing them in form
			echo '<div class="form-group v-form_control">
					<label class="col-md-3 control-label login_form_label">Skills</label>
					<div class="col-md-8">
						<input type="text" class="form-control" placeholder="Skills" name="skills" value="'.$user_details[0]['skills'].'">
					</div>
				</div>
				<div class="form-group v-form_control">
					<label class="col-md-3 control-label login_form_label">Upload Resume</label>
					<div class="col-md-8">
						<input type="file" name="resume" class="form-control" />
					</div>
				</div>
				 <div class="form-group v-form_control">
					<div class="col-md-offset-3 col-md-8">
						<input type="submit" class="btn btn-primary login_form_submit" value="UPDATE">
					</div>
				</div>';
		}
		
		function getUserInfo($user_id)
		{
			//getting personal info
			$user_details = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			//showing them in form
			echo '<div class="form-group v-form_control">
					<label class="col-md-3 control-label login_form_label">My Skills:</label>
					<div class="col-md-8">
						<h3 class="personal_skill">'.$user_details[0]['skills'].'</h3>
						
					</div>
				</div>
				<div class="form-group v-form_control">
					<label class="col-md-3 control-label login_form_label">My Resume</label>
					<div class="col-md-8">
						<a href="'.$user_details[0]['resume'].'" class="personal_resume" ><h3>'.$user_details[0]['resume'].'</h3></a>
					</div>
				</div>
				 <div class="form-group v-form_control">
					<div class="col-md-offset-3 col-md-8">
						<a href="personal_information.php"><input type="button" class="btn btn-primary login_form_submit" value="UPDATE"></a>
					</div>
				</div>';
		}
		
	}

	


	
?>