<?php
include '../DatabaseManager.php';
include '../DatabaseCreator.php';
include '../controller/QuestionController.php';

$DbCreator = new DatabaseCreator();
$db = $DbCreator->getDbConnection();
$controller = new QuestionController($db);

// Check if a question ID is provided in the URL
if (isset($_GET['question_id'])) {
    $questionId = $_GET['question_id'];

    // Fetch existing question details from the database
    $questionDetails = $controller->getQuestion($questionId);

    if ($questionDetails) {
        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $updatedQuizId = $_POST['quiz_id'];
            $updatedQuestionText = $_POST['question_text'];
            $updatedOptionA = $_POST['option_a'];
            $updatedOptionB = $_POST['option_b'];
            $updatedOptionC = $_POST['option_c'];
            $updatedOptionD = $_POST['option_d'];
            $updatedCorrectOption = $_POST['correct_option'];
            $updatedQuestionType = $_POST['question_type'];
            $updatedQuestionDetails = $_POST['question_details'];

            // Update the question in the database
            $controller->updateQuestion(
                $questionId,
                $updatedQuizId,
                $updatedQuestionText,
                $updatedOptionA,
                $updatedOptionB,
                $updatedOptionC,
                $updatedOptionD,
                $updatedCorrectOption,
                $updatedQuestionType,
                $updatedQuestionDetails
            );

            // Redirect back to the previous page
            header("Location:../questionManagement.php");
            exit;
        }
    } else {
        // Handle error if the question ID is invalid or not found
        echo "Question not found.";
        exit;
    }
} else {
    echo "Question ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Question</title>
    <link rel="stylesheet" href="../CSS/quiz.css">
    <script src="main.js"></script>
</head>

<body>
    <section class="section">
        <form method="post">
            <label for="quiz_id">Quiz ID:</label>
            <input type="text" id="quiz_id" name="quiz_id" value="<?= $questionDetails['quiz_id'] ?>" required>
            <br><br>
            <label for="question_text">Question Text:</label>
            <input type="text" id="question_text" name="question_text" value="<?= $questionDetails['question_text'] ?>" required>
            <br>
            <br>
            <label for="option_a">Option A:</label>
            <input type="text" id="option_a" name="option_a" value="<?= $questionDetails['option_a'] ?>" required>
            <br>
            <br>
            <label for="option_b">Option B:</label>
            <input type="text" id="option_b" name="option_b" value="<?= $questionDetails['option_b'] ?>" required>
            <br>
            <br>
            <label for="option_c">Option C:</label>
            <input type="text" id="option_c" name="option_c" value="<?= $questionDetails['option_c'] ?>" required>
            <br>
            <br>
            <label for="option_d">Option D:</label>
            <input type="text" id="option_d" name="option_d" value="<?= $questionDetails['option_d'] ?>" required>
            <br>
            <br>
            <label for="correct_option">Correct Option:</label>
            <input type="text" id="correct_option" name="correct_option" value="<?= $questionDetails['correct_option'] ?>" required>
            <br>
            <br>
            <label for="question_type">Question Type:</label>
            <input type="text" id="question_type" name="question_type" value="<?= $questionDetails['question_type'] ?>" required>
            <br>
            <label for="question_details">Question Details:</label>
            <textarea id="question_details" name="question_details" required><?= $questionDetails['question_details'] ?></textarea>
            <br>
            <br>

            <button type="submit" name="update">Update Question</button>
        </form>
    </section>
</body>

</html>