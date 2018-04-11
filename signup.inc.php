<?php
    require ("header.php");
    
    if (isset($_POST['signupsubmitButton'])) {
        
        $signup_username = mysqli_real_escape_string($dbConn, $_POST['signup_username']);
        $signup_password = mysqli_real_escape_string($dbConn, $_POST['signup_passsword']);
        $signup_name = mysqli_real_escape_string($dbConn, $_POST['signup_name']);
        
        // check if any column is empty
//        if (empty($signup_username) || empty($signup_password) || empty($signup_name) ) {
//            
//            header("Location: ./adminHome.php?signup=empty");
//            exit();
//        } else {
        
        
        
        $sql = "SELECT * FROM `agents` WHERE `ID` = '$signup_username'";
        $result = mysqli_query($dbConn, $sql);
        $resultcheck = mysqli_num_rows($result);
        
        if ($resultcheck > 0){
            header("Location: ./adminHome.php?signup=usertaken");
            exit;
        } else {
            
            //Insert the data into database
            
            $sql_insert = "INSERT INTO `agents` (`Username`, `Password`, `Name`) VALUES ('$signup_username', '".sha1($signup_password)."', '$signup_name')";
            mysqli_query($dbConn, $sql_insert);
            
            header("Location: ./adminHome.php?signup=success");
            exit;
        }
        
             
    } else {
        header("Location: ./adminHome.php");
        exit;
    }

