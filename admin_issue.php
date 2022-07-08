<?php
include "admin_sidebar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <title>Document</title>
<style>
    .container
{
	height: 600px;
	
	opacity: .8;
	color: black;
}

th,td
{
  width: 5%;
}
.col-md-12{
        padding:150px 400px ;
       
        color:black;
        
    }
    .col-md-12 table{
        margin: 0px;

  line-height: 15px;
  width:200%;
 margin-left:-100px;
 margin-top:0px;
    }
 #myTable tr{
     width:70%;
 }
 .expire{
margin-left:150px;
 }
 
</style>
</head>
<body>
<div class="container">
    <h3 style="text-align: center;">Information of Borrowed Books</h3><br>
    <?php
    $c=0;

      if(isset($_SESSION['login_user']))
      {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='Yes' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($conn,$sql);
        
        
        echo "<table class='table table-bordered' style='width:90%; margin-left:150px;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
          echo "<div class='expire'>";
          
        $d=date("Y-m-d");
        
        if($d > $row['return'])
        {
          $c=$c+1;
          $var='<p style="color:yellow; background-color:red; ">EXPIRED</p>';

          mysqli_query($conn,"UPDATE issue_book SET approve='$var' where `return`='$row[return]' and approve='Yes' limit $c;");
          
          echo $d."</br>";
        }
        echo"</div>";
        echo "<table class='table table-bordered' style='width:90%; margin-left:150px;' >";
        echo "<tr >";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";
       
      }
      else
      {
        ?>
          <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
        <?php
      }
    ?>
  </div>
</div>
</body>
</html>