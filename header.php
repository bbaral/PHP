
<?php
session_start();
echo "<!DOCTYPE html>\n<html><head>";

require_once 'functions.php'; //need this line to configure the connection

if (isset($_SESSION['Employee_username']))
{
    $Employee_username= $_SESSION['Employee_username'];
    $loggedin = TRUE;
}
else $loggedin = FALSE;

echo "<title>$appname</title><link rel='stylesheet' " .
    "href='style.css' type='text/css'>";
//if the user is logged in it display Home, Edit Profile and logout
//but for some reason, it wont work. There must be a minor error. I spend good amout of time
//to figure it out but couldn't do make it works
if ($loggedin)
{
    echo ('<div id="wrapper">
        <div id="header">
      <!-- This is a banner of my project-->
        <h1><em>Welcome to One Percent Database</em></h1>
    </div>'
    );
    echo "<br ><ul class='menu'>" .
        "<li><a href='members.php'>Home</a></li>" .
        "<li><a href='profile.php'>Edit Profile</a></li>"    .
        "<li><a href='logout.php'>Log out</a></li></ul><br>";
    echo ('<div id="footer">
    Copyright@1%-CPI310
<br>Design by Bikram Baral</br>
    </div>');
    //echo '</div>';
}
else
{
    echo ('<div id="wrapper">
        <div id="header">
      <!-- This is a banner of my project-->
        <h1><em>Welcome to One Percent Database</em></h1>
    </div>'
    );
//below code is associated with index.php. since it checked wheather the
    //user has logged in or not. If not logged in than display this code
    //
    echo ("<br><ul class='menu'>" .
        "<li><a href='header.php' style='text color:#f6fff7; text-align:left;'>Home</a></li>" .
        "<li><a href='signupemployee.php' style='color:#f6fff7; text-align:center;'>Sign up</a></li>"    .
        "<li><a href='login.php' style='color:#f6fff7; text-align:right;'>Log in</a></li></ul><br>"     .
        "<span class='info' style='color:#f6fff7;'>&#8658; You must be logged in to " .
        "access the database.</span><br><br>");
    //<!--This should display on bottom of homepage -->
    echo ('<div id="footer">
    Copyright@1%-CPI310
<br>Design by Bikram Baral</br>
    </div>');
    //echo '</div>';
}
?>
