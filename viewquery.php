<?php
/**
 * Created by PhpStorm.
 * User: Bikram
 * Date: 11/24/15
 * Time: 1:07 PM
 */
require_once 'functions.php';
function viewQueryResult($DB_Name, $strQuery) {
    $DB_Server = 'localhost';
    $DB_User = "root";  //Database Username. Should be "root" unless you modified it or using shared hosting
    $DB_Pass = "";     //Database Password.
    $DB_Name = "CPI310";

    //connecting to database
    $mysqli = mysqli_connect($DB_Server, $DB_User, $DB_Pass, $DB_Name);

    //printing query result
    $result = mysqli_query($mysqli, $strQuery) or die("Connect connect ot DB");

    echo "<table border>";
    echo "<tr>";

    while($field = @mysqli_fetch_field ($result)) {
        echo "<th>";
        //print_r($field)
        echo $field->name;
        echo"</tr>";
    }
    echo"</tr>";

    while($data = @mysqli_fetch_field($result)) {
        echo "<tr>";

        for ($i=0; $i<(count($data)); $i++){
            echo "<td>";
            echo $data[$i];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqi_close($mysqli);

}
?>