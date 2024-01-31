-- Insert a new quiz
INSERT INTO Quiz (title, description, created_at)
VALUES ('Sample Quiz', 'This is a sample quiz description.', NOW());

-- Get the quiz_id of the inserted quiz
SET @quiz_id = LAST_INSERT_ID();

-- Insert questions into the Questions table for the corresponding quiz

-- Question 1
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'What does PHP stand for?', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'PHP Hyper Markup Language', 'None of the above', 'b');

-- Question 2
INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'What is the result of 2 + 2 in PHP?', '3', '4', '5', '6', 'b');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'What is the result of `echo "Hello" . " " . "World";`?', 'HelloWorld', 'Hello World', 'HelloWorld', '"Hello World"', 'b');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'In PHP, which loop is used to execute a block of code a specified number of times?', 'For loop', 'While loop', 'Do...while loop', 'Foreach loop', 'a');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'Which PHP function is used to open a file for writing?', 'fopen', 'file_open', 'open_file', 'None of the above', 'a');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'What is the purpose of the `$_GET` superglobal in PHP?', 'Retrieve data from a form with the POST method', 'Store session variables', 'Retrieve data from the URL query string', 'Define global constants', 'c');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'Which of the following is an example of a PHP magic constant?', '$this', '__LINE__', '$var', 'functionName()', 'b');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'What does the `include` function do in PHP?', 'Executes a block of code only if a condition is true', 'Includes and evaluates a specified file', 'Defines a new function', 'Generates a random number', 'b');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'In PHP, what does the `===` operator check?', 'Equality', 'Assignment', 'Inequality', 'Comparison', 'a');

INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option)
VALUES
(@quiz_id, 'Which of the following is used to create an object in PHP?', 'new', 'object', 'create', 'instance', 'a');
