<?php
  include "connection.php";
  session_start();
?> 
  
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
<style>
    
    body {
                background: url("https://images.unsplash.com/photo-1549675584-91f19337af3d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGxpYnJhcnl8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
                opacity: 0.9;
                filter: alpha(opacity=50); /* For IE8 and earlier */
               
            }
      .background{
         
          margin:150px 550px;
          background:white;
          border:2px solid #464832;
          box-shadow: 5px 6px 6px 2px #e9ecef;
          border-radius:8px;
          

      }      
     
      .box form  input{
          padding:10px 10px;
          width:90%;
        font-size:15px;
        font-weight:600px;
        margin:0px 10px;
      }
      .box form label{
        
        margin-left:14px;
          width:50%;
        font-size:20px;
        font-weight:600px;
        line-height:30px;
      }
     .button {
          background:green;
          color:white;
       border:2px solid green;
       cursor:pointer;
          
      }

      
    </style>
</head>

<body>

<main>

        <div class="background">
       
            <div class="text">
              <center>  <h1>Login</h1></center>
                
            </div>
            <div class="box">
                <form class="form" method="POST" action="#">
                <label>Name</label><br>
                <input type="text" class="name" placeholder="Enter your Name" name="username" required><br><br>
                    <label>Password</label><br>
                    <input type="password" class="password" placeholder="Password" name="pass" required><br><br>
                    
                    <input type="submit" name="submit" class="button" value="Login"><br><br>
                    <div class="text-center">Don't have an account? <a href="admin_register.php">Register Here</a></div>
                   

                </form>
            </div>
        </div>
    </main> 
    <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($conn,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[pass]';");
      
    
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              
              <script type="text/javascript">
                alert("The username and password doesn't match.");
                window.location="admin_login.php";
              </script> 
              
      
        <?php
        exit();
      }
      else
      {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['email'] = $row['email'];
        $_SESSION['IS_LOGIN'] ='yes';
        $_SESSION['id'] = $row['id'];
        $_SESSION['bookauthor']=$row['bookauthor'];
        $_SESSION['bookname']=$row['bookname'];
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['fine']= $row['fine'];
       
		
		
        
          ?>
          <script >
          
          window.location="admin_home.php";
        </script> 
        
     <?php
      
      }
    }

  ?>
    
</body>


</html>