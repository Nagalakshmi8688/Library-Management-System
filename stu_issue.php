
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <title>Document</title>

    <style>
    .container
{
	height: 600px;
	margin-left:205px;
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
 
 </style>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center;">Information of Borrowed Books</h3><br>

        <div class="srch" >
          <br>
          <form method="post" action="" name="form1">
            <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
            <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
            <button class="btn btn-default" name="submit" type="submit">Submit</button><br><br>
          </form>
        </div>
        <?php
        
        if(isset($_POST['submit']))
        {

          $res=mysqli_query($conn,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= floor($diff/(60*60*24)); 
          $fine= $day*.10;
        }
      }
          $x= date("Y-m-d"); 
          mysqli_query($conn,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");


          $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
          mysqli_query($conn,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");

          mysqli_query($conn,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
          
        }
      
    
    $c=0;

      
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        
        $c=0;
    
          if(isset($_SESSION['login_user']))
          {
            $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.username ='$_SESSION[login_user]' and issue_book.approve !='' ORDER BY `issue_book`.`return` ASC";
            $res=mysqli_query($conn,$sql);
            
            
            echo "<table class='table table-bordered' style='width:100%; margin-left:0px;' >";
            //Table header
            
            echo "<tr style='background-color:  #6db6b9e6;'>";
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
           
            echo "<tr>";
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
</body>
</html>