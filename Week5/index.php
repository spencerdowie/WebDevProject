<?php
require_once("db.php");

$conn = create_connection();

$sql = "SELECT productName, productCode FROM products";
$result = $conn->query($sql);

$products = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Cars</title>
</head>

<body>
    <h1>Classic Cars Store</h1>
    <h2>Products in Stock:</h2>
    <ul>
        <?php foreach ($products as $row): ?>
            <li>
                <p><?php echo $row["productName"] ?></p>
                <a href="./details.php?id=<?php echo $row["productCode"] ?>">Details</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>