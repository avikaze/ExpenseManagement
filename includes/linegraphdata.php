<?php
    include("dbconnection.php");
    /* $sql = "SELECT EXTRACT(YEAR_MONTH FROM ExpenseDate) as 'Month', SUM(ExpenseCost) as ExpenseCost FROM expense GROUP BY month"; */
    $sql = "SELECT DATE_FORMAT(ExpenseDate, '%Y-%M') as EDate, SUM(ExpenseCost) as ExpenseCost FROM expense GROUP BY EDate";
    
    $result = mysqli_query($con,$sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
        $json_array[]=$row;
    }
    echo json_encode($json_array);
    ?>