<?php
include 'process.php';


$correctAnswers = ["b", "b", "b", "a", "d", "c", "b", "b", "a", "a"];
$formHandler = new FormHandler($correctAnswers);

$formHandler->handleSubmission();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="CSS/quiz.css">

    <script>
        function reload() {
            window.location.href = window.location.href.split('?')[0];
            window.location.href = baseUrl + '?retake=true';
        }
        var timer;
        var timeLeft = 300; // 5 minutes in seconds

        function startTimer() {
            timer = setInterval(function() {
                timeLeft--;

                if (timeLeft <= 0) {
                    clearInterval(timer);
                    document.getElementById('timer').innerHTML = 'Time is up!';
                    submitForm(); // Call your submit form function when time is up
                } else {
                    var minutes = Math.floor(timeLeft / 60);
                    var seconds = timeLeft % 60;
                    document.getElementById('timer').innerHTML =
                        'Time remaining: ' + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
                }
            }, 1000);
        }

        function submitForm() {
            document.getElementById('quizForm').submit();
        }

        window.onload = function() {
            startTimer();
        };
    </script>
</head>

<body>



    <form id="quizForm" method="post" action="<?php echo isset($_GET['success']) ? '#' : $_SERVER['PHP_SELF']; ?>">

        <h1>PHP Quiz</h1>
        <div id="timer">Time remaining: 5:00</div>

        <?php if (isset($_GET['success'])) {

            $score = count(explode(',', $_GET['success']));
            echo "<p><strong>Your score: $score / 10</strong></p>";
        } ?>

        <?php

        include 'databaseManager.php';

        $mysqli = getDbConnection();

        displayQuestions($mysqli);
        $mysqli->close();
        ?>

       
        <?php if (isset($_GET['success'])) {
            echo "<form method='get' action='" . $_SERVER['PHP_SELF'] . "'>
            <input type='button' value='Try again' onclick='reload()'>
          </form>";
            exit();
        } else {
            echo "<input type=\"submit\" value=\"Submit\" >";
        }
        ?>
    </form>
</body>



</html>