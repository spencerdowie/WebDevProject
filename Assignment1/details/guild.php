<?php
require_once("../db.php");

$guild_id = $_GET["id"];
$guild_name = get_guild_name($guild_id);
$guild_players = get_guild_players($guild_id);
$guild_projects = get_guild_projects($guild_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $guild_name ?></title>
</head>

<body>
    <header></header>
    <a href="../index.php">
        &lt; Back</a>
    <h1><?php echo $guild_name ?></h1>
    <h2>Guild Players:</h2>
    <ul>
        <?php foreach ($guild_players as $player): ?>
            <li>
                <p><?php echo $player["username"] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="post" action="../create_player.php">
        <input type="hidden" value="<?php echo $guild_id ?>" name="guild_id" id="guild_id" />
        <button type="submit">Add Player</button>
    </form>
    <h2>Guild Projects:</h2>
    <ul>
        <?php foreach ($guild_projects as $project): ?>
            <li>
                <a href="./project.php?id=<?php echo $project["id"] ?>"><?php echo $project["name"] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>