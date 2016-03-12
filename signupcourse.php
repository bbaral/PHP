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
    $Course_name = @$_POST['Course_name'];
    $Optional = @$_POST['Optional'];
    $Mandatory = @$_POST['Mandatory'];
    $Submit = @$_POST['Submit'];

    //declaring error variable if the form is empty
    $c_nameErr = $opt_Err = $man_Err= "";
    //when user hit submit and all the fields are fill than INSERT into database
    //other through back the error messages to enter in textfield
    if($Submit) {
        if($Course_name==true){
            if($Optional=='Yes' || 'No') {
                if($Mandatory == 'Yes' || 'No') {
                                $conn = mysqli_connect("localhost", "root", "", "CPI310");
                                if(mysqli_connect_errno()){
                                    echo "Fail to Connect to MySql :". mysqli_connect_error();
                                }
                                $insert = mysqli_query($conn, "INSERT INTO Course VALUES ('', '$Course_name','$Optional', '$Mandatory')");

                            }else
                                $c_nameErr= "Course name is empty";

                        } else
                            $opt_Err = "It is required";
                    } else

            $man_Err = "It is required";
    };

    ?>
</head>
<body xmlns:width="http://www.w3.org/1999/xhtml" xmlns:margin="http://www.w3.org/1999/xhtml"
      xmlns="http://www.w3.org/1999/html">
<div id="wrapper">
    <div id="header">
        <h1><em> !!!*****Fill out the info for Course****!!!!</em></h1>
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
            Course Name &nbsp;<input name="Course_name" type="text">
            <span class="error">* <?php echo $c_nameErr;?></span><br><br>
            Optional[Yes or No] &nbsp;<input name="Optional" type="text">
            <span class="error">* <?php echo $opt_Err;?></span><br><br>
            Mandatory[Yes or No] &nbsp;<input name="Mandatory" type="text">
            <span class="error">* <?php echo $man_Err;?></span><br><br>
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
