<?php
require_once("db.php");

$conn = create_connection();

$sql = "SELECT id, name FROM guilds";
$result = $conn->query($sql);

$guilds = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FFXIV</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <header>
        <h1>FFXIV GUILDS</h1>
    </header>
    <main>
        <div>
            <h2>Current Guilds:</h2>
            <ul>
                <!-- Iterates through all of the guilds in the database -->
                <?php foreach ($guilds as $guild): ?>
                    <li>
                        <a href="./details/guild.php?id=<?php echo $guild["id"] ?>"><?php echo $guild["name"] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>
    <footer>
        <div id="copyright">
            &copy;Copyright 2026 Spencer Dowie all rights reserved
        </div>
    </footer>
</body>

</html>