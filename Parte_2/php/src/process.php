<?php

class FormHandler
{
    private $correctAnswers;

    public function __construct($correctAnswers)
    {
        $this->correctAnswers = $correctAnswers;
    }

    public function handleSubmission()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userAnswers = $this->getUserAnswers();

            $this->evaluateAnswers($userAnswers);
        }
    }

    private function getUserAnswers()
    {
        $userAnswers = [];

        for ($i = 1; $i <= count($this->correctAnswers); $i++) {
            $fieldName = "q" . $i;
            $userAnswers[$i - 1] = isset($_POST[$fieldName]) ? $_POST[$fieldName] : null;
        }

        return $userAnswers;
    }

    private function evaluateAnswers($userAnswers)
    {
        $correctQuestions = [];
        $correctCount = 0;

        for ($i = 0; $i < count($this->correctAnswers); $i++) {
            if ($userAnswers[$i] == $this->correctAnswers[$i]) {
                $correctQuestions[] = "q" . ($i + 1);
                $correctCount++;
            }
        }

        $queryString = implode(",", $correctQuestions);
        $answeredQueryString = http_build_query(array_map(function ($i, $answer) {
            return "q" . ($i + 1) . "=" . urlencode($answer);
        }, array_keys($userAnswers), $userAnswers));

        $redirectUrl = "quiz.php?success=$queryString&$answeredQueryString";
        header("Location:$redirectUrl");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correctAnswers = ["b", "b", "b", "a", "d", "c", "b", "b", "a", "a"];

    $questionsAnswered = array_keys($_POST);
    $questionsUnanswered = array_diff(array_map(function ($i) {
        return "q" . $i;
    }, range(1, 10)), $questionsAnswered);

    if (count($questionsAnswered) !== count($correctAnswers)) {
        header("Location:quiz.php?q=" . implode(",", $questionsUnanswered));
    } else {
        $formHandler = new FormHandler($correctAnswers);
        $formHandler->handleSubmission();
    }
}
