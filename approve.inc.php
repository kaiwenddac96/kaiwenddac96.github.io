<?php
    require ("header.php");
    
    if (isset($_POST['approve'])) {
        
        $customer_id = mysqli_real_escape_string($dbConn, $_POST['approve']);
        $schedule_id = mysqli_real_escape_string($dbConn, $_POST['hiddendata']);
        $intweight = mysqli_real_escape_string($dbConn, $_POST['hiddendata1']);
            
        $sql = "Update `customer` SET `status` = '1' WHERE `id` = $customer_id ";
        $result = mysqli_query($dbConn, $sql);
               
        $sql_substract = "SELECT `ship` FROM `schedule_route` WHERE `id` = '$schedule_id' ";
        $result1 = mysqli_query($dbConn, $sql_substract);
        $intresult = mysqli_fetch_assoc($result1);
        
        $new_result = $intresult["ship"] - $intweight;
        
        $sql_newresult = "UPDATE `schedule_route` SET `ship` = '$new_result' WHERE `id` = '$schedule_id' ";
        mysqli_query($dbConn, $sql_newresult);
        
        header("Location: ./adminHome.php?approve=success");
        exit;
        
             
    } else {
        header("Location: ./adminHome.php");
        exit;
    }

