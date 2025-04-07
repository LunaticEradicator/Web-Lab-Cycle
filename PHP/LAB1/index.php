<?php
session_start(); // Start the session

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
    if (strlen($password) < 8) {
      $passwordErr = "Password must be at least 8 characters";
    }
  }

  // Confirm password check
  if ($_POST["password"] != $_POST["confirmPassword"]) {
    $confirmErr = "Password must match";
  }

  // If there are no errors, process the data and set a success message
  if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr) && empty($confirmErr)) {
    // Process the data (e.g., save it to a database) or perform other actions here

    // Set a success message in the session
    $_SESSION['success_message'] = "Your registration was successful!";

    // Redirect to the same page (or another page) to show the success message
    header("Location: index.php");
    exit(); // Ensure no further processing is done after the redirect
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
  <link rel="stylesheet" href="./css/style.css">
  <script defer>
    // Function to hide the success message after 3 seconds
    window.onload = () => {
      setTimeout(function() {
        var successMessage = document.querySelector(".successDiv");
        if (successMessage) {
          successMessage.style.display = "none";
        }
      }, 2500);
    };
  </script>
</head>

<body>
  <div class="main">
    <h1>Registration Form</h1>
    <div id="form">
      <form action="index.php" method="POST">
        <div>
          <label>Enter Name:</label>
          <input
            type="text"
            name="name"
            value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"
            placeholder="Enter your name"
            autocomplete="off" />
          <span class="error"><?php echo $nameErr; ?></span>
        </div>
        <div>
          <label>Enter Email:</label>
          <input
            type="email"
            name="email"
            value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"
            placeholder="Enter your email"
            autocomplete="off" />
          <span class="error"><?php echo $emailErr; ?></span>
        </div>
        <div>
          <label>Enter Phone:</label>
          <input
            type="number"
            name="phone"
            value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"
            placeholder="Enter your phone"
            maxlength="10"
            autocomplete="off" />
          <span class="error"><?php echo $phoneErr; ?></span>
        </div>
        <div>
          <label>Password:</label>
          <input
            type="password"
            name="password"
            placeholder="Enter your password"
            autocomplete="off" />
        </div>
        <span class="error"><?php echo $passwordErr; ?></span>
        <div>
          <label>Confirm Password:</label>
          <input
            type="password"
            name="confirmPassword"
            placeholder="Confirm password"
            autocomplete="off" />
          <span class="error"><?php echo $confirmErr; ?></span>
        </div>
        <div id="btnDiv">
          <button type="reset">Reset</button>
          <button type="submit">Submit</button>
        </div>
      </form>

      <div class="successDiv">
        <?php
        // Display the success message if it's set in the session
        if (isset($_SESSION['success_message'])) {
          echo "<p class='success'>" . $_SESSION['success_message'] . "</p>";
          unset($_SESSION['success_message']); // Clear the message after displaying it
        }
        ?>
      </div>

    </div>
  </div>
</body>

</html>
