<?php
require_once("../db.php");

$project_id = $_GET["id"];
$project = get_project($project_id);
$project_items = get_project_items($project_id);
$project_tasks = get_project_tasks($project_id);
$task_details = [];

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
</head>

<body>
    <header></header>
    <a href="./guild.php?id=<?php echo $project["id"] ?>">
        &lt; Back</a>
            <h1><?php echo $project["name"] ?></h1>
            <h2>Project Items:</h2>
            <ul>
                <?php foreach ($project_items as $item): ?>
                    <li>
                        <p><?php echo $item["name"] . ": " . $item["count"] ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h1>Project Tasks:</h1>
            <ul>
                <?php foreach ($project_tasks as $task): ?>
                    <li>
                        <p><?php echo $task["username"] ?></p>
                        <ul>
                            <?php foreach ($task_details[$task["id"]] as $detail): ?>
                                <li><?php echo $detail["item_name"] . ": " . $detail["item_count"] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
</body>

</html>