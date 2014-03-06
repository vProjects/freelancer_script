<?php
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	//include the Utility Class to get the server informations
	include 'class.utility.php';
	
	//include the File Upload class to use file uploader functionality
	include 'class.upload_file.php';
	
	//class for receiving form data
	class receiveData{
		public $manage_content;
		public $manage_utility;
		public $manage_fileUploader;
		
		/*
		 method for constructing DAL class
		 Auth: Dipanjan
		*/

		function __construct()
		{	
			$this->manage_content = new ManageContent_DAL();
			$this->manage_utility = new utility();
			$this->manage_fileUploader = new FileUpload();
			return array($this->manage_content,$this->manage_utility,$this->manage_fileUploader);
		}
		
		/*
		 method for inserting values of signup page
		 Auth: Dipanjan
		*/
		function insertUserDetails($userData,$userImage)
		{
			//checking for unique email id
			$all_email = $this->manage_content->getValue_where("user_info","*","email_id",$userData['email']);
			if(empty($all_email[0]))
			{
				//making email id as username
				$username = $userData['email'];
				//creating user id for contractor or employer
				if($userData['category'] == 'employer')
				{
					$user_id = uniqid('EMP');
				}
				elseif($userData['category'] == 'contractor')
				{
					$user_id = uniqid('CON');
				}
				//setting current date and time
				$curdate = $this->getCurrentDate();
				$curtime = $this->getCurrentTime();
				//get ip address
				$ip_address = $this->manage_utility->getIpAddress();
				//get browser name
				$browser = $this->manage_utility->getBrowser();
				//storing browser name and version
				$browser_name = $browser['name']." ".$browser['version'];
				//uploading profile image in UI img folder
				if(!empty($userImage['photo']['name']))
				{
					//move the uploaded file to the UI Layer img folder of main image
					$result_upload = $this->manage_fileUploader->upload_file($user_id,$userImage['photo'],'../img/');
					//photo_name variable saves the image location
					$photo_name = "img/".$result_upload;
				}
				else
				{
					$photo_name = "";	
				}
				//encript the password
				$password = md5($userData['password']);
				//creating the column name array
				$column_name = array("user_id","f_name","l_name","email_id","gender","contact_no","username","password","address","joining_date","joining_time","joining_ip","browser_name","profile_image","category");
				//creating table value
				$values = array($user_id,$userData['f_name'],$userData['l_name'],$userData['email'],$userData['gender'],$userData['contact_no'],$username,$password,$userData['address'],$curdate,$curtime,$ip_address,$browser_name,$photo_name,$userData['category']);
				
				//inserting user values to database user_info table
				$insert = $this->manage_content->insertValue("user_info",$column_name,$values);
				//return $insert;
				if($insert == 1)
				{
					return array($insert,$user_id,$userData['category']);
				}
				else
				{
					return array('Registration Unsuccessfull!!');
				}
			}
			else
			{
				return array('Email Id Exists!!');
			}
		}
		
		/*
		 method for checking login username and password
		 Auth: Dipanjan
		*/
		function checkingLoginValues($email_id,$password,$category,$login_time)
		{
			//checking for existance of email id
			$login_details = $this->manage_content->getValue_where("user_info","*","email_id",$email_id);
			if(!empty($login_details[0]))
			{
				//checking for right category
				if($login_details[0]['category'] == $category)
				{
					//checking for right password
					if($login_details[0]['password'] == md5($password))
					{
						//setting cookie expiry time
						if($login_time == 'on')
						{
							$expiry_time = time() + (2*7*24*3600);
						}
						else
						{
							$expiry_time = time() + (24*3600);
						}
						//setting the cookie
						$cookie_name = 'user_login';
						$cookie_value = $login_details[0]['user_id'].":".$login_details[0]['category'];
						$set_cookie = $this->createCookie($cookie_name,$cookie_value,$expiry_time);
						//inserting the values of login to the database
						$ip_address = $this->manage_utility->getIpAddress();
						$column_name = array("user_id","ip_address","cookie_value");
						$column_value = array($login_details[0]['user_id'],$ip_address,$cookie_value);
						//call insert function
						$insert = $this->manage_content->insertValue("login_info",$column_name,$column_value); 
						//successfull login details
						return array(1,'Login Successfull!!',$login_details[0]['category'],$login_details[0]['user_id']);
					}
					else
					{
						return array(0,'Incorrect Password!!');
					}
				}
				else
				{
					return array(0,'Invalid Category!!');
				}
			}
			else
			{
				return array(0,'Email Id Not Exists!!');
			}
		}
		
		
		/*
		 method for project posting
		 Auth: Dipanjan
		*/
		function postProject($userData,$userImage,$user_id){
			//creating project id
			$project_id = uniqid('PROJECT');
			//creating posting date and time
			$curdate = $this->getCurrentDate();
			$curtime = $this->getCurrentTime();
			//uploading files in UI layer Files folder
				if(!empty($userImage['files']['name']))
				{
					//creating unique alpha numeric digit for filename desired
					$filename_desired = $user_id.$curdate.uniqid();
					//move the uploaded file to the UI Layer img folder of main image
					$result_upload = $this->manage_fileUploader->upload_document_file($filename_desired,$userImage['files'],'../files/');
					//photo_name variable saves the database
					$file_name = $userImage['files']['name'];
					//updated filename which is saved in files folder
					$updated_filename = "files/".$result_upload;
				}
				else
				{
					$file_name = "";
					$updated_filename = "";	
				}
				//varriable which will contain the category in string format
				$category_string = ""; 
				
				if(!empty($userData['category']) && isset($userData['category']))
				{
					$category = $userData['category'];
					if( $category != "" )
					{
						//convert array to string seperated by commas
						foreach($category as $cate)
						{
							$category_string = $category_string.",".$cate ;
						}
					}
					/*
					- remove the first word from the $category_string sa it
					- it contains a comma
					*/
					
					$category_string = substr($category_string,1);
				}
				//varriable which will contain the skills in string format
				$skills_string = ""; 
				
				if(!empty($userData['skills']) && isset($userData['skills']))
				{
					$skills = $userData['skills'];
					if( $skills != "" )
					{
						//convert array to string seperated by commas
						foreach($skills as $skill)
						{
							$skills_string = $skills_string.",".$skill ;
						}
					}
					/*
					- remove the first word from the $category_string sa it
					- it contains a comma
					*/
					
					$skills_string = substr($skills_string,1);
				}
				//varriable which will contain the preferred location in string format
				$location_string = ""; 
				
				if(!empty($userData['preferred_location']) && isset($userData['preferred_location']))
				{
					$location = $userData['preferred_location'];
					if( $location != "" )
					{
						//convert array to string seperated by commas
						foreach($location as $locations)
						{
							$location_string = $location_string.",".$locations ;
						}
					}
					/*
					- remove the first word from the $category_string sa it
					- it contains a comma
					*/
					
					$location_string = substr($location_string,1);
				}
				//creating the column name array
				$column_name = array("category","project_id","project_name","project_description","date","time","files","updated_filename","skills","preferred_location","price_range","time_range","user_id");
				//creating table value
				$column_values = array($category_string,$project_id,$userData['project_name'],$userData['project_description'],$curdate,$curtime,$file_name,$updated_filename,$skills_string,$location_string,$userData['price_range'],$userData['time_range'],$user_id);
				//inserting values to post info table
				$insert = $this->manage_content->insertValue("project_info",$column_name,$column_values);
				return $insert;
		}
		
		/*
		 method for edit project
		 Auth: Dipanjan
		*/
		function editProject($userData,$userImage)
		{
			//getting the id number of project info table of this project id
			$table_id = $this->manage_content->getValue_where("project_info","*","project_id",$userData['project_id']);
			$id = $table_id[0]['id'];
			//update each field which is set
			//varriable which will contain the category in string format
			$category_string = ""; 
			
			if(!empty($userData['category']) && isset($userData['category']))
			{
				$category = $userData['category'];
				if( $category != "" )
				{
					//convert array to string seperated by commas
					foreach($category as $cate)
					{
						$category_string = $category_string.",".$cate ;
					}
				}
				/*
				- remove the first word from the $category_string sa it
				- it contains a comma
				*/
				
				$category_string = substr($category_string,1);
			}
			if(isset($category_string) && !empty($category_string))
			{
				$result = $this->manage_content->updateValueWhere("project_info","category",$category_string,"id",$id);
			}
			
			//varriable which will contain the skills in string format
			$skills_string = ""; 
			
			if(!empty($userData['skills']) && isset($userData['skills']))
			{
				$skills = $userData['skills'];
				if( $skills != "" )
				{
					//convert array to string seperated by commas
					foreach($skills as $skill)
					{
						$skills_string = $skills_string.",".$skill ;
					}
				}
				/*
				- remove the first word from the $category_string sa it
				- it contains a comma
				*/
				
				$skills_string = substr($skills_string,1);
			}
			if(isset($skills_string) && !empty($skills_string))
			{
				$result = $this->manage_content->updateValueWhere("project_info","skills",$skills_string,"id",$id);
			}
			
			//varriable which will contain the preferred location in string format
			$location_string = ""; 
			
			if(!empty($userData['preferred_location']) && isset($userData['preferred_location']))
			{
				$location = $userData['preferred_location'];
				if( $location != "" )
				{
					//convert array to string seperated by commas
					foreach($location as $locations)
					{
						$location_string = $location_string.",".$locations ;
					}
				}
				/*
				- remove the first word from the $category_string sa it
				- it contains a comma
				*/
				
				$location_string = substr($location_string,1);
			}
			if(isset($location_string) && !empty($location_string))
			{
				$result = $this->manage_content->updateValueWhere("project_info","preferred_location",$location_string,"id",$id);
			}
			
			if(isset($userData['project_name']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","project_name",$userData['project_name'],"id",$id);
			}
			
			if(isset($userData['project_description']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","project_description",$userData['project_description'],"id",$id);
			}
						
			if(isset($userData['price_range']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","price_range",$userData['price_range'],"id",$id);
			}
			
			if(isset($userData['time_range']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","time_range",$userData['time_range'],"id",$id);
			}
			
			//for uploaded file
			if(!empty($userImage['files']['name']))
			{
				//creating unique alpha numeric digit for filename desired
				$filename_desired = $table_id[0]['user_id'].$this->getCurrentDate().uniqid();
				//move the uploaded file to the UI Layer img folder of main image
				$result_upload = $this->manage_fileUploader->upload_document_file($filename_desired,$userImage['files'],'../files/');
				//photo_name variable saves the database
				$file_name = $userImage['files']['name'];
				//updated filename which is saved in files folder
				$updated_filename = "files/".$result_upload;
				//update database field
				$result1 = $this->manage_content->updateValueWhere("project_info","files",$file_name,"id",$id);
				$result2 = $this->manage_content->updateValueWhere("project_info","updated_filename",$updated_filename,"id",$id);
			}
		}
		
		/*
		 method for insert bid
		 Auth: Dipanjan
		*/
		function insertBid($userData,$userImage,$userId)
		{
			//creating bid id
			$bid_id = uniqid('BID');
			//getting current date and time
			$curdate = $this->getCurrentDate();
			$curtime = $this->getCurrentTime();
			//uploading files in UI layer Files folder
			if(!empty($userImage['files']['name']))
			{
				//move the uploaded file to the UI Layer img folder of main image
				$result_upload = $this->manage_fileUploader->upload_document_file($userImage['files'],'../files/');
				//photo_name variable saves the image location
				$file_name = "files/".$result_upload;
			}
			else
			{
				$file_name = "";	
			}
			//get ip of bidder
			$bid_ip = $this->manage_utility->getIpAddress();
			//creating the column name array
			$column_name = array("bid_id","project_id","bid_description","file_attached","date","time","price","time_range","bid_ip","user_id");
			//creating the column value array
			$column_value = array($bid_id,$userData['project_id'],$userData['description'],$file_name,$curdate,$curtime,$userData['price'],$userData['time_range'],$bid_ip,$userId);
			//inserting values to bid info table
			$insert = $this->manage_content->insertValue("bid_info",$column_name,$column_value);
			return $insert;
		}
		
		/*
		 method for update bid
		 Auth: Dipanjan
		*/
		function updateBid($userData,$userImage)
		{
			//getting bid id
			$bid_id = $userData['bid_id'];
			
			if(isset($userData['description']))
			{
				$result = $this->manage_content->updateValueWhere("bid_info","bid_description",$userData['description'],"bid_id",$bid_id);
			}
			
			if(isset($userData['price']))
			{
				$result = $this->manage_content->updateValueWhere("bid_info","price",$userData['price'],"bid_id",$bid_id);
			}
			
			if(isset($userData['time_range']))
			{
				$result = $this->manage_content->updateValueWhere("bid_info","time_range",$userData['time_range'],"bid_id",$bid_id);
			}
			
			//uploading files in UI layer Files folder
			if(!empty($userImage['files']['name']))
			{
				//move the uploaded file to the UI Layer img folder of main image
				$result_upload = $this->manage_fileUploader->upload_document_file($userImage['files'],'../files/');
				//photo_name variable saves the image location
				$file_name = "files/".$result_upload;
				$update_file = $this->manage_content->updateValueWhere("bid_info","file_attached",$file_name,"bid_id",$bid_id);
			}
			
		}
		
		/*
		 method for updating personal info
		 Auth: Dipanjan
		*/
		function updatePersonalInfo($userData,$userImage,$user_id)
		{
			//getting id of row
			$table_id = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			$id = $table_id[0]['id'];
			//updating the values
			if(!empty($userImage['resume']['name']))
			{
				//creating unique alpha numeric digit for filename desired
				$filename_desired = $user_id."resume";
				//move the uploaded file to the UI Layer img folder of main image
				$result_upload = $this->manage_fileUploader->upload_document_file($filename_desired,$userImage['resume'],'../files/');
				//updated filename which is saved in files folder
				$updated_filename = "files/".$result_upload;
				//update database field
				$result = $this->manage_content->updateValueWhere("user_info","resume",$updated_filename,"id",$id);
			}
			
			if(isset($userData['skills']))
			{
				$result = $this->manage_content->updateValueWhere("user_info","skills",$userData['skills'],"id",$id);
			}
		}
		
		/*
		 method for setting cookie
		 Auth: Dipanjan
		*/
		function createCookie($cookie_name,$cookie_value,$exp_time)
		{
			//creating the cookie
			$path = '/';
			setcookie($cookie_name,$cookie_value,$exp_time,$path);
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
	
?>