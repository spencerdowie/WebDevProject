<?php
function create_connection()
{
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "contact";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Connection Failed: " . $conn->connect_error);
    }

    return $conn;
}