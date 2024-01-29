<?php


include 'DatabaseManager.php';
include 'DatabaseCreator.php';
include './controller/QuestionController.php';

$DbCreator = new DatabaseCreator();
$db = $DbCreator->getDbConnection();
$manager = new DatabaseManager();
$controller = new QuestionController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $questionId = $_POST['question_id'];
    if ($_POST['action'] === 'delete') {
        $controller->deleteQuestion($questionId);
    } elseif ($_POST['action'] === 'edit') {
        header("Location:pages/editQuestion.php?question_id=$questionId");
        exit;
    } elseif ($_POST['action'] === 'get') {
        header("Location:pages/getQuestion.php?question_id=$questionId");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Title</title>
    <link rel="stylesheet" href="CSS/quiz.css">
    <script src="main.js"></script>
</head>

<body>
    <section class="section">
        <?php

        $manager->displayQuestionsDev($db);

        ?>

        <button type="button" class="button" onclick="window.location.href='pages/createQuestion.php'">Create Question</button>
    </section>
</body>

</html>