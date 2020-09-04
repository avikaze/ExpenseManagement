<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    include("includes/header.php");
    include("includes/navbar.php");
    include("includes/topbar.php");
    ?>

<?php



if(isset($_POST['submit']))
  {
	
	$ExpenseCategoryID=$_POST['ExpenseCategoryID'];
  $dateexpense=$_POST['dateexpense'];
  $item=$_POST['item'];
  $costitem=$_POST['costitem'];
  $image=$_FILES["image"]["name"];
  $query=mysqli_query($con, "insert into expense(ExpenseDate,ExpenseItem,ExpenseCost,ExpenseCategoryName,Image) value('$dateexpense','$item','$costitem','$ExpenseCategoryID','$image')");
  
    

	 


	if($query){
    move_uploaded_file($image=$_FILES["image"]["tmp_name"],"upload/".$_FILES["image"]["name"]);
		echo "<script>alert('Expense has been added');</script>";
		echo "<script>window.location.href='manage-expense.php'</script>";
		} else {
		echo "<script>alert('Something went wrong. Please try again');</script>";

		}
  }
?>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Expense
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Category</label><br>
                    <select class="form-control" name="ExpenseCategoryID" id="ExpenseCategoryID"  required="">
                        <option value="" selected="">Choose Expense Category</option>
                        <?php 
                            $getAll = mysqli_query($con, "SELECT * FROM ExpenseCategory order by ExpenseCategoryName ASC");
                            while($row = mysqli_fetch_array($getAll)):
                            ?>
                        <option value="<?php echo $row['ExpenseCategoryName']; ?>">
                            <?php echo  $row['ExpenseCategoryName'];?>  
                        </option>
                    <?php endwhile; ?>   
                    </select>
                    
                    
                    
                    <div class="form-group" enctype="multipart/form-data">
                        <label>Upload</label>
                        <input class="form-control" type="file" value="" required="true" name="image">
                    </div>
                <div class="form-group">
                    <label>Date of Expense</label>
                    <input class="form-control" type="date" value="" name="dateexpense" required="true">
                </div>
                <div class="form-group">
                    <label>Description of Item</label>
                    <input type="text" class="form-control" name="item" value="" required="true">
                </div>
                
                <div class="form-group">
                    <label>Cost of Item</label>
                    <input class="form-control" type="text" value="" required="true" name="costitem">
                </div>
                </div>
                <div class="modal-footer">
      
                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
        
                </div>
                
        </form>
      </div>
      
    </div>
  </div>
</div>





<?php
    include("includes/scripts.php");
    include("includes/footer.php");
    ?>

