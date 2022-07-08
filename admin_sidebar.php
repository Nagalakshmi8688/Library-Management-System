<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Admin Sidebar</title>
<style>
body {
    font-family: "Lato", sans-serif;
  }

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
  
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 35px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
.main h2{
  margin-top:5px;
}



/* Add an active class to the active dropdown button */
.active {
  background-color:gray;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
.account h3{
margin-left:20px;
color:white;
}
</style>

</head>
<body>
<div class="sidenav">
  <a href="#">Welcome</a>
  <div class="account">
  <?php
  echo "<h3> ".$_SESSION['login_user']."</h3>";
  ?>
  </div>
  <a href="admin_home.php">Home</a>
  <a href="addbook.php">Add Book</a>
  <a href="admin_request.php">Request Book</a>
  <a href="admin_issue.php">Issue Record</a>
  <a href="expired.php">Expired list</a>
  <a href="admin_login.php">Logout</a>
</div>

<div class="main">
  <center><h2>Library Management System</h2>
  
</div>


<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>



</body>
</html>