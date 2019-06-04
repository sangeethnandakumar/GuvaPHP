<?php
/**
 * Created by PhpStorm.
 * User: Sangee's Lap
 * Date: 6/2/2019
 * Time: 3:20 PM
 */

//Include DB Setup
include '../../../Database/dbconfig.php';
include '../ResponceObject.php';

//Parameters
$stash = isset($_GET['stash']) ? $_GET['stash'] : '*';

//Call PerformLogin(username, password)
$result = mysqli_query($conn, "CALL PerformLogout('$stash')") or
die("Error:" . mysqli_error($conn));

echo 'Logged Out';
?>