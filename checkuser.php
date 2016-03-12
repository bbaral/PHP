<?php
/**
 * Created by PhpStorm.
 * User: Bikram
 * Date: 12/5/15
 * Time: 12:12 PM
 */
  require_once 'functions.php';

  if (isset($_POST['Employee_username']))
  {
      $Employee_username   = sanitizeString($_POST['Employee_username']);
      $result = queryMysql("SELECT * FROM Employee WHERE Employee_username='$Employee_username'");

      if ($result->num_rows)
          echo  "<span class='taken'>&nbsp;&#x2718; " .
              "This username is taken</span>";
      else
          echo "<span class='available'>&nbsp;&#x2714; " .
              "This username is available</span>";
  }
?>