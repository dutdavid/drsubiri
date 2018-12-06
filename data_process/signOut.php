<?php
	session_start();
    
	 if(isset($_SESSION["control"])){
         
         unset($_SESSION["control"]);
         session_destroy($_SESSION["control"]);
         
		header("Location: ../");
		exit();
	 }
?>