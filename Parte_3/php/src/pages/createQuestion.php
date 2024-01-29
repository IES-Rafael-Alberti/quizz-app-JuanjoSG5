<?php
include '../DatabaseManager.php';
include '../DatabaseCreator.php';
include '../controller/QuestionController.php';

$DbCreator = new DatabaseCreator();
$db = $DbCreator->getDbConnection();
$controller = new QuestionController($db);

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $newQuizId = $_POST['quiz_id'];
    $newQuestionText = $_POST['question_text'];
    $newOptionA = $_POST['option_a'];
    $newOptionB = $_POST['option_b'];
    $newOptionC = $_POST['option_c'];
    $newOptionD = $_POST['option_d'];
    $newCorrectOption = $_POST['correct_option'];
    $newQuestionType = $_POST['question_type'];
    $newQuestionDetails = $_POST['question_details'];

    // Insert the new question into the database
    $controller->createQuestion(
        $newQuizId,
        $newQuestionText,
        $newOptionA,
        $newOptionB,
        $newOptionC,
        $newOptionD,
        $newCorrectOption,
        $newQuestionType,
        $newQuestionDetails
    );

    // Redirect back to the previous page
    header("Location:../questionManagement.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Question</title>
    <link rel="stylesheet" href="../CSS/quiz.css">
    <script src="main.js"></script>
</head>

<body>
    <section class="section">
        <form method="post">
            <label for="quiz_id">Quiz ID:</label>
            <input type="text" id="quiz_id" name="quiz_id" required>
            <br><br>
            <label for="question_text">Question Text:</label>
            <input type="text" id="question_text" name="question_text" required>
            <br>
            <br>
            <label for="option_a">Option A:</label>
            <input type="text" id="option_a" name="option_a" required>
            <br>
            <br>
            <label for="option_b">Option B:</label>
            <input type="text" id="option_b" name="option_b" required>
            <br>
            <br>
            <label for="option_c">Option C:</label>
            <input type="text" id="option_c" name="option_c" required>
            <br>
            <br>
            <label for="option_d">Option D:</label>
            <input type="text" id="option_d" name="option_d" required>
            <br>
            <br>
            <label for="correct_option">Correct Option:</label>
            <input type="text" id="correct_option" name="correct_option" required>
            <br>
            <br>
            <label for="question_type">Question Type:</label>
            <input type="text" id="question_type" name="question_type" required>
            <br>
            <label for="question_details">Question Details:</label>
            <textarea id="question_details" name="question_details" required></textarea>
            <br>
            <br>

            <button type="submit" name="create">Create Question</button>
        </form>
    </section>
</body>

</html>
