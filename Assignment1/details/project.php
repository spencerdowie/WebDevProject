<?php
require_once("../db.php");

$project_id = $_GET["id"];
$project = get_project($project_id);
$project_items = get_project_items($project_id);
$project_tasks = get_project_tasks($project_id);
$task_details = [];

//This allows the task details to be referenced by the task ids.
//I could made a class to hold the id, username, and details but
//this should cover all I need for now.
foreach ($project_tasks as $task)
{
    $task_details[$task["id"]] = get_task_details($task["id"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $project["name"] ?></title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
    <header>
        <!-- Back button uses the guild_id from the selected project to know where to return to -->
        <a href="./guild.php?id=<?php echo $project["guild_id"] ?>" id="back-button">
            &lt; Back</a>
        <h1><?php echo $project["name"] ?></h1>
    </header>
    <main>
        <div>
            <h2>Project Items:</h2>
            <ul>
                <!-- Iterate through all the items in the project -->
                <?php foreach ($project_items as $item): ?>
                    <li>
                        <p><?php echo $item["name"] . ": " . $item["count"] ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h2>Project Tasks:</h2>
            <ul>
                <!-- Iterate through all the tasks in the project -->
                <?php foreach ($project_tasks as $task): ?>
                    <li>
                        <p><?php echo $task["username"] ?></p>
                        <ul>
                            <!-- Iterate through all the items in the task -->
                            <?php foreach ($task_details[$task["id"]] as $detail): ?>
                                <li><?php echo $detail["item_name"] . ": " . $detail["item_count"] ?></li>
                            <?php endforeach; ?>
                        </ul>
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