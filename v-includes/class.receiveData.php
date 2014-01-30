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
				//creating the column name array
				$column_name = array("user_id","f_name","l_name","email_id","dob","gender","contact_no","username","password","address","joining_date","joining_time","joining_ip","browser_name","profile_image","category");
				//creating table value
				$values = array($user_id,$userData['f_name'],$userData['l_name'],$userData['email'],$userData['dob'],$userData['gender'],$userData['contact_no'],$username,$userData['password'],$userData['address'],$curdate,$curtime,$ip_address,$browser_name,$photo_name,$userData['category']);
				
				//inserting user values to database user_info table
				$insert = $this->manage_content->insertValue("user_info",$column_name,$values);
				return $insert;
				
			}
			else
			{
				return 'Email Id Exists!!';
			}
		}
		
		/*
		 method for checking login username and password
		 Auth: Dipanjan
		*/
		function checkingLoginValues($email_id,$password,$category)
		{
			//checking for existance of email id
			$login_details = $this->manage_content->getValue_where("user_info","*","email_id",$email_id);
			if(!empty($login_details[0]))
			{
				//checking for right category
				if($login_details[0]['category'] == $category)
				{
					//checking for right password
					if($login_details[0]['password'] == $password)
					{
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
					//move the uploaded file to the UI Layer img folder of main image
					$result_upload = $this->manage_fileUploader->upload_document_file($userImage['files'],'../files/');
					//photo_name variable saves the image location
					$file_name = "files/".$result_upload;
				}
				else
				{
					$file_name = "";	
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
				//creating the column name array
				$column_name = array("category","project_id","project_name","project_description","date","time","files","skills","preferred_location","price_range","time_range","user_id");
				//creating table value
				$column_values = array($category_string,$project_id,$userData['project_name'],$userData['project_description'],$curdate,$curtime,$file_name,$userData['skills'],$userData['preferred_location'],$userData['price_range'],$userData['time_range'],$user_id);
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
			
			if(isset($userData['project_name']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","project_name",$userData['project_name'],"id",$id);
			}
			
			if(isset($userData['project_description']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","project_description",$userData['project_description'],"id",$id);
			}
			
			if(isset($userData['skills']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","skills",$userData['skills'],"id",$id);
			}
			
			if(isset($userData['price_range']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","price_range",$userData['price_range'],"id",$id);
			}
			
			if(isset($userData['time_range']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","time_range",$userData['time_range'],"id",$id);
			}
			
			if(isset($userData['preferred_location']))
			{
				$result = $this->manage_content->updateValueWhere("project_info","preferred_location",$userData['preferred_location'],"id",$id);
			}
		}
		
		/*
		 method for insert project
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
			$time = time();
			return $time;
		}
	}
	
?>