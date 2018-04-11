<?php

require ("header.php");
?>

<section class="main-container">
            <div class="main-wrapper_signup">
                <h2>My Customer</h2>
                
                <?php

                $user = getUser();
                $agent_name = $user['Name'];
                
                $sql = "SELECT * FROM `customer` WHERE `agent` = '$agent_name' ";
                $result = mysqli_query($dbConn, $sql);
                
                
                echo "<br/></br>\n";
                echo "<table id='viewCurrentSchedule'>
                    <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Item Description</th>
                    <th>Item Weight</th>
                    <th>Schedule ID</th>
                    </tr>";
                 
                while($data = mysqli_fetch_array($result)){
                    
                    echo "<tr>";
                    echo "<td>" . $data['id'] . "</td>";
                    echo "<td>" . $data['customer_name'] . "</td>";
                    echo "<td>" . $data['item_description'] . "</td>";
                    echo "<td>" . $data['item_weight'] . "</td>";
                    echo "<td>" . $data['schedule_id'] . "</td>";

                    echo "</tr>";
                
                }
                
                echo "</table>";
                

                ?>
                
            </div>
            
            
        </section>
        

</body>
</html>