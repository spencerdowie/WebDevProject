<!DOCTYPE html>
<html>

<head>
    <title>PHP Exercise 2: Links and If Statements</title>
</head>

<body>
    <h1>PHP Exercise 2: Links and If Statements</h1>
    <p>Use PHP echo and variables to output the following link information, use if statements to make sure everything outputs correctly:</p>
    <?php $randomNumber = ceil(rand(1, 3));
    echo '<p>The random number is ' . $randomNumber . '.</p>';

    if ($randomNumber == 1)
    {
        $linkName = 'Codecademy';
        $linkURL = 'https://www.codecademy.com/';
        $linkImage = 'https://raw.githubusercontent.com/Codecademy/docs/main/media/html-image-example.png';
        $linkDescription = 'Learn to code interactively, for free.';
    }
    elseif ($randomNumber == 2)
    {
        $linkName = 'W3Schools';
        $linkURL = 'https://www.w3schools.com/';
        $linkImage = '';
        $linkDescription = 'W3Schools is optimized for learning,testing, and training.';
    }
    else
    {
        $linkName = 'Mozilla Developer Network';
        $linkURL = 'https://www.codecademy.com/';
        $linkImage = '';
        $linkDescription = 'The Mozilla Developer Network (MDN)provides information about Open Web technologies.';
    }

    echo '<h2>' . $linkName . '</h2>';

    echo "<a href='$linkURL'>";
    if ($linkImage != "")
        echo "<img src='$linkImage'>";
    echo "<p>$linkDescription</p>";
    echo "</a>";
    ?>
</body>

</html>