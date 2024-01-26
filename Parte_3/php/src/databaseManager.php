<?php
include "./controller/QuestionController.php";

class DatabaseManager{

    private $controller;

    

    function getDbConnection()
    {
        $host = 'db';
        $username = 'user';
        $password = 'user';
        $database = 'quizz-app';

        try {
            $mysqli = new mysqli($host, $username, $password, $database);

            if ($mysqli->connect_error) {
                error_log('Connection failed: ' . $mysqli->connect_error);

                throw new mysqli_sql_exception('Connection failed: ' . $mysqli->connect_error);
            }
            $this-> controller = new QuestionController($mysqli);
            return $mysqli;
        } catch (mysqli_sql_exception $e) {
            error_log('Error: ' . $e->getMessage());
            die('Error: ' . $e->getMessage());
        }
    }



    function displayQuestions($mysqli)
    {
        $sql = "SELECT * FROM Questions;";
        $result = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <article class="question">
                <p> <?= $row['question_id'], ". ", $row['question_text'] ?> </p>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="a"> <?= $row["option_a"] ?> </label>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="b"> <?= $row["option_b"] ?> </label>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="c"> <?= $row["option_c"] ?> </label>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="d"> <?= $row["option_d"] ?> </label>
            </article>
            <?php
        }
    }

    function displayQuestionsDev($mysqli){
        $sql = "SELECT * FROM Questions;";
        $result = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <article class="question">
                <p> <?= $row['question_id'], ". ", $row['question_text'] ?> </p>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="a"> <?= $row["option_a"] ?> </label>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="b"> <?= $row["option_b"] ?> </label>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="c"> <?= $row["option_c"] ?> </label>
                <label><input type="radio" name="q<?= $row["question_id"] ?>" value="d"> <?= $row["option_d"] ?> </label>
            </article>
            <button class="button" onclick="<?php $this->controller->deleteQuestion($row['question_id']); ?>">Delete</button>
            <?php
        }
    }
}
