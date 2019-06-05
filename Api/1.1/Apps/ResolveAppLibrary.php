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
$result = mysqli_query($conn, "CALL ResolveAppLibrary('$stash')") or die("Error:" . mysqli_error($conn));

$apps = array();

//Output Result Set
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $responce = reset($row);
    if (!startsWith($responce, '#'))
    {
        $app = new stdClass();
        $app=(object)$row;
        $apps[] = $app;
    }
    else
    {
        $conn->next_result();
        $data = ResolveError(ltrim($responce,"#"));
        echo ComposeResponce('Log Request Failure', 400, $data, null);
        die();
    }
}


echo ComposeResponce('Log Request Successful', 200, null, $apps);


?>