<!DOCTYPE html>
<html>

<head>
    <title>PHP Exercise 1: Links and Variables</title>
</head>

<body>
    <h1>PHP Exercise 1: Links and Variables</h1>
    <p>Use PHP echo to output the following link information:</p>

    <hr>

    <?php

    $linkName = 'Codecademy';
    $linkURL = 'https://www.codecademy.com/';
    $linkImage = 'https://static-assets.codecademy.com/Courses/intro-to-ui-and-ux/wireframes/Codecademy_navy.svg';
    $linkDescription = 'Learn to code interactively, for free.';

    ?>
    <h1><?php echo $linkName ?></h1>
    <p><?php echo $linkDescription ?></p>
    <img src="<?php echo $linkImage ?>" width="300px">
    <p><a href="<?php echo $linkURL ?>">Visit Codecademy</a></p>
</body>

</html>