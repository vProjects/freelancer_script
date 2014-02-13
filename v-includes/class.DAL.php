<?php
	//include class library of database connecton
	include 'class.database.php';
	class ManageContent_DAL
	{
		public $link;
		
		//construct function
		function __construct()
		{
			$db_Connection = new dbConnection();
			$this->link = $db_Connection->connect();
			return $this->link;
		}
		
		
		function getValue($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getValue_descending($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name ORDER BY `id` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getValue_distinct($table_name,$value)
		{
			$query = $this->link->query("SELECT DISTINCT $value from $table_name");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getRowValue($table_name,$row_value,$value_entered)
		{
			try{
				$query = $this->link->prepare("SELECT * from $table_name where $row_value='$value_entered'");
				$query->execute();
				$rowcount = $query->rowCount();
				return $rowcount;
			}
			catch(Exception $e)
			{
				throw "Result Not Found";
			}
		}
		
		function getRowValueFourCondition($table_name,$row_value1,$value_entered1,$row_value2,$value_entered2,$row_value3,$value_entered3,$row_value4,$value_entered4)
		{
			try{
				$query = $this->link->prepare("SELECT * from $table_name where $row_value1='$value_entered1' AND $row_value2='$value_entered2' AND $row_value3='$value_entered3' AND $row_value4='$value_entered4'");
				$query->execute();
				$rowcount = $query->rowCount();
				return $rowcount;
			}
			catch(Exception $e)
			{
				throw "Result Not Found";
			}
		}
		
		function getValue_where($table_name,$value,$row_value,$value_entered)
		{
			try{
				$query = $this->link->prepare("SELECT $value from $table_name where $row_value='$value_entered'");
				$query->execute();
				$rowcount = $query->rowCount();
				if($rowcount > 0){
					$result = $query->fetchAll(PDO::FETCH_ASSOC);
					return $result;
				}
				else{
					return $rowcount;
				}
			}
			catch(Exception $e)
			{
				throw "Result Not Found";
			}
		}
		
		function getValueWhere_descending($table_name,$value,$row_value,$value_entered)
		{
			$query = $this->link->query("SELECT $value from $table_name where $row_value='$value_entered' ORDER BY `id` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getValue_twoCoditions($table_name,$value,$row_value1,$value_entered1,$row_value2,$value_entered2)
		{
			try{
				$query = $this->link->prepare("SELECT $value from $table_name where $row_value1='$value_entered1' AND $row_value2='$value_entered2'");
				$query->execute();
				$rowcount = $query->rowCount();
				if($rowcount > 0){
					$result = $query->fetchAll(PDO::FETCH_ASSOC);
					return $result;
				}
				else{
					return $rowcount;
				}
			}
			catch(Exception $e)
			{
				throw "Result Not Found";
			}
		}
		
		function getValue_twoCoditions_descending($table_name,$value,$row_value1,$value_entered1,$row_value2,$value_entered2)
		{
			try{
				$query = $this->link->query("SELECT $value from $table_name where $row_value1='$value_entered1' AND $row_value2='$value_entered2' ORDER BY `id` DESC");
				$query->execute();
				$rowcount = $query->rowCount();
				if($rowcount > 0){
					$result = $query->fetchAll(PDO::FETCH_ASSOC);
					return $result;
				}
				else{
					return $rowcount;
				}
			}
			catch(Exception $e)
			{
				throw "Result Not Found";
			}
		}
		
		//get all the latest aricles 
		function getValue_latest($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name pet ORDER BY `article_date` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		//get latest article according to the author
		function getValue_latest_where($table_name,$value,$row_value,$value_entered)
		{
			$query = $this->link->query("SELECT $value from $table_name where $row_value='$value_entered' ORDER BY `article_date` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*method for inserting values to given table
		//Auth Dipanjan  
		*/
		function insertValue($table_name,$column_name,$column_values){
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column."`".$column_name[$i]."`, ";
				$value = $value."?,"; 
			}
			//modifying the string for column name and values
			$column = substr($column,0,-2);
			$value = substr($value,0,-1);
			$query = $this->link->prepare("INSERT INTO `$table_name`($column) VALUES ($value)");
			$query->execute($column_values);
			return $query->rowCount();
		}
		
		/*method for inserting account information of member
		//Auth Dipanjan  
		*/
		function insertAcDetails($membership_id,$ac_name,$ac_no,$bank,$branch,$ifsc,$status){
			$query = $this->link->prepare("INSERT INTO `member_account_details`(`membership_id`, `ac_name`, `ac_no`, `bank`, `branch`, `ifsc_code`, `status`) VALUES (?,?,?,?,?,?,?)");
			$values = array($membership_id,$ac_name,$ac_no,$bank,$branch,$ifsc,$status);
			print_r($values);
			$query->execute($values);
			return $query->rowCount();
		}
		
		//getting last value of a column
		function getLastValue($table_name,$column_name,$sorting_column){
			$query = $this->link->query("SELECT $column_name FROM $table_name ORDER BY $sorting_column DESC LIMIT 1");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- method for updating the values using where clause
		- auth: Dipanjan
		*/
		function updateValueWhere($table_name,$update_column,$update_value,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column`= '$update_value' WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- function to get the likely values of keyword
		- auth: Dipanjan
		*/
		function getValue_likely($table_name,$value,$column_name,$keyword)
		{
			$query = $this->link->prepare("SELECT $value from $table_name WHERE $column_name LIKE '%$keyword%'");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the likely values of keyword with descending
		- auth: Dipanjan
		*/
		function getValue_likely_descending($table_name,$value,$column_name,$keyword)
		{
			$query = $this->link->prepare("SELECT $value from $table_name WHERE $column_name LIKE '%$keyword%' ORDER BY `id` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the likely values of keyword
		- auth: Dipanjan
		*/
		function getValue_latestDate($table_name,$value,$no)
		{
			$query = $this->link->prepare("SELECT $value from $table_name ORDER BY `date` DESC LIMIT $no");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
        /*
         * Insert 1 for activated user
         *  Auth vasu naman
        */
        function activateUser($membership_id,$email){
            $query = $this->link->prepare("UPDATE `member_table` SET `membership_validiation`=1 WHERE membership_id = '$membership_id'");
            $query->execute();
            return $query->rowCount();
        }
        
        
        
        /* ====== codes written by vasu end here ========== */
	}
?>