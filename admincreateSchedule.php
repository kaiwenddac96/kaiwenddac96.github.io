<?php
require ("header.php");

?>

        <section class="main-container">
            <div class="main-wrapper_signup">
                <h2>Create New Schedule</h2>
                
                <?php
                
                print ("<button type=\"button\" name=\"backButton\" id=\"backButton\" onclick=location='adminHome.php'>Back</button>\n");
                
                 // change action to sign-up
                    print ("<form id=\"createScheduleForm\" method=\"post\" action=\"./createSchedule.inc.php\"> <br/> <br/>\n");
                    print ("<input type=\"text\" name=\"schedule_description\" id=\"schedule_description\" placeholder=\"Description\"/><br/> \n");
                    
                    echo "<br/>Note: Enter Departure and Arrival time as the format: <br/>YY-MM-DD HH:MM:SS<br/>Example: 2017-01-01 12:00:00<br/>\n";
                    
                    print ("<br/><input type=\"text\" name=\"schedule_departure\" id=\"schedule_departure\" placeholder=\"Departure Time\"/> \n");
                    print ("<input type=\"text\" name=\"schedule_arrival\" id=\"schedule_arrival\" placeholder=\"Arrival Time\"/> \n");
                    print ("<input type=\"text\" name=\"schedule_sailingRoute\" id=\"schedule_sailingRoute\" placeholder=\"Sailing Route\"/> \n");
                   // print ("<input type=\"text\" name=\"schedule_ship\" id=\"schedule_ship\" placeholder=\"Ship\"/> \n");
                    
                    $ship = array('Small ship 5000kg', 'Medium ship 7500kg', 'Large ship 10000kg');
                    
                    echo '<select name="ship_type" id="ship_type">';
                        for($i = 0; $i < count ($ship); $i++) {
                            echo '<option>' . $ship[$i] . '</option>';
                        }
                    echo '</select>';
                    
//                    if (get('ship_type') == 'Small ship 5000KG') {
//                        $createSchedule_shipType = 5000;
//                    } else if (get('ship_type') == 'Medium ship 7500KG') {
//                        $createSchedule_shipType = 7500;
//                    } else {
//                        $createSchedule_shipType = 10000;
//                    }
                    print ("<button type=\"submit\" name=\"createScheduleButton\" id=\"createScheduleButton\"> Create </button>\n");
                    print ("</form>\n");
                
                ?>
                
            </div>
            
            
        </section>
        

</body>
</html>