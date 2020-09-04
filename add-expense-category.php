<?php
    session_start();
    error_reporting(0);
    include("includes/dbconnection.php");
    include("includes/header.php");
    include("includes/navbar.php");
    include("includes/topbar.php");
    



if(isset($_POST['submit']))
  {
    $ExpenseCategoryName=$_POST['ExpenseCategoryName'];
    $query=mysqli_query($con, "insert into ExpenseCategory(ExpenseCategoryName) value('$ExpenseCategoryName')");
  
	if($query){
echo "<script>alert('Expense Category has been added');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try ');</script>";

}

$sql = "SELECT ExpenseCategoryName  FROM ExpenseCategory WHERE ExpenseCategoryName = '$ExpenseCategoryName' ";

$query = mysqli_query($con, $sql);

if(($one = mysqli_num_rows($query)) >= 1){
	

	echo '<script>
		
		alert("'.ucfirst($ExpenseCategoryName).' already exist");
		</script>';
	
	}
	
   

	
  }
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Expense Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expense Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form role="form" method="post" action="">
            <div class="form-group">
                    <label>Category</label><br>
                    <input class="form-control" type="text" value="" name="ExpenseCategoryName" required="true">                              
                <div class="form-group has-success">
                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                </div>
                
                
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
