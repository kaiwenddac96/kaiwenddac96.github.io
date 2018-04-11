<?php

require ("header.php");

if (isset($_POST['createScheduleButton'])) {
    
    $createSchedule_desciption = mysqli_real_escape_string($dbConn, $_POST['schedule_description']);
    $createSchedule_departure = mysqli_real_escape_string($dbConn, $_POST['schedule_departure']);
    $createSchedule_arrival = mysqli_real_escape_string($dbConn, $_POST['schedule_arrival']);
    $createSchedule_sailingRoute = mysqli_real_escape_string($dbConn, $_POST['schedule_sailingRoute']);
    
    if (empty($createSchedule_desciption) || empty($createSchedule_departure) || empty($createSchedule_arrival) || empty($createSchedule_sailingRoute)) {
        
        header("Location: ./adminHome.php?createSchedule=empty");
        exit();
    }
    
    if ($_POST['ship_type'] == "Small ship 5000kg") {
                        $createSchedule_shipType = 5000;
                    } else if ($_POST['ship_type'] == "Medium ship 7500kg") {
                        $createSchedule_shipType = 7500;
                    } else {
                        $createSchedule_shipType = 10000;
                    }
    
    
    
    $sql_insert = "INSERT INTO `schedule_route` (`description`, `departure_time`, `arrival_time`, `sailing_route`, `ship`) VALUES ('$createSchedule_desciption', '$createSchedule_departure', '$createSchedule_arrival', '$createSchedule_sailingRoute', '$createSchedule_shipType')";
    mysqli_query($dbConn, $sql_insert);
    
    header("Location: ./adminHome.php?createSchedule=success");
    exit;
    
} else {
    header("Location: ./adminHome.php");
        exit;
}