<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Register</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    body{
        background: url("https://images.unsplash.com/photo-1549675584-91f19337af3d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGxpYnJhcnl8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60") no-repeat center center fixed ;
        -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
      opacity: 0.9;
      filter: alpha(opacity=50); /* For IE8 and earlier */
      position:fixed;
               
    }
    div .border{
        border: 2px solid black;
        width:30%;
        height:430px;
        margin-left:405px;
        margin: 200px 500px;
        background: whitesmoke;
        border-radius:8px;
    }

    
    div p, h2{
        margin-left:150px;
        
    }
    div .form-group{
        margin-left:50px;
        margin-right:60px;

    }
    </style>

</head>
<body>
<div class="signup-form">
    <form method="post" enctype="multipart/form-data">
    <div class = "border">
		<h2>Register</h2>
		<p class="hint-text">Create your account</p>
        <div class="form-group">
        	<input type="roll" class="form-control" name="roll" placeholder="rollnumber" required="required">
        </div>
        <div class="form-group">
        <div class="row">
				<div class="col"><input type="text" class="form-control" name="name" placeholder="Enter Your Name" required="required"></div>
				
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
        </div>
               
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
    </form>
	
</div>


<?php
 session_start();
// index.php

include "connection.php";
 
if (isset($_POST["save"]))
{   
    $roll = mysqli_real_escape_string($conn, $_POST["roll"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
 
    mysqli_query($conn, "INSERT INTO student(username, email, password,roll) VALUES (  '". $name . "' , '" . $email . "', '" . $pass . "','" . $roll . "')");
     header('location:login.php');
     

}
  

?>


</body>
</html>