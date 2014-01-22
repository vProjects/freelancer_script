<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'class.receiveData.php';
	//creating object of receiveData Class
	$manageData = new receiveData();
	
	//getting sending page name
	$url = $_SERVER['HTTP_REFERER'];
	$page_name = substr($url,strrpos($url, "/")+1);
	
	//tracking page name using switch case
	switch($page_name){
		//for signup page data
		case "sign_up.php":
		{
			//checking that password and confirm password field are equal
			if($GLOBALS['_POST']['password'] == $GLOBALS['_POST']['confirm_password'])
			{
				$insert = $manageData->insertUserDetails($GLOBALS['_POST'],$GLOBALS['_FILES']);
				if($insert == 1)
				{
					$_SESSION['success'] = 'Registration Successfull';
				}
				elseif($insert == 'Email Id Exists!!')
				{
					$_SESSION['warning'] = 'Email Id Exists!!';
				}
				elseif($insert == 0)
				{
					$_SESSION['warning'] = 'Registration Unsuccessfull';
				}
				header("Location: ../sign_up.php");
				
			}
			else
			{
				$_SESSION['warning'] = 'Password does not match';
				header("Location: ../sign_up.php");
			}
			break;
		}
		
		//for login page data
		case "index.php":
		{
			//checking for empty email and password field
			if(!empty($GLOBALS['_POST']['email']) && !empty($GLOBALS['_POST']['password']))
			{
				//checking for valid login credentials
				$login = $manageData->checkingLoginValues($GLOBALS['_POST']['email'],$GLOBALS['_POST']['password'],$GLOBALS['_POST']['category']);
				if($login[0] == 0)
				{
					$_SESSION['warning'] = $login[1];
					header("Location: ../index.php");
				}
				else if($login[0] == 1)
				{
					$_SESSION['success'] = $login[1];
					$_SESSION['user'] = $login[2];
					//checking for employer or contractor login
					if($login[2] == 'employer')
					{
						header("Location: ../post_project.php");
					}
					else if($login[2] == 'contractor')
					{
						header("Location: ../job_list.php");
					}
				}
			}
			else
			{
				$_SESSION['warning'] = 'Email Id Or Password Field Is Empty!!';
				header("Location: ../index.php");
			}
			break;
		}
		
		//for post project data
		case "post_project.php":
		{
			break;
		}
	}

?>