<?php
require ("header.php");

?>

<section class="main-container">
            <div class="main-wrapper_signup">
                <h2>Schedule</h2>
                
                <?php
                print ("<button type=\"button\" name=\"backButton\" id=\"backButton\" onclick=location='home.php'>Back</button>\n");
                
                $sql = "SELECT * FROM `schedule_route`";
                $result = mysqli_query($dbConn, $sql);
                
                
                print ("<form id=\"customerSelectScheduleForm\" method=\"post\" action=\"./AgentRegisterSchedule.inc.php\"> <br/> <br/>\n");
              //  
                echo "<br/></br>\n";
                echo "<table id='viewCurrentSchedule'>
                    <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Sailing Route</th>
                    <th>Ship remaining weight (kg)</th>
                    <th></th>
                    </tr>";
                 
                while($data = mysqli_fetch_array($result)){
                    
                    echo "<tr>";
                    echo "<td>" . $data['id'] . "</td>";
                    echo "<td>" . $data['description'] . "</td>";
                    echo "<td>" . $data['departure_time'] . "</td>";
                    echo "<td>" . $data['arrival_time'] . "</td>";
                    echo "<td>" . $data['sailing_route'] . "</td>";
                    echo "<td>" . $data['ship'] . "</td>";
                    $data_id = $data['id'];
                    echo"<td>";
                    print ("<button type=\"submit\" name=\"selectSchedule\" id=\"selectSchedule\" value=$data_id >Select</button>\n");
                  //  onclick=location='AgentRegisterSchedule.inc.php'
                    echo "</td>";
                    echo "</tr>";
                
                }
                
                echo "</table>";
                print ("</form>\n");
                

                ?>
                
            </div>
            
            
        </section>
        

</body>
</html>

