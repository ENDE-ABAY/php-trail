<?php
// Start a session to store user information
session_start();

// Check if the user has already logged in
if(isset($_SESSION['user_id'])) {
  header("Location: dashboard.php"); // Redirect to dashboard page
  exit;
}

// Check if the user has submitted the form
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the user's input from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // TODO: Validate the user's input, check if the username and password match

  // If the username and password are correct, set the session variable and redirect to the dashboard page
  if($username == "example_user" && $password == "example_password") {
    $_SESSION['user_id'] = 1;
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Invalid username or password"; // Display an error message
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
</head>
<body>
  <h1>Login</h1>
  <?php if(isset($error)) { echo $error; } ?>
  <form method="POST" action="">
    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Login</button>
  </form>
</body>
</html>
