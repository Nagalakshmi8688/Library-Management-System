<?php
include "connection.php";
include "admin_sidebar.php";
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
	height: 400px;
	background-color: black;
    width: 500px;
    margin-left:500px;
    margin-top:70px;
	opacity: .8;
	color: white;
}
.Approve
{
  margin-left: 100px;
}
.Approve input{
    width:75%;
    height:30px;
}
.Approve button{
    height:30px;
    margin-left:120px;
    background-color:blue;
    color:white;
   
}
        </style>
</head>
<body>
<div class="container">
    <br><h3 style="text-align: center;">Approve Request</h3><br><br>
    
    <form class="Approve" action="" method="post">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br><br>

        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br><br>

        <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br><br>
        <button class="btn btn-default" type="submit" name="submit">Approve</button>
    </form>
  
  </div>


<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($conn,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

    mysqli_query($conn,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");

    $res=mysqli_query($conn,"SELECT quantity from books where bid='$_SESSION[bid];");

    
   
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="admin_request.php"
      </script>
    <?php
  }
?>
    
</body>
</html>