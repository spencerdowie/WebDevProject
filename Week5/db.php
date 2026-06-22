<?php
function create_connection()
{
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "classic_cars";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Connection Failed: " . $conn->connect_error);
    }

    return $conn;
}

// function prepare($conn, ){
//     if ($query = $conn->prepare($sql))
// {
//     $query->bind_param("s", $_GET["id"]);
//     $query->execute();
//     $result = $query->get_result();
//     $car = $result->fetch_all(MYSQLI_ASSOC)[0];
// }
// }