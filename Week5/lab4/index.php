<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "soccer";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if ($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}
$query = "SELECT * FROM teams ORDER BY name";
$stmt = $conn->query($query);
$teams = $stmt->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soccer Teams</title>
</head>

<body>
    <h1>Soccer Teams</h1>
    <?php foreach ($teams as $team): ?>
        <div>
            <h3><?php echo $team["name"] ?></h3><br>
            <h4><?php echo "#{$team["ranking"]} - {$team["league"]}" ?></h4>
        </div>
        <hr>
    <?php endforeach ?>

</body>

</html>