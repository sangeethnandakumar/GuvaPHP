<?php
/**
 * Created by PhpStorm.
 * User: Sangee's Lap
 * Date: 6/2/2019
 * Time: 3:20 PM
 */

//Include DB Setup
include '../../../Database/dbconfig.php';


//Parameters
$username = isset($_GET['username']) ? $_GET['username'] : '*';
$password = isset($_GET['password']) ? $_GET['password'] : '*';


//Call PerformLogin(username, password)
$result = mysqli_query($conn, "CALL PerformLogin('$username', '$password')") or
die("Error:" . mysqli_error($conn));

//loop the result set
while ($row = mysqli_fetch_array($result))
{
    $user = (object)$row;
    print_r($user);
}
?>