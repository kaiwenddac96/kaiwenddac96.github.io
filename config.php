<?php

$dbUser = "mysqldbuser@webapp-mysqldbserver-6a3bc061-21597";
$dbPass = "52145214aA1";
$dbDatabase = "mysqldatabase21597";
$dbHost = "webapp-mysqldbserver-6a3bc061-21597.mysql.database.azure.com";

$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);

if (mysqli_connect_errno()){
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//if ($dbConn) {
//    mysqli_select_db($dbConn,$dbDatabase);
//    //echo "Successfully connected to database.";
//} else {
//    die("<strong> Error: </strong> Could not connect to database!");
//    
//}


