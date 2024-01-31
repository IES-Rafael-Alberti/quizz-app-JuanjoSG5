<?php

class QuestionController {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createQuestion($quizId, $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption, $questionType, $questionDetails)
    {
        $query = "INSERT INTO Questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option, question_type, question_details)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        // bind_param -> the first parameter is to indicate the type of the parameter you are going to insert 
        $stmt->bind_param("issssssss", $quizId, $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption, $questionType, $questionDetails);
        $stmt->execute();
    }

    public function updateQuestion($questionId, $quizId, $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption, $questionType, $questionDetails)
    {
        $query = "UPDATE Questions
        SET quiz_id = ?, question_text = ?, option_a = ?, option_b = ?, option_c = ?, option_d = ?, correct_option = ?, question_type = ?, question_details = ?
        WHERE question_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("issssssssi", $quizId, $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption, $questionType, $questionDetails, $questionId);
        $stmt->execute();
    }

    public function deleteQuestion($questionId){
        $query = "DELETE FROM Questions
        WHERE question_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $questionId);
        $stmt->execute();
    }

    public function getQuestions()
    {
        $query = "SELECT * FROM Questions;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
        return $questions;
    }

    public function getQuestion($questionId)
    {
        $query = "SELECT * FROM Questions WHERE question_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $questionId);
        $stmt->execute();
        $result = $stmt->get_result();
        $question = $result->fetch_assoc();
        return $question;
    }
}



