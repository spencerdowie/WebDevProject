<?php
require_once("db.php");

$conn = create_connection();

$sql = "SELECT * FROM products WHERE productCode = ?";
if ($query = $conn->prepare($sql))
{
    $query->bind_param("s", $_GET["id"]);
    $query->execute();
    $result = $query->get_result();
    $car = $result->fetch_all(MYSQLI_ASSOC)[0];
}

//var_dump($car);
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
    <h1>Car Details</h1>
    <h2><?php echo $car["productName"]  ?></h2>
    <p><?php echo $car["productDescription"] ?></p>
</body>

</html>