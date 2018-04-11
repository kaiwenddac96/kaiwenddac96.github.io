<?php
require ("header.php");

?>

        <section class="main-container">
            <div class="main-wrapper_signup">
                <h2 style="font-size: 30px">Approve the Schedule from Agent:</h2>
                
                <?php
                
                print ("<button type=\"button\" name=\"backButton\" id=\"backButton\" onclick=location='adminHome.php'>Back</button>\n");
                
                $sql = "SELECT * FROM `customer` WHERE `status` = '0'";
                $result = mysqli_query($dbConn, $sql);
                
                print ("<form id=\"approveForm\" method=\"post\" action=\"./approve.inc.php\"> <br/> <br/>\n");
                echo "<table id='approveAgentScheduletable'>
                    <tr>
                    <th>Agent Name</th>
                    <th>Customer Name</th>
                    <th>Item Description</th>
                    <th>Weight</th>
                    <th>Schedule ID</th>
                    <th></th>
                    </tr>";
                 
                while($data = mysqli_fetch_array($result)){
                    
                    echo "<tr>";
                    echo "<td>" . $data['agent'] . "</td>";
                    echo "<td>" . $data['customer_name'] . "</td>";
                    echo "<td>" . $data['item_description'] . "</td>";
                    echo "<td>" . $data['item_weight'] . "</td>";
                    echo "<td>" . $data['schedule_id'] . "</td>";
                    
                    $schedule_id = $data['schedule_id'];
                    $intweight = $data['item_weight'];
                    print ("<input type=\"hidden\" name=\"hiddendata\" id=\"hiddendata\" value=$schedule_id />\n");
                    print ("<input type=\"hidden\" name=\"hiddendata1\" id=\"hiddendata1\" value=$intweight />\n");
                
                    $data_id = $data['id'];
                    echo"<td>";
                    print ("<button type=\"submit\" name=\"approve\" id=\"approve\" value=$data_id >Approve</button>\n");
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