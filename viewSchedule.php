<?php
require ("header.php");

?>

        <section class="main-container">
            <div class="main-wrapper">
                <h2>Schedule</h2>
                
                <?php
                print ("<button type=\"button\" name=\"backButton\" id=\"backButton\" onclick=location='adminHome.php'>Back</button>\n");
                
                $sql = "SELECT * FROM `schedule_route`";
                $result = mysqli_query($dbConn, $sql);
                
                echo "<br/></br>\n";
                echo "<table id='viewCurrentSchedule'>
                    <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Sailing Route</th>
                    <th>Ship</th>      
                    </tr>";
                 
                while($data = mysqli_fetch_array($result)){
                    
                    echo "<tr>";
                    echo "<td width='200'>" . $data['id'] . "</td>";
                    echo "<td>" . $data['description'] . "</td>";
                    echo "<td>" . $data['departure_time'] . "</td>";
                    echo "<td>" . $data['arrival_time'] . "</td>";
                    echo "<td>" . $data['sailing_route'] . "</td>";
                    echo "<td>" . $data['ship'] . "</td>";
                    echo "</tr>";
                
                }
                
                echo "</table>";

                

                ?>
                
            </div>
            
            
        </section>
        

</body>
</html>