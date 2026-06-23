<?php
function create_connection()
{
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "http5126_final";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Connection Failed: " . $conn->connect_error);
    }

    return $conn;
}

function get_guild_name($guild_id)
{
    $conn = create_connection();

    $sql = "SELECT name FROM guilds WHERE id = ?";
    if ($query = $conn->prepare($sql))
    {
        $query->bind_param("s", $guild_id);
        $query->execute();
        $result = $query->get_result();
        $guild_name = $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    $conn->close();
    return $guild_name["name"];
}

function get_guilds()
{
    $conn = create_connection();

    $sql = "SELECT * FROM guilds";
    if ($query = $conn->prepare($sql))
    {
        $query->execute();
        $result = $query->get_result();
        $guilds = $result->fetch_all(MYSQLI_ASSOC);
    }

    $conn->close();
    return $guilds;
}

function get_guild_players($guild_id)
{

    $conn = create_connection();

    $sql = "SELECT * FROM players WHERE guild_id = ?";
    if ($query = $conn->prepare($sql))
    {
        $query->bind_param("s", $guild_id);
        $query->execute();
        $result = $query->get_result();
        $players = $result->fetch_all(MYSQLI_ASSOC);
    }

    //var_dump($car);
    $conn->close();

    return $players;
}

function get_guild_projects($guild_id)
{

    $conn = create_connection();

    $sql = "SELECT * FROM projects WHERE guild_id = ?";
    if ($query = $conn->prepare($sql))
    {
        $query->bind_param("s", $guild_id);
        $query->execute();
        $result = $query->get_result();
        $projects = $result->fetch_all(MYSQLI_ASSOC);
    }

    //var_dump($car);
    $conn->close();

    return $projects;
}

function get_project($project_id)
{
    $conn = create_connection();

    $sql = "SELECT * FROM projects WHERE id = ?";
    if ($query = $conn->prepare($sql))
    {
        $query->bind_param("s", $project_id);
        $query->execute();
        $result = $query->get_result();
        $project = $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    $conn->close();
    return $project;
}

function get_project_items($project_id)
{

    $conn = create_connection();

    $sql = "SELECT count, fulfilled, item_data.name AS `name` FROM `project_items` JOIN `item_data` ON item_data_id = item_data.id WHERE project_id = ?";
    if ($query = $conn->prepare($sql))
    {
        $query->bind_param("s", $project_id);
        $query->execute();
        $result = $query->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
    }

    //var_dump($car);
    $conn->close();

    return $items;
}

function get_project_tasks($project_id)
{
    $conn = create_connection();

    $sql = "SELECT project_tasks.id AS id, players.username AS username FROM `project_tasks` JOIN players ON player_id = players.id WHERE project_id = ?";
    if ($query = $conn->prepare($sql))
    {
        $query->bind_param("s", $project_id);
        $query->execute();
        $result = $query->get_result();
        $tasks = $result->fetch_all(MYSQLI_ASSOC);
    }

    //var_dump($car);
    $conn->close();

    return $tasks;
}

function get_task_details($task_id)
{
    $test = "SELECT players.username, project_items.count, item_data.name FROM `task_items` JOIN `project_tasks` ON project_tasks_id = project_tasks.id JOIN `players` ON project_tasks.player_id = players.id JOIN project_items ON project_items_id = project_items.id JOIN item_data ON project_items.item_data_id = item_data.id WHERE project_tasks.id = ?;";
    $conn = create_connection();

    $sql = "SELECT project_items.count AS item_count, item_data.name AS item_name FROM `task_items` JOIN `project_tasks` ON project_tasks_id = project_tasks.id JOIN project_items ON project_items_id = project_items.id JOIN item_data ON project_items.item_data_id = item_data.id WHERE project_tasks.id = ?;";
    if ($query = $conn->prepare($sql))
    {
        $query->bind_param("s", $task_id);
        $query->execute();
        $result = $query->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
    }

    //var_dump($car);
    $conn->close();

    return $items;
}
