<?php

include '../DatabaseManager.php';
include '../DatabaseCreator.php';
include '../controller/QuestionController.php';

if (isset($_GET['question_id'])) {
    $questionId = $_GET['question_id'];
    $DbCreator = new DatabaseCreator();
    $db = $DbCreator->getDbConnection();
    $manager = new DatabaseManager();
    $controller = new QuestionController($db);
    // Retrieve the question details using the getQuestion method
    $question = $controller->getQuestion($questionId);

    if ($question) {
        // Display the question details
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Question Details</title>
            <link rel="stylesheet" href="CSS/quiz.css">
        </head>
        <body>
            <section class="section">
                <article class="question">
                    <p><?= $question['question_id'], ". ", $question['question_text'] ?></p>
                    <label><input type="radio" name="q<?= $question["question_id"] ?>" value="a"> <?= $question["option_a"] ?> </label>
                    <label><input type="radio" name="q<?= $question["question_id"] ?>" value="b"> <?= $question["option_b"] ?> </label>
                    <label><input type="radio" name="q<?= $question["question_id"] ?>" value="c"> <?= $question["option_c"] ?> </label>
                    <label><input type="radio" name="q<?= $question["question_id"] ?>" value="d"> <?= $question["option_d"] ?> </label>
                </article>
            </section>
        </body>
        </html>
        <?php
    } else {
        echo "Question not found.";
    }
} else {
    echo "Question ID not provided.";
}
?>
