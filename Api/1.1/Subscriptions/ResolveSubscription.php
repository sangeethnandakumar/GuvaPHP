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
$result = mysqli_query($conn, "CALL ResolveSubscription('$stash')") or die("Error:" . mysqli_error($conn));


//Output Result Set
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $responce = reset($row);
    if (!startsWith($responce, '#'))
    {
        $data = new stdClass();
        $data = (object)$row;
        echo ComposeResponce('Subscription Resolution Successful', 200, null, $data);
    }
    else
    {
        $conn->next_result();
        $data = ResolveError(ltrim($responce,"#"));
        echo ComposeResponce('Subscription Resolution Failure', 400, $data, null);
        die();
    }
}



?>