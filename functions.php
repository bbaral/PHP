    <?php
    /**
     * Created by PhpStorm.
     * User: Bikram
     * Date: 11/3/15
     * Time: 1:27 PM
     */
/*    * Create the connection to the database
    * $Connection Variable stores the Connection
    * If it fails display, it display the error 'Connection Error'*/

    $DB_Server = "localhost";  //Server Location or IP Address.
    $DB_User = "root";         //Database Username.
    $DB_Pass = "";             //Database Password.
    $DB_Name = "CPI310";       //Database Name.
    $appname = "One Percent Database"; //Name of Application

    $connection = new mysqli($DB_Server,$DB_User,$DB_Pass,$DB_Name);
    if($connection->connect_error) die($connection->connect_error);


    function queryMysql($query)
    {
        global $connection;
        $result = $connection->query($query);
        if (!$result) die($connection->error);
        return $result;
    }

    function destroySession()
    {
        $_SESSION=array();

        if (session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time()-2592000, '/');

        session_destroy();
    }

    function sanitizeString($var)
    {
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
        return $connection->real_escape_string($var);
    }
//check the username to see if it matches or not
    function showProfile($Employee_username)
    {
        if(user_exist('$Employee_username'))
        $result = queryMysqli("SELECT * FROM Employee WHERE user='$Employee_username'");
        //check the row from the select category and by fetching the array
        if ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo stripslashes($row['Employee_username']) . "<br style='clear:left;'><br>";
        }
    }
    ?>
