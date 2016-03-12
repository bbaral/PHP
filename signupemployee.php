<html xmlns="http://www.w3.org/1999/html">
<head>

<?php
echo '<link href="style.css" rel="stylesheet">';
/**
 * Created by PhpStorm.
 * User: Bikram
 * Date: 11/4/15
 * Time: 12:21 PM
 */
include('functions.php');
//declaring the variables to post on the database
$Employee_username = @$_POST['Employee_username'];
$Employee_email = @$_POST['Employee_email'];
$password = @$_POST['password'];
$repeatpassword = @$_POST['repeatpassword'];
$first_name = @$_POST['first_name'];
$last_name = @$_POST['last_name'];
$certificate = @$_POST['certificate'];
$Course_name = @$_POST['Course_name'];
$Submit = @$_POST['Submit'];

//declaring error variable if the form is empty
$Em_unameErr = $Em_emailErr = $Em_passErr = $Em_passrepErr = $Em_firstErr = $Em_lastErr = $Course_Err= "";
//when user hit submit and all the fields are fill than INSERT into database
//other through back the error messages to enter in textfield
if($Submit) {
    if($Employee_username==true){
        if($Employee_email==true) {
            if($password==true) {
                if($first_name==true){
                    if($last_name==true){
                        if($password==$repeatpassword){
                            $conn = mysqli_connect("localhost", "root", "", "CPI310");
                            if(mysqli_connect_errno()){
                                echo "Fail to Connect to MySql :". mysqli_connect_error();
                            }
                            $insert = mysqli_query($conn, "INSERT INTO Employee VALUES ('', '$Employee_username','$Employee_email', '$password', '$first_name', '$last_name', '$certificate', '$Course_name')");

                        }else
                            $Em_passrepErr= "Your password doesn't match";

                    } else
                        $Em_lastErr = "Last name is required";
                } else
                    $Em_firstErr="First name is required";
            } else
                $Em_passErr="password is required";
        } else
            $Em_emailErr= "email is required";
    } else
        $Em_unameErr= "username is required";
};

?>
</head>
<body xmlns:width="http://www.w3.org/1999/xhtml" xmlns:margin="http://www.w3.org/1999/xhtml"
      xmlns="http://www.w3.org/1999/html">
<div id="wrapper">
    <div id="header">
        <h1><em> !!!*****This Registration is for Employee Only****!!!!</em></h1>
    </div>
<form method = "post" style="background-color:transparent; color: white">
    <style>
        p {
            color: #009900;
            font-family: "comic sans ms", sans-serif;
            text-align: center;
        }
        .error {
            color: #FF0000;
        }
    </style>
   <p>
       <span class="error">* required field</span><br><br>
    User Name &nbsp;<input name="Employee_username" type="text">
       <span class="error">* <?php echo $Em_unameErr;?></span><br><br>
    Email &nbsp;<input name="Employee_email" type="text">
       <span class="error">* <?php echo $Em_emailErr;?></span><br><br>
    Password &nbsp;<input name="password" input type="password">
       <span class="error">* <?php echo $Em_passErr;?></span><br><br>
    Repeat Password &nbsp;<input name="repeatpassword" input type="password">
       <span class="error">* <?php echo $Em_passrepErr;?></span><br><br>
    First Name &nbsp;<input name="first_name" type="text">
       <span class="error">* <?php echo $Em_firstErr;?></span><br><br>
    Last Name &nbsp;<input name="last_name" type="text">
       <span class="error">* <?php echo $Em_lastErr;?></span><br><br>
    Certificate &nbsp;<input name="certificate" type="text"><br><br>
       Course Name &nbsp;<input name="Course_name" type="text">
       <span class="error">* <?php echo $Course_Err;?></span><br><br>
    <input class="submit-button" name="Submit" type="Submit" value="Submit">
    </p>
</form>
    </div>
<div id="footer">
    Copyright@1%-CPI310
    <br>Design by Bikram Baral</br>
</div>
</body>
</html>
