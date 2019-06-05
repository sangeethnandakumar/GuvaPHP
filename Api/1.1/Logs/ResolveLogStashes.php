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
$userid = isset($_GET['userid']) ? $_GET['userid'] : '0';

if($userid=='')
{
    $userid=0;
}

//Call PerformLogin(username, password)
$result = mysqli_query($conn, "CALL ResolveLogStashes('$userid')") or die("Error:" . mysqli_error($conn));

$logs = array();

//Output Result Set
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $responce = reset($row);
    if (!startsWith($responce, '#'))
    {
        $data = new stdClass();
        $data=(object)$row;
        $logs[] = $data;
    }
    else
    {
        $conn->next_result();
        $data = ResolveError(ltrim($responce,"#"));
        echo ComposeResponce('Log Request Failure', 400, $data, null);
        die();
    }
}


echo ComposeResponce('Log Request Successful', 200, null, $logs);


?>