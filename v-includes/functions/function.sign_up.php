<?php
    session_start();
	//include the DAL library to use the model layer methods
	include '../class.DAL.php'; 
	//creating object of DAL
	$managedata = new ManageContent_DAL();
	//include the mail class to send the mails to new sign up
	include '../class.mail.php';
    $mail = new Mail();
	
	//getting values from signup page
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = $_POST['f_name']." ".$_POST['l_name'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$email_id = $_POST['email'];
		$contact_no = $_POST['contact_no'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$category = $_POST['category'];	
	}
	//checking that password and confirm password field are equal
	if($password == $confirm_password)
	{
		//checking for unique email id
		$all_email = $managedata->getValue_where("user_info","*","email_id",$email_id);
		if(empty($all_email[0]))
		{
			//making email id as username
			$username = $email_id;
			//creating user id for contractor or employer
			if($category == 'employer')
			{
				$user_id = uniqid('EMP');
			}
			elseif($category == 'contractor')
			{
				$user_id = uniqid('CON');
			}
			//setting current date and time
			$curdate = date('y-m-d');
		}
		else
		{
			$msg = 'email id exists';
			header("Location: ../../sign_up.php");
		}
	}
	else
	{
		$msg = 'password does not match';
		header("Location: ../../sign_up.php");
	}
	
?>