<?php
	session_start(); //This line informs this file that we intend to use the session somewhere within these lines of code.
	
	//The statement below establishes the database connection by importing the code written in db_connect.php located in  includes.
    require_once "../includes/db_connect.php";
    
   if (isset($_POST["send_message"])){
	   //In the line above, $_POST["send_message"] is set (isset) to trigger process that will take place with in the curly bracket. That is if $_POST["send_message"] is missing, no process will table place.
	   
	   //P.S.: Note that $_POST is an array if you do  print_r($_POST); after submission, you will be able to see all array elements
    /**********************************************
    The following statements declare variables that have been submitted from the input form $_POST["fullName"] is identical to name = "fullName" in <input type = "text" name = "fullName" />.
	The mysqli_real_escape_string() function escapes special characters in a string and create a legal SQL string to provide security against SQL injection. That is - mysqli_real_escape_string is used to filter entries to prevent possible attacks.
    //$_POST is used to acquire data that was submitted using the POST method from the user's form.
	**************************************************/
    $FirstName = mysqli_real_escape_string($conn, $_POST["FirstName"]);
    $LastName = mysqli_real_escape_string($conn, $_POST["LastName"]);
    $Email = mysqli_real_escape_string($conn, $_POST["Email"]);
    $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);
    
	/**************************************************
       The statement that follows is a query to insert specific values in specified table message's attributes.
	Note that (msg_fullName, msg_email, msg_subject, msg_fullText, msg_datetime) MUST BE IDENTICAL to the message's table attributes.
	***********************************************/
    $msg_insert = "INSERT INTO messages(FirstName, LastName, Email, phone_number, message) VALUES ('$FirstName', '$LastName', '$Email', '$phone_number', '$message')";
    
	/*********************************
	In the statement below, we invoke the database connection class using $conn and we pass the $msg_insert argument to the query method.
	My wording may not make sense, but it is an OOP concept. Sorry!!
	*********************************/
    if($conn->query($msg_insert) === TRUE){
		
		/****
		if the data insertion process is successful, the page will be redirected to contact.php, and exit, that is - php won't read any further lines on this process.php
		****/
        header("Location: ../contact-us.php");
        exit();
    }else{
        print "Failed: " . $conn->error;
    }
    /*******************************************
	You can check a MySQLi Object-oriented example on https://www.w3schools.com/php/php_mysql_insert.asp
	*******************************************/
    }    
   if (isset($_POST["signup"])){    

    $YourName = mysqli_real_escape_string($conn, $_POST["YourName"]);
    $UserName = mysqli_real_escape_string($conn, $_POST["UserName"]);
    $Email = mysqli_real_escape_string($conn, $_POST["Email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $ConfPass = mysqli_real_escape_string($conn, $_POST["ConfPass"]);
    $userRole = mysqli_real_escape_string($conn, $_POST["userRole"]);
    
    $user_insert = "INSERT INTO users(YourName, UserName, Email, password, ConfPass, userRole) VALUES ('$YourName', '$UserName', '$Email', '$password', '$ConfPass', '$userRole')";
    
    if($conn->query($user_insert) === TRUE){
        header("Location: ../");
        exit();
        print "Record stored successfully";
    }else{
        print "Failed: " . $conn->error;
    }
    
    }    
   if (isset($_POST["login"])){    
    //In this particular sign in process we need to verify a userName and password.
    $username_entered = mysqli_real_escape_string($conn, $_POST["UserName"]);
    $password_entered = mysqli_real_escape_string($conn, $_POST["password"]);
    
    //The  query below will look a matching userName from the users' tables. "LIMIT 1" means we just need to pick ONLY ONE row. Select all (*) records matching the condition in the WHERE close but pick only the first matching record.
    $spot_username = "SELECT * FROM users WHERE UserName = '$username_entered' LIMIT 1";
	    
    /*****
    After database connection using new mysqli method, database connection object is returned. A query ($spot_username) is passed to connection object's query method. This function returns a result set. Here we call it user results or $user_res
    *****/    
    $user_res = $conn->query($spot_username);
	
    if ($user_res->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.
        
    /*************************************************************************
Likewise procedural way a row from result set is fetched using fetch_assoc() method.
This method returns a single row of result that we store in a session declared as $_SESSION["control"]. Column names are used as array indexes to access result like a password we do $_SESSION["control"]["password"] or a userId we do $_SESSION["control"]["userId"].
    *************************************************************************/
    
        $_SESSION["control"] = $user_res->fetch_assoc();
		
		$password_stored = $_SESSION["control"]["password"];
//For comparing the user entered password with the stored hash there is also a new function:
			if(password_verify($password_entered, $password_stored)){
/*
The password_verify function is designed to mitigate timing attacks and will work with other hash formats, not just Blowfish. It replaces the method above of having to apply crypt to the entered password ourselves for verification.
*/
					header("Location: ../admin-template/admin.php");
					exit();
					
				}else{
					
					header("Location: ../");
					exit();
					
				}
	}else{
        header("Location: ../");
		exit();
    }
    
    }

?>