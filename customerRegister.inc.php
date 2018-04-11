<?php
    require ("header.php");
    
    if (isset($_POST['registerCustomerButton'])) { 
        
        $register_customer_name = mysqli_real_escape_string($dbConn, $_POST['customer_name']);
        $register_item_desciption = mysqli_real_escape_string($dbConn, $_POST['item_description']);
        $register_item_weight = mysqli_real_escape_string($dbConn, $_POST['item_weight']);
        $intweight = (int) $register_item_weight;
        
        if (empty($register_customer_name) || empty($register_item_desciption) || empty($register_item_weight)) {
        
        header("Location: ./AgentRegisterSchedule.inc.php?registerCustomer=empty");
        exit();
        }
    
        $user = getUser();
        $agent_name = $user['Name'];
        $selectedID = $_POST['registerCustomerButton'];
        
        //Validate if enough weight
        $sql_substract = "SELECT `ship` FROM `schedule_route` WHERE `id` = '$selectedID' ";
        $result = mysqli_query($dbConn, $sql_substract);
        $intresult = mysqli_fetch_assoc($result);
        
        if ($intweight > $intresult["ship"]) {
            
            header("Location: ./home.php?registerCustomer=overweight");
            exit();
            
        } else {
        
        //insert customer data
        $sql = "INSERT INTO `customer` (`customer_name`, `item_description`, `item_weight`, `agent`, `schedule_id`, `status`) VALUES ('$register_customer_name', '$register_item_desciption', '$register_item_weight', '$agent_name', '$selectedID', `0`)";
        mysqli_query($dbConn, $sql);
        
        
        
        

        header("Location: ./home.php?registerCustomer=success");
        exit;
        }
        
    } else {
        header("Location: ./home.php");
        exit;
    
    }