CREATE SCHEMA IF NOT EXISTS `quiz-app` ;
USE `quiz-app` ;


CREATE TABLE Questions (
    question_id INT PRIMARY KEY AUTO_INCREMENT,
    question_text VARCHAR(255) NOT NULL,
    comment_text VARCHAR(255),
    success_comment VARCHAR(255)
);

CREATE TABLE Options (
    option_id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT,
    question_text VARCHAR(255) NOT NULL,
    option_a VARCHAR(255) NOT NULL,
    option_b VARCHAR(255) NOT NULL,
    option_c VARCHAR(255) NOT NULL,
    option_d VARCHAR(255) NOT NULL,
    correct_option VARCHAR(1) NOT NULL,
    is_correct BOOLEAN NOT NULL,
    FOREIGN KEY (question_id) REFERENCES Questions(question_id)
);