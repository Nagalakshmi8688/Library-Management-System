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
    <title>Add Book</title>
    
    <style>
        body{
            background: url("https://images.unsplash.com/photo-1549675584-91f19337af3d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGxpYnJhcnl8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
                opacity: 0.9;
                filter: alpha(opacity=50); /* For IE8 and earlier */
        }  
        h1{
            text-align: center;

        }
        .addbook{  
    margin-left: 35%;
    margin: 20 0 0 450px;
    width: 500px;   
    padding: 20px;
    background:rgb(248, 194, 194);  
    border-radius: 15px ;   
}
label{  
    color: black;  
    font-size: 17px;  
}  
#bookname, #bookdetail,#bookauthor, #bookavailable {  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
} 

.btn  input{
    padding: 10px 30px;
    font-size: 16px;
    margin-left: 40%;
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: rgb(104, 144, 255); 
    border: 2px solid rgb(46, 102, 255);
    color:white; 
}
.btn:hover input{
    background-color: rgb(155, 180, 248);
    color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add New Books</h1>
        <br><br>
    </header>
    <div class="addbook">
    <form  action="addbook.php" method="post">
        <div>
            <label><b>Book Name</b></label>
            <input type="text" id='bookname' name="name"  placeholder="Book Name *" requried>
            <br><br>
            <label><b>Book Author</b></label>
            <input type="text" id='bookdeatil' name="authors"  placeholder="Book Detail *" requried>
            <br><br>
            <label><b>Book Edition</b></label>
            <input type="text" id='bookauthor' name="edition"  placeholder="Book Author *" requried>
            <br><br>
            <label><b>Book Available</b></label>
            <input type="text" id='bookavailable' name="status"  placeholder="Book Available *" requried>
            <br><br>
            <label><b>Quantity</b></label>
            <input type="text" id='bookavailable' name="quantity"  placeholder="Book Available *" requried>
            <br><br>
            <!--<label><b>Quantity</b></label>
            <input type="text" id='Quantity' name="Quantity"  placeholder="Quantity *" requried>
            <br><br>
            <label><b>Department</b></label>
            <input type="text" id='Department' name="Department"  placeholder="Department *" requried>
            <br><br>-->
        </div>
        <div class="btn">
            <br>
            <input type="submit" class="btn" name="add" value="Add Book">    
        </div>
    </form>
    </div>

<?php

if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}

if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];


    $sql_query = "INSERT INTO books(name,authors,edition,status,quantity) 
    VALUES('$name','$authors','$edition','$status','$quantity')";
    if(mysqli_query($conn,$sql_query))
    {
        ?>
        <script type="text/javascript">
                alert("Add book.");
                window.location="addbook.php";
              </script> 
        <?php
    }
    else{
        echo "Error:". $sql ."".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

</body>
</html>