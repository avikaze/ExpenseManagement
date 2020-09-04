<?php
    include("dbconnection.php");
    
    $sql = "SELECT ExpenseCategoryName, SUM(ExpenseCost) as ExpenseCost FROM expense GROUP BY ExpenseCategoryName ORDER BY ExpenseCategoryName";
    $result = mysqli_query($con,$sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
        $json_array[]=$row;
    }
    echo json_encode($json_array);
    ?>