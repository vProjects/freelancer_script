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
						return array(1,'Login Successfull!!',$login_details[0]['category']);
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