<?php
$dayOfTheWeek = date("1");
$dayOfTheWeek = "Monday";

if ($dayOfTheWeek == "Wednesday")
{
    $message = "Today is Wednesday";
}
else
{
    $message = "It is not Wednesday";
}

$isAdmin = true;
$stats = "";
$editButton = "";
if ($isAdmin == true)
{
    $stats = "<div>Publish Statsus: Published</div><div>Views: 300</div><div>Categories: News, Travel";
    $editButton = "<div><a href=\"#\"><button></buton></a></div>";
    $adminViewMessage = "<div><strong>Admin View</strong></div>";

    if ($dayOfTheWeek == "Wednesday")
    {
        $message = "Today is Wednesday and you're the admin";
    }
}

$imgSrc = "https://www.w3schools.com/html/pic_trulli.jpg";
$img = "<img src=\"$imgSrc\">";

function img($src)
{
    echo "<img src=\"$src\">";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 3 - In-class</title>
</head>

<body>
    <h1>Week 3</h1>
    <p><?php echo $message ?></p>
    <h2>Article</h2>
    <!-- <?php echo $img ?> -->
    <!-- <img src=<?php echo $imgSrc ?>> -->
    <?php img($imgSrc) ?>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p><?php echo $stats ?></p>
</body>

</html>