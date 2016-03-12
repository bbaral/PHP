<?php
session_start();
$name=$_SESSION['Employee_username'];
echo'welcome :'. $Employee_username.'<br>';
echo'<a href="signout.php">Signout</a>';
?>