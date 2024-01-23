<?php
function getDbConnection() {
    $host = 'db'; // Use the container name instead of 'quizdb'
    $username = 'user';
    $password = 'user'; // MySQL_ROOT_PASSWORD from docker-compose.yml
    $database = 'quizz-app'; // MySQL_DATABASE from docker-compose.yml

    try {
        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_error) {
            // Log the error message for debugging
            error_log('Connection failed: ' . $mysqli->connect_error);

            throw new mysqli_sql_exception('Connection failed: ' . $mysqli->connect_error);
        }

        return $mysqli;

    } catch (mysqli_sql_exception $e) {
        error_log('Error: ' . $e->getMessage());
        die('Error: ' . $e->getMessage());
    }
}



function displayQuestions($mysqli) {
    global $mysqli;
    $sql = "SELECT * FROM Questions;";
    $result = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <article class="question">
            <p> <?= $row['question_id'],". ", $row['question_text']?> </p>
            <label><input type="radio" name="question_<?= $row["question_id"]?>"> <?= $row["option_a"] ?>  </input></label>
            <label><input type="radio" name="question_<?= $row["question_id"]?>"> <?= $row["option_b"] ?>  </input></label>
            <label><input type="radio" name="question_<?= $row["question_id"]?>"> <?= $row["option_c"] ?>  </input></label>
        </article>
        <?php
    }
}
