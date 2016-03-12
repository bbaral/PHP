<?php
/**
 * Created by PhpStorm.
 * User: Bikram
 * Date: 12/5/15
 * Time: 10:06 PM
 */
//This is by default a homepage. It calls a 'header.php' and in header file. I have declared all the necessary
//variables that is been used here.
//if user loggedin and userid and password matches than it will redirect to view messages
//if it doesn't matches it won't do anythings
require_once 'header.php';

echo "<br><span class='main'>Welcome to $appname,";

if ($loggedin) echo " $Employee_username, you are logged in.";
else           echo ' please sign up and/or log in to join in.';
?>

</span><br><br>
</body>
</html>
