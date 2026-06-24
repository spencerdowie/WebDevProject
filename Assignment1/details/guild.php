<?php
require_once("../db.php");

$guild_id = $_GET["id"];
$guild_name = get_guild_name($guild_id);
$guild_players = get_guild_players($guild_id);
$guild_projects = get_guild_projects($guild_id);

if (count($_POST) > 0)
{

    //There should only be things in 'create_player' if the form has been submitted
    if (isset($_POST["create_player"]))
    {
        create_guild_player($_POST["username"], $guild_id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $guild_name ?></title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
    <header>
        <a href="../index.php" id="back-button">
            &lt; Back</a>
        <h1><?php echo $guild_name ?></h1>
    </header>
    <main>
        <div>
            <h2>Guild Players:</h2>
            <ul>
                <!-- Iterate through all the players in the guild -->
                <?php foreach ($guild_players as $player): ?>
                    <li>
                        <p><?php echo $player["username"] ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <form method="post" action="#">
                <!-- hidden input is used to set the 'create_player' post value that I use to check
                if a new player should be created. This way I don't need to make a new page and can just reload-->
                <input type="hidden" value="<?php echo $guild_id ?>" name="create_player" id="create_player" />
                <div style="margin-bottom: 0.75rem;">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <button type="submit">Add Player</button>
            </form>
        </div>
        <div>
            <h2>Guild Projects:</h2>
            <ul>
                <!-- Iterate through all the projects in the guild -->
                <?php foreach ($guild_projects as $project): ?>
                    <li>
                        <a href="./project.php?id=<?php echo $project["id"] ?>"><?php echo $project["name"] ?></a>
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