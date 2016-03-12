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

    $username = @$_POST['username'];
    $email = @$_POST['email'];
    $password = @$_POST['password'];
    $repeatpassword = @$_POST['repeatpassword'];
    $first_name = @$_POST['first_name'];
    $last_name = @$_POST['last_name'];
    $position = @$_POST['position'];
    $Submit = @$_POST['Submit'];

    $Mn_unameErr = $Mn_emailErr = $Mn_passErr = $Mn_passrepErr = $Mn_firstErr = $Mn_lastErr = $Mn_posiErr = "";

    if($Submit) {
        if($username==true){
            if($email==true) {
                if($password==true) {
                    if($first_name==true){
                        if($last_name==true){
                            if($position == true) {
                                if ($password == $repeatpassword) {
                                    $conn = mysqli_connect("localhost", "root", "", "CPI310");
                                    if (mysqli_connect_errno()) {
                                        echo "Fail to Connect to MySql :" . mysqli_connect_error();
                                    }
                                    $insert = mysqli_query($conn, "INSERT INTO Manager VALUES ('', '$username','$email', '$password', '$first_name', '$last_name', '$position')");

                                } else
                                    $Mn_passrepErr = "Your password doesn't match";

                            }else
                                $Mn_posiErr = "Position is required";

                        } else
                            $Mn_lastErr = "Last name is required";
                    } else
                        $Mn_firstErr="First name is required";
                } else
                    $Mn_passErr="password is required";
            } else
                $Mn_emailErr= "email is required";
        } else
            $Mn_unameErr= "username is required";
    };

    ?>
</head>
<body xmlns:width="http://www.w3.org/1999/xhtml" xmlns:margin="http://www.w3.org/1999/xhtml"
      xmlns="http://www.w3.org/1999/html">
<div id="wrapper">
    <div id="header">
        <h1><em> !!!*****This Registration is for Manager Only****!!!!</em></h1>
    </div>
    <form method = "post" style="background-color:transparent; color:white">
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
            User Name &nbsp;<input name="username" type="text">
            <span class="error">* <?php echo $Mn_unameErr;?></span><br><br>
            Email &nbsp;<input name="email" type="text">
            <span class="error">* <?php echo $Mn_emailErr;?></span><br><br>
            Password &nbsp;<input name="password" type="password">
            <span class="error">* <?php echo $Mn_passErr;?></span><br><br>
            Repeat Password &nbsp;<input name="repeatpassword" type="password">
            <span class="error">* <?php echo $Mn_passrepErr;?></span><br><br>
            First Name &nbsp;<input name="first_name" type="text">
            <span class="error">* <?php echo $Mn_firstErr;?></span><br><br>
            Last Name &nbsp;<input name="last_name" type="text">
            <span class="error">* <?php echo $Mn_lastErr;?></span><br><br>
            Position &nbsp;<input name="position" type="text"><br><br>
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
