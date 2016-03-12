<?php
/**
 * Created by PhpStorm.
 * User: Bikram
 * Date: 11/25/15
 * Time: 3:07 PM
 */
require_once 'header.php';

if (isset($_SESSION['Employee_username']))
{
    destroySession();
    echo "<div class='main'>You have been logged out. Please " .
        "<a href='header.php'>click here</a> to refresh the screen.";
}
else echo "<div class='main'><br>" .
    "You cannot log out because you are not logged in";
?>

<br><br></div>
</body>
</html>