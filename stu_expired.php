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
    .expire tr{
            margin-left:100px;
        }
        .container
{
	height: 800px;
  width: 75%;
	
	opacity: .8;
	color: black;
  margin-top: -5px;
  margin-left:320px;
}

th,td
{
  width: 10%;
}
        </style>
</head>
<body>
<div class="container">
    
    <?php
      if(isset($_SESSION['login_user']))
      {
        ?>

      <div style="float: left; padding-left:  5px; padding-top: 20px;">
      <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> 
                      &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
      </form>
      </div>
      <div style="float: right;padding-top: 10px;">
        
        <?php 
        $var=0;
          $result=mysqli_query($conn,"SELECT * FROM `fine` where username='$_SESSION[login_user]' and status='not paid' ;");
          while($r=mysqli_fetch_assoc($result))
          {
            $var=$var+$r['fine'];
          }
          $var2=$var+$_SESSION['fine'];

         ?>
        <h3>Your fine is: 
          <?php
            echo "$ ".$var2;
          ?>
        </h3>
      </div>
<br><br><br><br>
        <?php
      }

      
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' and issue_book.username ='$_SESSION[login_user]'  ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($conn,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($conn,$sql);
        }
        else
        {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes'  and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($conn,$sql);
        }

        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";

    ?>
  </div>
</body>
</html>