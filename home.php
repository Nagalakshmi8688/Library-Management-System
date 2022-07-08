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
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /*h2{
        color:black;
    }*/
    .srch
		{
			padding-left: 300px 100px;
           margin-top:-100px;
          

		}
        .srch .input{
            margin-left:-100%;
            width:40%;
           
        }
    .col-md-12{
        padding:200px 400px ;
        
    }
    .col-md-12 #myTable{
        margin: 0px;
  color: #717171;
  line-height: 25px;
  width:150%;
 position:relative;
 margin-top:-110%;
    }
    .col-md-7 {
        margin-top:-35%;
        margin-left:90%;
    }
   /* .com-md-table table tr{
        weight:50px !important;
        height:100%;
    }*/
    table, th,td{
        border: 1px solid black;
        border-collapse : collapse;
    }
   

    </style>
</head>
<body>

<div class="container">
        <div class="row">
            <div class="col-md-12">
              
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="filter"  class="form-control" placeholder="Search data" onkeyup="searchFun()">
                                       
                                    </div>
                                </form>

                          
                            </div>
                        </div>
                    </div>
            </div>
       


            
            <div class="col-md-12">
               
                    <div class="card-body">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    
                                    <th>Author</th>
                                    <th>edition</th>
                                    <th>status</th>
                                    <th>available</th>
                                </tr>
                                
                            </thead>
                        
                           
<?php 



$query = "SELECT * FROM books";
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0)
{
    
    foreach($query_run as $row)
    {
        
        ?>
       
    <tr>
    <td><?= $row['bid']; ?></td>
  <td><?= $row['name']; ?></td>
     
            <td><?= $row['authors']; ?></td>
        <td><?= $row['edition']; ?></td>
        <td><?= $row['status']; ?></td>
        <td><?= $row['quantity']; ?></td>
           
          
        </tr>
        <?php
    }
}

else
{
    ?>
        <tr>
            <td colspan="4">No Record Found</td>
        </tr>
    <?php
}
?>


<script>

function searchFun() {
      // Declare variables 
      var input, filter, table, tr, i, j, column_length, count_td;
      column_length = document.getElementById('myTable').rows[0].cells.length;
      input = document.getElementById("filter");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 1; i < tr.length; i++) { // except first(heading) row
        count_td = 0;
        for(j = 0; j < column_length-1; j++){ // except first column
            td = tr[i].getElementsByTagName("td")[j];
            /* ADD columns here that you want you to filter to be used on */
            if (td) {
              if ( td.innerHTML.toUpperCase().indexOf(filter) > -1)  {            
                count_td++;
              }
            }
        }
        if(count_td > 0){
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
      }
      
    }
</script>
   
<!--___________________search bar________________________-->

<!--<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">Search
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>-->
<!--___________________request book__________________-->
<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div>	
<?php


    if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($conn,"INSERT INTO issue_book Values('','$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request_book.php"
					</script>
				<?php
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>



    
</body>
</html>