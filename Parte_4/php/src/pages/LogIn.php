<?php
session_start();

include '../controller/UserController.php';
include '../DatabaseCreator.php';

// Create Database connection
$DbCreator = new DatabaseCreator();
$conn = $DbCreator->getDbConnection();

// Handle user login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate inputs
    if (empty($username) || empty($password)) {
        echo "Please fill both username and password fields";
    } else {
        // Retrieve user data from the database
        $controller = new UserController();
        $user = $controller->getUserByUsername($conn, $username);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                header("Location: ../quiz.php?user_id=" . $_SESSION['user_id']);
                exit();
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    }
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
        <h1>Login</h1>
        <br><br>
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br>
        <br>
        <input type="submit" value="Login">
    </form>
</body>

</html>