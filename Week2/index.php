<?php
$hostName = "localhost";
$userName = "root";
$password = "root";

try
{
    $pdo = new PDO("mysql:host={$hostName};dbname=http5126_final", $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Completed Successfully";

    $query = "SELECT * from guilds";
    $stm = $pdo->prepare($query);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    //echo "<br/>";

    //var_dump($result);
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
    <title>Guilds</title>
</head>

<body>
    <h1>Guilds</h1>
    <ol>
        <?php foreach ($result as $guild): ?>
            <li>
                <a href="/guild.php?gID=<?php echo $guild["id"] ?>">
                    <?php echo $guild["name"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ol>
</body>

</html>