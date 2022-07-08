<?php
include "connection.php";
include "sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .container
{
	height: 800px;
  width: 75%;
	
	opacity: .8;
	color: black;
  margin-top: -5px;
  margin-left:320px;
}

        </style>
</head>
<body>
<div class="container">

<h2>List Of Students</h2>
<?php

$res=mysqli_query($conn,"SELECT * FROM `fine` where username='$_SESSION[login_user]' ;");

    echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color: #6db6b9e6;'>";
            //Table header
            echo "<th>"; echo " Username ";	echo "</th>";
            echo "<th>"; echo " Bid ";  echo "</th>";
            echo "<th>"; echo " Returned ";  echo "</th>";
            echo "<th>"; echo " Days ";  echo "</th>";
            echo "<th>"; echo " Fines in $ ";  echo "</th>";
            echo "<th>"; echo " Status ";  echo "</th>";
        echo "</tr>";	

        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['returned']; echo "</td>";
            echo "<td>"; echo $row['day']; echo "</td>";
            echo "<td>"; echo $row['fine']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";

            echo "</tr>";
        }
    echo "</table>";
    

?>
</div> 
</body>
</html>