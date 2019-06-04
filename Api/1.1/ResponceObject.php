<?php
/**
 * Created by PhpStorm.
 * User: Sangee's Lap
 * Date: 6/2/2019
 * Time: 9:30 PM
 */

function ComposeResponce($message = null, $code = 200, $errordata = null, $data = null)
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        500 => '500 Internal Server Error'
    );
    // ok, validation error, or failure
    header('Status: '.$status[$code]);
    // return the encoded json
    return json_encode(array(
        'status' => $code < 300, // success or not?
        'message' => $message,
        'error' => $errordata,
        'data' => $data
    ));
}

function ResolveError($error)
{
    global $conn;
    global $result;
    $result->close();

    $result = mysqli_query($conn, "call ResolveErrorCode('$error')") or die("Error:" . mysqli_error($conn));
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $responce = new stdClass();
    $responce = (object)$row;
    return $responce;
}


function startsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
}
?>