<?php
session_start();

include '../controller/UserController.php';
include '../DatabaseCreator.php';

$DbCreator = new DatabaseCreator();
$conn = $DbCreator->getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  // Validate inputs
  if (empty($username) || empty($password) || empty($email)) {
    echo "Please fill all the fields";
  } else {
    // Encrypt password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $controller = new UserController();
    $user_id = $controller->insertUserData($conn, $username, $hashed_password, $email);

    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $user_id;
    $_SESSION["username"] = $username;

    header("Location:../quiz.php");
    exit();
  }
}

function logout()
{
  $_SESSION = array();
  session_destroy();
  header("location: login.php");
  exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Quiz</title>

  <link rel="stylesheet" href="../CSS/quiz.css">
  <script src='main.js'></script>
</head>

<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Sign up</h1>
    <br><br>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit">
  </form>
</body>

</html>