<?php
require_once("./db.php");
$guild_id = -1;
$back_url = "./index.php";

if (count($_POST) > 0)
{
    $guild_id = $_POST["guild_id"];
    $back_url = "./details/guild.php?id=" . $guild_id;
}

$guilds = get_guilds();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
</head>

<body>
    <header></header>
    <a href="<?php echo $back_url ?>">
        &lt; Back</a>
    <h1>New Project:</h1>
    <form action="#" method="post">
        <div style="margin-bottom: 0.75rem;">
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div style="margin-bottom: 0.75rem;"><label for="province">Province</label><select name="province" id="province">
                <option value="-1">--Select Guild--</option>
                <?php foreach ($guilds as $guild): ?>
                    <option value="<?php echo $guild["id"] ?>"><?php echo $guild["name"] ?></option>
                <?php endforeach ?>
            </select>
            <?php if (isset($provinceInvalid)): ?>
                <div style="color: red;"><?php echo $provinceInvalid ?></div>
            <?php endif; ?>
        </div>
    </form>
</body>

</html>