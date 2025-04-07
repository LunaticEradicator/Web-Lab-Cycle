<?php
// Initialize variables for form data and error messages
$nameErr = $emailErr = $phoneErr = $passwordErr = $confirmErr = "";
$name = $email = $phone = $password = $confirmPassword = "";

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process the form data when it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation logic for the 'name' field
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validation logic for the 'email' field
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validation logic for the 'phone' field
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneErr = "Invalid phone number format";
        }
    }

    // Validation logic for the 'password' field
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters";
        }
    }

    if ($_POST["password"] != $_POST["confirmPassword"]) {
        $confirmErr = "Password must match";
    }

    // If there are no errors, process the data
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr)) {
        // You can process the data (e.g., save it to a database) or redirect to another page
        header("Location: index.php?success=1");
        exit(); // Stop further execution after redirect
    }
}
