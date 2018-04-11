<?php

require ("config.php");
session_start();



$user = isLoggedIn();

if ($user) {
    
    $expires = time() + (60 * 15);
    mysqli_query($dbConn, " UPDATE `users` SET `expires` = " . $expires. " WHERE `Agent` = " . (int) $user);
}

//Login function for agent
function isLoggedIn () {
    
$dbUser = "mysqldbuser@webapp-mysqldbserver-6a3bc061-21597";
$dbPass = "52145214aA1";
$dbDatabase = "mysqldatabase21597";
$dbHost = "webapp-mysqldbserver-6a3bc061-21597.mysql.database.azure.com";

$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);

    // session id and hash used to confirm who the user is.
    $sessID = mysqli_real_escape_string($dbConn, session_id());
    $hash = mysqli_escape_string($dbConn, hash("sha512", $sessID.$_SERVER['HTTP_USER_AGENT'])); 
    
    $query = mysqli_query($dbConn, "SELECT `Agent` FROM `users` WHERE `session_id` = '" . $sessID ."' AND `hash` = '". $hash ."' AND `expires` > " .time() . " LIMIT 1");

    
    if (mysqli_num_rows($query)) {
        $data = mysqli_fetch_assoc($query);
        return $data['Agent'];
        
    } else {
        return false;
    }
    
}

//Login function for admin
function adminisLoggedIn () {
    
$dbUser = "mysqldbuser@webapp-mysqldbserver-6a3bc061-21597";
$dbPass = "52145214aA1";
$dbDatabase = "mysqldatabase21597";
$dbHost = "webapp-mysqldbserver-6a3bc061-21597.mysql.database.azure.com";

$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);

//session id and hash used to confirm who the user is.
$sessID1 = mysqli_real_escape_string($dbConn, session_id());
$hash1 = mysqli_escape_string($dbConn, hash("sha512", $sessID1.$_SERVER['HTTP_USER_AGENT']));
    
$query1 = mysqli_query($dbConn, "SELECT `Agent` FROM `users` WHERE `Agent` = '1001' AND `session_id` = '".$sessID1."' AND `expires` > " .time() . " LIMIT 1");
//$query1 = mysqli_query($dbConn, "SELECT `Agent` FROM `users` WHERE `session_id` = '" . $sessID1 ."' AND `hash` = '". $hash1 ."' AND `expires` > " .time() . " LIMIT 1");


    if (mysqli_num_rows($query1)) {
        $data1 = mysqli_fetch_assoc($query1);
        return $data1['Agent'];
        
    } else {
        return false;
    }
    
}



function getUser() {
    
  $dbUser = "mysqldbuser@webapp-mysqldbserver-6a3bc061-21597";
$dbPass = "52145214aA1";
$dbDatabase = "mysqldatabase21597";
$dbHost = "webapp-mysqldbserver-6a3bc061-21597.mysql.database.azure.com";

    $dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);
    
    $user = isLoggedIn();
    
    if ($user) {
        $query = mysqli_query($dbConn, " SELECT `ID`, `Username`, `Name` FROM `agents` WHERE `ID` = " . (int) $user);
        return mysqli_fetch_assoc($query);
        
    } else {
        
        return false;
    }
}

function get($name) {
    return isset ($_REQUEST[$name]) ? $_REQUEST[$name] : '';
}

