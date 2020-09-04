<?php
    session_start();
    error_reporting(0);
    include_once('includes/dbconnection.php');
    include_once("includes/header.php");
    include_once("includes/navbar.php");
	include_once("includes/topbar.php");
	//code deletion
	if(isset($_GET['delid']))
	{
	$rowid=intval($_GET['delid']);
	$query=mysqli_query($con,"delete from expense where ID='$rowid'");
	if($query){
	echo "<script>alert('Record successfully deleted');</script>";
	echo "<script>window.location.href='manage-expense.php'</script>";
	} else {
	echo "<script>alert('Something went wrong. Please try again');</script>";

	}

	}
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Manage Categories</title>
    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

	
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    </head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><a href="index.php">Expense</li></a>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
							echo $msg;
						}  ?> </p>
						<div class="col-md-12">
							
							<div class="table-responsive">
            				<table class="table table-bordered mg-b-0" id="dataTables-example">
              				<thead>
                			<tr>
							<th>S.NO</th>
                            <th>Expense Category</th>
                            <th>Expense Item</th>
							<th>Expense Cost</th>
							<th>Expense Date</th>
							<th>Expense Date</th>
							<th>Action</th>
							</tr>
			  				</thead>
			  				<tbody>
							<?php
							
								$ret=mysqli_query($con,"SELECT * FROM expense  order by ExpenseItem ASC");
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {

								?>
              
							<tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php echo  $row['ExpenseCategoryName'];?></td>
						
                            <td><?php  echo $row['ExpenseItem'];?></td>
							<td><?php  echo $row['ExpenseCost'];?></td>
							<td><?php  echo $row['ExpenseDate'];?></td>
							<td><?php  echo $row['Image'];?></td>
							<td><a href="manage-expense.php?delid=<?php echo $row['ID'];?>">Delete</a>
							</tr>
							<?php 
							$cnt=$cnt+1;
							}?>
               
							</tbody>
							</table>
						</div>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		
		</div><!-- /.row -->
    </div><!--/.main-->
    





<?php
    include_once("includes/scripts.php");
    
    ?>
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
 
</body>
</html>