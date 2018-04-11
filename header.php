<!DOCTYPE html> 
<html>
    <head>
        <title>DDAC</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    
    
    <body>
        
    <header>
        <nav>
            <div class="main-wrapper">
                <ul>
<!--                    <li><a href="index.php">Home</a></li>-->
                </ul>
                
                <div class="nav-login">
                <?php

                require ("header.inc.php");

               if (!isLoggedIn() && !adminisLoggedIn()){

                    
                    print ("<form id=\"loginForm\" method=\"post\" action=\"./login.php\"> <br/> <br/>\n");
                    print ("<input type=\"text\" name=\"username\"  id=\"username\" placeholder=\"Username\"/>\n ");
                    print ("<input type=\"password\" name=\"password\" placeholder=\"Password\"/> \n");
                    print ("<button type=\"submit\" name=\"submitButton\" id=\"submitButton\"> Login </button>\n");
                    print ("</form>\n");
                    
               } else if (isLoggedIn()) {

                    $user = getUser();
                    //echo "<h1>Hey ". $user['Name'] ." </h1>\n";

                    print ("<h2></h2><br/><br/>\n");
                    print ("<form id=\"logoutForm\" method=\"post\" action=\"./login.php\">\n");
                    print ("<button type=\"submit\" name=\"logoutButton\" id=\"logoutButton\">Logout </button>\n");
                    print ("</form>\n");
                    
                    print ("<button type=\"button\" name=\"AgentviewSchedule\" id=\"AgentviewSchedule\" onclick= location='AgentviewSchedule.php'>View Schedule</button>\n");

                } else if (adminisLoggedIn()) {
                   //echo "<h1>Welcome Admin !</h1>\n";
                    
                    print ("<br/><br/>\n");
                    print ("<form id=\"logoutForm1\" method=\"post\" action=\"./login.php\">\n");
                    print ("<button type=\"submit\" name=\"adminlogoutButton\" id=\"adminlogoutButton\">Logout </button>\n");
                    print ("</form>\n");
                    
                    
                    print ("<button type=\"button\" name=\"viewSchedule\" id=\"viewSchedule\" onclick= location='viewSchedule.php'>View Schedule</button>\n");
                    
                    print ("<button type=\"button\" name=\"createSchedule\" id=\"createSchedule\" onclick= location='admincreateSchedule.php'>Define New Schedule</button>\n");
                    
                    print ("<button type=\"button\" name=\"approveAgentSchedule\" id=\"approveAgentSchedule\" onclick= location='admin_approveAgentSchedule.php'>Approve Schedule from Agent</button>\n");
                }

                ?>
                </div>
            </div>
        </nav>
    </header>

<?php

