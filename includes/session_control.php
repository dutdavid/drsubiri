<?php
    // if the session $_SESSION["control"] is not set on any page that requires the file session_control.php, the page will be immediately redirected to the index page (unprotected zone) 
	 if(!isset($_SESSION["control"])){
		header("Location: ./?not_set");
		exit();
	 }
?>  