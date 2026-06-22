<?php
$hostName = "localhost";
$userName = "root";
$password = "root";

try
{
    $pdo = new PDO("mysql:host={$hostName};dbname=http5126_final", $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Completed Successfully";

    $guildQuery = "SELECT name from guilds WHERE id = :guildID";
    $stm = $pdo->prepare($guildQuery);
    $stm->execute(array("guildID" => $_GET["gID"]));
    $guildName = $stm->fetch(PDO::FETCH_ASSOC);

    $playerQuery = "SELECT username FROM `project_tasks` JOIN players ON player_id = players.id WHERE project_id = :projectID";
    $stm = $pdo->prepare($playerQuery);
    $stm->execute(array("projectID" => $_GET["pID"]));
    $playerResult = $stm->fetchAll(PDO::FETCH_ASSOC);

    $projectQuery = "SELECT * from projects WHERE id = :projectID";
    $stm = $pdo->prepare($projectQuery);
    $stm->execute(array("projectID" => $_GET["pID"]));
    $projectResult = $stm->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $guildName["name"] ?> - Players</title>
</head>

<body>
    <h1><?php echo $guildName["name"] ?></h1>
    <h2><a href="/index.php">
            < Back</a>
    </h2>
    <h2>Players</h2>
    <ol>
        <?php foreach ($playerResult as $player): ?>
            <li>
                <?php echo $player["username"]; ?>
            </li>
        <?php endforeach; ?>
    </ol>
    <h2>Items</h2>
    <ol>
        <?php foreach ($projectResult as $project): ?>
            <li>
                <?php echo $project["name"]; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</body>

</html>