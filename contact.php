<?php

	include("conn/conn.php"); //including the connection script


	if(isset($_POST['submit'])) {
			//Decelaring the variables
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$msg = $_POST['msg'];

			//checking for the name input
		if(!empty($_POST['name'])) {
			//$name = $_POST['name'];
			$name = mysqli_real_escape_string($conn, $name);
		}else{
			echo "<h3>Your name is required</h3>";
		}
			//checking for the email input
		if(!empty($_POST['email'])) {
			//$email = $_POST['email'];
			$email = mysqli_real_escape_string($conn, $email);
		}else{
			echo "<h3>Your email is required</h3>";
		}
			//checking for the phone input
		if(!empty($_POST['phone'])) {
			//$phone = $_POST['phone'];
			$phone = mysqli_real_escape_string($conn, $phone);
		}else{
			echo "<h3>Your Phone Nsumber is required</h3>";
		}
			//Checking for the message box input
		if(!empty($_POST['msg'])) {
			//$msg = $_POST['msg'];
			$msg = mysqli_real_escape_string($conn, $msg);
		}
		else{
			echo "<h3>A message from you is required</h3>";
		}

			//cheking if the input field contained texts
		if($name and $email and $phone and $msg) {

			$sql = "INSERT INTO user_messages(Name, Email, Phone, Message) VALUES('$name', '$email', '$phone', '$msg')";

			$run = mysqli_query($conn, $sql);

			if(mysqli_num_rows($run) == 1){
				   echo "<h3>Comment successfully Saved</h3>";
				   header("Location: contactUs.html");
	        }
	        else {
	            
	             echo "<p>Failed to save comment</p>";
	        }

		} 
		else {
	        
	        echo "<p>Missing form value(s)</p>";
	    }
	}//end of the first if statement
?>