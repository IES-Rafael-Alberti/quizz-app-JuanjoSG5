<?php

class FormHandler
{
    private $quizId;
    private $db;

    public function __construct($quizId, $db)
    {
        $this->quizId = $quizId;
        $this->db = $db;
    }

    public function handleSubmission()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userAnswers = $this->getUserAnswers();
            $questions = $this->getCorrectAnswersFromDatabase();
            $this->evaluateAnswers($userAnswers, $questions);
        }
    }

    private function getUserAnswers()
    {
        $userAnswers = [];

        for ($i = 1; $i <= 10; $i++) {
            $fieldName = "q" . $i;
            $userAnswers[$i - 1] = isset($_POST[$fieldName]) ? $_POST[$fieldName] : null;
        }

        return $userAnswers;
    }


    private function getCorrectAnswersFromDatabase()
    {
        $query = "SELECT question_id, correct_option FROM Questions WHERE quiz_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $this->quizId);
        $stmt->execute();
        $result = $stmt->get_result();

        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions[$row['question_id']] = $row['correct_option'];
        }

        return $questions;
    }

    private function evaluateAnswers($userAnswers, $correctAnswers)
    {
        $correctQuestions = [];
        $correctCount = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($userAnswers[$i] == $correctAnswers[$i + 1]) {
                $correctQuestions[] = "q" . ($i + 1);
                $correctCount++;
            }
        }
        $queryString = implode(",", $correctQuestions);
        $redirectUrl = "quiz.php?success=$queryString";
        header("Location:$redirectUrl");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quizId = 1;
    $db = new mysqli("db", "user", "user", "quizz-app");

    $formHandler = new FormHandler($quizId, $db);
    $formHandler->handleSubmission();
}
