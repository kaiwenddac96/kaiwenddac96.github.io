<?php

require ("header.inc.php");

if (!isLoggedIn() && !adminisLoggedIn()){
    
//    if (isset($_POST['adminlogoutButton'])) {
//        header ("Location: ./index.php");
//        exit;
//    }

    if (isset($_POST['submitButton'])) {
        if(!isset($_POST['username'])){
            die("Error: The Username field was not set.");
        } else if (!isset($_POST['password'])){
            die("Error: The password field was not set.");
        }

        $password = hash("sha1", $_POST['password']);
        $sql = "SELECT `ID` FROM `agents` WHERE `Username` = '" . mysqli_real_escape_string($dbConn, $_POST['username']) . "'AND `Password` = '" . mysqli_real_escape_string($dbConn, $password). "' ";
        $adminsql = "SELECT `id` FROM `admin` WHERE `username` = '" . mysqli_real_escape_string($dbConn, $_POST['username']) . "'AND `password` = '" . mysqli_real_escape_string($dbConn, $password). "' LIMIT 1";
        $query = mysqli_query($dbConn, $sql);
        $adminquery = mysqli_query($dbConn, $adminsql);

        if (mysqli_num_rows($query)) {

            $sessID = mysqli_real_escape_string($dbConn, session_id());
            $hash = mysqli_escape_string($dbConn, hash("sha512", $sessID.$_SERVER['HTTP_USER_AGENT']));

            $userData = mysqli_fetch_assoc($query);

            $expires = time() + (60 * 15);
            mysqli_query($dbConn, "INSERT INTO `users` (`Agent`, `session_id`, `hash`, `expires`) VALUES (" . (int) $userData['ID'] .", '" . $sessID ."', '". $hash ."', " . $expires ." )");
            header ("Location: ./home.php");
            exit;
            

        } else if (mysqli_num_rows($adminquery)){
            
            $sessID1 = mysqli_real_escape_string($dbConn, session_id());
            $hash1 = mysqli_escape_string($dbConn, hash("sha512", $sessID.$_SERVER['HTTP_USER_AGENT']));

            $adminData = mysqli_fetch_assoc($adminquery);

            $expires1 = time() + (60 * 15);
            mysqli_query($dbConn, "INSERT INTO `users` (`Agent`, `session_id`, `hash`, `expires`) VALUES ('1001', '" . $sessID1 ."', '". $hash1 ."', " . $expires1 ." )");
            header ("Location: ./adminHome.php");
            exit;
            
        }
            else {
            header("Location: ./index.php");
            exit;
        }


       }
} else {
    
    if (isset($_POST['logoutButton'])) {
        $user = getUser();
        
        mysqli_query($dbConn, "DELETE FROM `users` WHERE `Agent` =" . (int) $user['ID']);
        header ("Location: ./index.php");
        exit;
        
    } else if (isset($_POST['adminlogoutButton'])) {
        
        mysqli_query($dbConn, "DELETE FROM `users` WHERE `Agent` = '1001'" );
        header ("Location: ./index.php");
        exit;
    }
        
    
}
