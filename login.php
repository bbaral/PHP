<?php //File name: "login.php"
/**
 * Created by PhpStorm.
 * User: Bikram
 * Date: 11/25/15
 * Time: 1:13 PM
 */
  require_once 'functions.php';

echo "<title>$appname</title><link rel='stylesheet' " .
    "href='style.css' type='text/css'>";
  $error = $Employee_username = $password = "";

  if (isset($_POST['Employee_username']))
  {
      $Employee_username = sanitizeString($_POST['Employee_username']);
      $password = sanitizeString($_POST['password']);
//if the username and password are left empty than it gives the messages
      if ($Employee_username == "" || $password == "")
          $error = "Not all fields were entered<br>";
      else
      {
          //if username and password matches than it looks at the database, matches it and
          //gives back to the user and he will be able to see his query
          $result = queryMySQL("SELECT Employee_username,password FROM Employee
        WHERE Employee_username='$Employee_username' AND password='$password'");

          if ($result->num_rows == 0)
          {
              $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
          }
          else
          {
              $_SESSION['Employee_username'] = $Employee_username;
              $_SESSION['password'] = $password;
              die("You are now logged in as $Employee_username. Please <a href='view.php?view=$Employee_username'>" .
                  "click here</a> to continue.<br><br>");
          }
      }
  }

  echo <<<_END
  <div id="wrapper">
    <div id="header">
      <!-- This is a title of our project-->
        <h1><em>Welcome to One Percent Database</em></h1>
    </div>
   <div id="section">
   <div class='main'><h3>Please enter your details to log in</h3></div>
        <form action='login.php' method="post" class="form-container">
            <div class="form-title"><h2>Sign In</h2></div>
            <div>
            <div class="form-title">Username</div>
            <input class="form-field" type="text" name="Employee_username"/><br />
                </div>
            <div>
            <div class="form-title">Password</div>
            <input class="form-field" input type="password" name="password"/><br />
            </div>
            <div class="submit-container">
                <input class="submit-button" name="submit" type="submit" value="Submit" />
            </div>
            <div id = "footer">
            Copyright@1%-CPI310
<br>Design by Bikram Baral</br>
    </div>
            </form>
_END;
?>


