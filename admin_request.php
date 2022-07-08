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
    <title>admin req</title>
<style>
    .request{
        padding: 50px 350px;
        
    }
    .request table{
        width: 110%;
    }
    .srch
		{
			padding-left: 350px;
          
		}
		.form-control
		{
			width: 300px;
			height: 30px;
			background-color: whitesmoke;
            border-radius: 10px 20px;
            
			color: white;
		}
		button{
            margin-left:70px;
            width:100px;
        }
        .srch input{
                color:black;
        }
    </style>
</head>
<body>
<div class="srch">
		<br>
		<form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder=" &emsp;Username" required="" > &emsp;
			<input type="text" name="bid" class="form-control" placeholder="&emsp;BID (book id)" required="">
			<button class="btn btn-default" name="submit" type="submit">Submit</button><br>
		</form>
	</div>
<div class="request">
    <?php
	
	if(isset($_SESSION['login_user']))
	{
		$sql= "SELECT student.username,roll,books.bid,name,authors,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
		$res= mysqli_query($conn,$sql);

		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #6db6b9e6; '>";
				//Table header
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
                
				echo "<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
	}
	else
	{
		?>
		<br>
			<h4 style="text-align: center;color: yellow;">You need to login to see the request.</h4>
			
		<?php
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['username'];
		$_SESSION['bid']=$_POST['bid'];

		?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
		<?php
	}

	?>
    </div>
</body>
    </html>