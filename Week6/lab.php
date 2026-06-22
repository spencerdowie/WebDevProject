<?php
if (count($_POST) > 0)
{
    var_dump($_POST);
    $isValid = true;
    // you can use this array of province codes to validate the province field. What PHP function would check if a value is in an array?
    $provinces = array('AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT');

    /**
     *LAB 5 - FORM VALIDATION** Validate the form fields here after the form is submitted.
     * No field should be allowed to be blank, the submitted email should be avalid email address,
     * and the submitted postal code should also be a valid Canadian postal code.
     */

    if (
        empty($_POST["name"]) ||
        strlen($_POST["name"]) > 100
    )
    {
        $isValid = false;
        $nameInvalid = "Invalid Name";
    }
    if (
        empty($_POST["email"]) ||
        strlen($_POST["email"]) > 100 ||
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    )
    {
        $isValid = false;
        $emailInvalid = "Invalid Email";
    }
    if (
        empty($_POST["province"]) ||
        strlen($_POST["province"]) > 2 ||
        in_array($_POST["province"], $provinces) == false
    )
    {
        $isValid = false;
        $provinceInvalid = "Invalid Province";
    }
    if (
        empty($_POST["postalCode"])  ||
        strlen($_POST["postalCode"]) > 7 ||
        filter_var(
            $_POST["postalCode"],
            FILTER_VALIDATE_REGEXP,
            array("options" =>
            array("regexp" => "/[a-z]{1}\d{1}[a-z]{1}\s*\d{1}[a-z]{1}\d{1}/i"))
        ) == false
    )
    {
        $isValid = false;
        $postalCodeInvalid = "Invalid Postal Code";
    }

    //This shouldn't print if the form is invalid!
    if ($isValid)
    {
        echo '<div style="color:green;">Your account has been registered!</div>';
    }
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Lab 5 - Form Validation</title>
</head>

<body>
    <h1>Lab 5 - Form Validation</h1>
    <h2>User Registration Form</h2>
    <form action="#" method="post">
        <div style="margin-bottom: 0.75rem;"><label for="name">Name</label><input type="text" name="name" id="name">
            <?php if (isset($nameInvalid)): ?>
                <div style="color: red;"><?php echo $nameInvalid ?></div>
            <?php endif; ?>
        </div>
        <div style="margin-bottom: 0.75rem;"><label for="email">Email</label><input type="email" name="email" id="email">
            <?php if (isset($emailInvalid)): ?>
                <div style="color: red;"><?php echo $emailInvalid ?></div>
            <?php endif; ?>
        </div>
        <div style="margin-bottom: 0.75rem;"><label for="province">Province</label><select name="province" id="province">
                <option value="AB">Alberta</option>
                <option value="BC">British Columbia</option>
                <option value="MB">Manitoba</option>
                <option value="NB">New Brunswick</option>
                <option value="NL">Newfoundland and Labrador</option>
                <option value="NT">Northwest Territories</option>
                <option value="NS">Nova Scotia</option>
                <option value="NU">Nunavut</option>
                <option value="ON">Ontario</option>
                <option value="PE">Prince Edward Island</option>
                <option value="QC">Quebec</option>
                <option value="SK">Saskatchewan</option>
                <option value="YT">Yukon</option>
            </select>
            <?php if (isset($provinceInvalid)): ?>
                <div style="color: red;"><?php echo $provinceInvalid ?></div>
            <?php endif; ?>
        </div>
        <div style="margin-bottom: 0.75rem;">
            <label for="postalCode">Postal Code</label>
            <input type="text" name="postalCode" id="postalCode">
            <?php if (isset($postalCodeInvalid)): ?>
                <div style="color: red;"><?php echo $postalCodeInvalid ?></div>
            <?php endif; ?>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>