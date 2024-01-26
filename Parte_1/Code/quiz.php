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
            // Add logic to submit the form or take any other action when the time is up
            document.getElementById('quizForm').submit();
        }

        // Start the timer when the page loads
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
        <!-- Question 1 -->
        <div class="question">
            <p>1. What does PHP stand for?</p>
            <label><input type="radio" name="q1" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) Personal Home Page</label>
            <label><input type="radio" name="q1" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) PHP: Hypertext Preprocessor</label>
            <label><input type="radio" name="q1" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) PHP Hyper Markup Language</label>
            <?php
            if (isset($_GET['q']) && in_array('q1', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q1', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }
            ?>
        </div>

        <!-- Question 2 -->
        <div class="question">
            <p>2. What is the result of 2 + 2 in PHP?</p>
            <label><input type="radio" name="q2" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) 3</label>
            <label><input type="radio" name="q2" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) 4</label>
            <label><input type="radio" name="q2" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) 5</label>
            <?php
            if (isset($_GET['q']) && in_array('q2', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q2', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }
            ?>
        </div>

        <!-- Question 3 -->
        <div class="question">
            <p>3. ¿Cuál es el resultado de `echo "Hola" . " " . "Mundo";`?</p>
            <label><input type="radio" name="q3" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) HelloWorld</label>
            <label><input type="radio" name="q3" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) Hola Mundo</label>
            <label><input type="radio" name="q3" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) HelloWorld</label>
            <?php
            if (isset($_GET['q']) && in_array('q3', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q3', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }
            ?>
        </div>

        <!-- Question 4 -->
        <div class="question">
            <p>4. En PHP, ¿qué bucle se utiliza para ejecutar un bloque de código un número especificado de veces?</p>
            <label><input type="radio" name="q4" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) Bucle for</label>
            <label><input type="radio" name="q4" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) Bucle while</label>
            <label><input type="radio" name="q4" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) Bucle do...while</label>
            <label><input type="radio" name="q4" value="d" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> d) Bucle foreach</label>
            <?php
            if (isset($_GET['q']) && in_array('q4', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q4', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }
            ?>
        </div>

        <!-- Question 5 -->
        <div class="question">
            <p>5. ¿Qué función de PHP se utiliza para abrir un archivo para escritura?</p>
            <label><input type="radio" name="q5" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) fopen</label>
            <label><input type="radio" name="q5" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) file_open</label>
            <label><input type="radio" name="q5" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) open_file</label>
            <label><input type="radio" name="q5" value="d" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> d) Ninguna de las anteriores</label>
            <?php
            if (isset($_GET['q']) && in_array('q5', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q5', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            } elseif (isset($_GET['success']) && !in_array('q5', explode(',', $_GET['success']))) {
                echo '<p style="color: red;">That is not the correct answer, please try again.</p>';
            }
            ?>
        </div>

        <!-- Question 6 -->
        <div class="question">
            <p>6. ¿Cuál es el propósito de la superglobal `$_GET` en PHP?</p>
            <label><input type="radio" name="q6" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) Recuperar datos de un formulario con el método POST</label>
            <label><input type="radio" name="q6" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) Almacenar variables de sesión</label>
            <label><input type="radio" name="q6" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) Recuperar datos de la cadena de consulta URL</label>
            <label><input type="radio" name="q6" value="d" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> d) Definir constantes globales</label>
            <?php
            if (isset($_GET['q']) && in_array('q6', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q6', explode(',', $_GET['success']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            ?>
        </div>

        <!-- Question 7 -->
        <div class="question">
            <p>7. ¿Cuál de los siguientes es un ejemplo de constante mágica de PHP?</p>
            <label><input type="radio" name="q7" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) $this</label>
            <label><input type="radio" name="q7" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) __LINE__</label>
            <label><input type="radio" name="q7" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) $var</label>
            <label><input type="radio" name="q7" value="d" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> d) functionName()</label>
            <?php
            if (isset($_GET['q']) && in_array('q7', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q7', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }
            ?>
        </div>

        <!-- Question 8 -->
        <div class="question">
            <p>8. ¿Qué hace la función `include` en PHP?</p>
            <label><input type="radio" name="q8" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) Ejecuta un bloque de código solo si una condición es verdadera</label>
            <label><input type="radio" name="q8" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) Incluye y evalúa un archivo especificado</label>
            <label><input type="radio" name="q8" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) Define una nueva función</label>
            <label><input type="radio" name="q8" value="d" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> d) Genera un número aleatorio</label>
            <?php
            if (isset($_GET['q']) && in_array('q8', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q8', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }
            ?>
        </div>

        <!-- Question 9 -->
        <div class="question">
            <p>9. ¿En PHP, qué comprueba el operador `===`?</p>
            <label><input type="radio" name="q9" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) Igualdad</label>
            <label><input type="radio" name="q9" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) Asignación</label>
            <label><input type="radio" name="q9" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) Desigualdad</label>
            <label><input type="radio" name="q9" value="d" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> d) Comparación</label>
            <?php
            if (isset($_GET['q']) && in_array('q9', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q9', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }
            ?>
        </div>

        <!-- Question 10 -->
        <div class="question">
            <p>10. ¿Cuál de los siguientes se utiliza para crear un objeto en PHP?</p>
            <label><input type="radio" name="q10" value="a" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> a) new</label>
            <label><input type="radio" name="q10" value="b" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> b) objeto</label>
            <label><input type="radio" name="q10" value="c" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> c) crear</label>
            <label><input type="radio" name="q10" value="d" <?php if (isset($_GET['success'])) echo 'disabled'; ?>> d) instancia</label>
            <?php
            if (isset($_GET['q']) && in_array('q10', explode(',', $_GET['q']))) {
                echo '<p style="color: red;">This question must be answered.</p>';
            }
            if (isset($_GET['success']) && in_array('q10', explode(',', $_GET['success']))) {
                echo '<p style="color: green;">Good job, that\'s the right answer.</p>';
            }

            ?>
        </div>
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
<?php
// Include the FormHandler class and quiz processing logic
include 'process.php';

// Initialize the FormHandler with correct answers
$correctAnswers = ["b", "b", "b", "a", "d", "c", "b", "b", "a", "a"];
$formHandler = new FormHandler($correctAnswers);

// Handle form submission
$formHandler->handleSubmission();

?>

</html>