<?php
/**
 * Test file
 */

$menuItemsPrice = array(array("name" => "Pizza", "price" => 3.99));

/**
 * Converts CAD float value to USD, rounds to 2 decimal places
 * @param float $cadPrice Price in CAD to convert
 * @return float Price in USD rounded to 2 decimal places
 */
function convertToUSD($cadPrice)
{
    return round($cadPrice * 0.72, 2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
</head>

<body>
    <h1>My Restaurant</h1>
    <h2>Menu</h2>
    <ul>
        <?php foreach ($menuItemsPrice as $value)
        {
            echo '<li>' . $value['name'] . ' - $' . $value['price'] . '</li>';
        }
        ?>
    </ul>
</body>

</html>