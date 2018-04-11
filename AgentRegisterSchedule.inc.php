<?php

require ("header.php");

?>

<section class="main-container">
            <div class="main-wrapper_registerCustomer">
                <h2>Register Customer</h2><br/>
                <h2>Selected Schedule:</h2>
                
                <?php
                print ("<button type=\"button\" name=\"backButton\" id=\"backButton\" onclick=location='AgentviewSchedule.php'>Back</button>\n");
                
                $selectedID = $_POST['selectSchedule'];
                $sql = "SELECT * FROM `schedule_route` WHERE `id` = '$selectedID' ";
                $result = mysqli_query($dbConn, $sql);
                
                
              //  print ("<form id=\"registerCustomerForm\" method=\"post\" > <br/> <br/>\n");
              //  action=\"./signup.inc.php\"
                echo "<br/></br>\n";
                echo "<table id='viewCurrentSchedule'>
                    <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Sailing Route</th>
                    <th>Ship remaining weight (kg)</th>
                    </tr>";
                 
                while($data = mysqli_fetch_assoc($result)){
    
                    echo "<tr>";
                    echo "<td>" . $data['id'] . "</td>";
                    echo "<td>" . $data['description'] . "</td>";
                    echo "<td>" . $data['departure_time'] . "</td>";
                    echo "<td>" . $data['arrival_time'] . "</td>";
                    echo "<td>" . $data['sailing_route'] . "</td>";
                    echo "<td>" . $data['ship'] . "</td>";
                    $data_id = $data['id'];
                    echo "</tr>";
                
                }
                
                echo "</table>";
                
                print ("<form id=\"registerCustomerForm\" method=\"post\" action=\"./customerRegister.inc.php\"> <br/> <br/>\n");
                print ("<input type=\"text\" name=\"customer_name\" id=\"customer_name\" placeholder=\"Customer's Name\"/><br/> \n");
                print ("<input type=\"text\" name=\"item_description\" id=\"item_description\" placeholder=\"Item Desciption\"/><br/> \n");
                print ("<input type=\"text\" name=\"item_weight\" id=\"item_weight\" placeholder=\"Item Weight (KG)\"/><br/> \n");
                
                echo "<br/>Note: Only enter the NUMBER in item weight text.<br/><br/>\n";
                
                print ("<button type=\"submit\" name=\"registerCustomerButton\" id=\"registerCustomerButton\" value=$selectedID> Confirm </button>\n");
                print ("</form>");

                ?>
                
            </div>
            
            
        </section>
        

</body>
</html>

