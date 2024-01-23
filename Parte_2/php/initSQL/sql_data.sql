-- Insert a new quiz
INSERT INTO Quiz (title, description, created_at)
VALUES ('Sample Quiz', 'This is a sample quiz description.', NOW());

-- Get the quiz_id of the inserted quiz
SET @quiz_id = LAST_INSERT_ID();

-- Insert questions into the Questions table for the corresponding quiz

-- Question 1
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'What does PHP stand for?', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'PHP Hyper Markup Language', 'None of the above', 'B');

-- Question 2
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'What is the result of 2 + 2 in PHP?', '3', '4', '5', '6', 'b');

-- Question 3
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, '¿Cuál es el resultado de `echo "Hola" . " " . "Mundo";`?', 'HelloWorld', 'Hola Mundo', 'HelloWorld', '"Hola Mundo"', 'b');

-- Question 4
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'En PHP, ¿qué bucle se utiliza para ejecutar un bloque de código un número especificado de veces?', 'Bucle for', 'Bucle while', 'Bucle do...while', 'Bucle foreach', 'a');

-- Question 5
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, '¿Qué función de PHP se utiliza para abrir un archivo para escritura?', 'fopen', 'file_open', 'open_file', 'Ninguna de las anteriores', 'a');

-- Question 6
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, '¿Cuál es el propósito de la superglobal `$_GET` en PHP?', 'Recuperar datos de un formulario con el método POST', 'Almacenar variables de sesión', 'Recuperar datos de la cadena de consulta URL', 'Definir constantes globales', 'c');

-- Question 7
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, '¿Cuál de los siguientes es un ejemplo de constante mágica de PHP?', '$this', '__LINE__', '$var', 'functionName()', 'b');

-- Question 8
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, '¿Qué hace la función `include` en PHP?', 'Ejecuta un bloque de código solo si una condición es verdadera', 'Incluye y evalúa un archivo especificado', 'Define una nueva función', 'Genera un número aleatorio', 'b');

-- Question 9
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, '¿En PHP, qué comprueba el operador `===`?', 'Igualdad', 'Asignación', 'Desigualdad', 'Comparación', 'a');

-- Question 10
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, '¿Cuál de los siguientes se utiliza para crear un objeto en PHP?', 'new', 'objeto', 'crear', 'instancia', 'a');
