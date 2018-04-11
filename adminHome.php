<?php
require ("header.php");

?>

        <section class="main-container">
            <div class="main-wrapper_signup">
                <h2>Register Agent</h2>
                
                <?php
                
                 // change action to sign-up
                    print ("<form id=\"signupForm\" method=\"post\" action=\"./signup.inc.php\"> <br/> <br/>\n");
                    print ("<input type=\"text\" name=\"signup_username\"  id=\"signup_username\" placeholder=\"Username\"/>\n ");
                    print ("<input type=\"password\" name=\"signup_password\" placeholder=\"Password\"/> \n");
                    print ("<input type=\"text\" name=\"signup_name\" placeholder=\"Name\"/> \n");
                    print ("<button type=\"submit\" name=\"signupsubmitButton\" id=\"signupsubmitButton\"> Register </button>\n");
                    print ("</form>\n");
                
                ?>
                
            </div>
            
            
        </section>
        

</body>
</html>