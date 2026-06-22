<?php
require_once("db.php");
$isValid = true;
if (isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    if ($name == null || $name == "" || strlen($name) > 100)
    {
        $isValid = false;
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100)
    {
        $isValid = false;
    }
    if (empty($message) || strlen($message) > 1000)
    {
        $isValid = false;
    }

    if ($isValid == true)
    {
        $conn = create_connection();

        $sql = "INSERT INTO contact_log (name, email, message) VALUES (?, ?, ?)";
        if ($query = $conn->prepare($sql))
        {
            $query->bind_param("sss", $name, $email, $message);
            $query->execute();
        }
        $query->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>

<body>
    <h1>Contact Form</h1>
    <?php if ($isValid == false): ?>
        <div style="color: red;"> One or more form fields are invalid</div>
    <?php endif; ?>
    <form method="post" action="#">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" />
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" />
        </div>
        <div>
            <label for="message">Message</label>
            <textarea rows="4" id="message" name="message"></textarea>
        </div>
        <button type="submit" name="submit" value="">Submit</button>
    </form>
</body>

</html>