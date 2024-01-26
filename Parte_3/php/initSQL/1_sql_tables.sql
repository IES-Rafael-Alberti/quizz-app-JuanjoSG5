SET NAMES utf8;
SET time_zone = '+02:00';
SET sql_mode = '';
DROP DATABASE IF EXISTS `quizz-app`;
CREATE DATABASE `quizz-app` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `quizz-app`;


CREATE TABLE Quiz (
    quiz_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME
);


CREATE TABLE Questions (
    question_id INT PRIMARY KEY AUTO_INCREMENT,
    quiz_id INT,
    question_text TEXT NOT NULL,
    option_a VARCHAR(255) NOT NULL,
    option_b VARCHAR(255) NOT NULL,
    option_c VARCHAR(255) NOT NULL,
    option_d VARCHAR(255) NOT NULL,
    correct_option CHAR(1) NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES Quiz(quiz_id)
);