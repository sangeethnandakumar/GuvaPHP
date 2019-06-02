<?php
/**
 * Created by PhpStorm.
 * User: Sangee's Lap
 * Date: 6/2/2019
 * Time: 3:47 PM
 */

//Setup DB
$servername = "localhost";
$username = "root";
$password = "";
$database = "guava";

//Connect to DB
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error)
{
    die("Error:Can't connect");
}