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
$username = isset($_GET['username']) ? $_GET['username'] : '*';
$password = isset($_GET['password']) ? $_GET['password'] : '*';


//Call PerformLogin(username, password)
$result = mysqli_query($conn, "CALL PerformLogin('$username', '$password')") or die("Error:" . mysqli_error($conn));


//Output Result Set
while ($row = mysqli_fetch_array($result))
{
    $responce = reset($row);
    if (!startsWith($responce, '#'))
    {
        $data = new stdClass();
        $data->stash = $responce;
        echo ComposeResponce('Authentication Successful', 200, null, $data);
    }
    else
    {
        $conn->next_result();
        $data = ResolveError(ltrim($responce,"#"));
        echo ComposeResponce('Authentication Failure', 400, $data, null);
    }
}



?>