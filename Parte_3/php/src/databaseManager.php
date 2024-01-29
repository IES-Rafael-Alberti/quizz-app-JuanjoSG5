<?php

class DatabaseManager {
    
    function displayQuestions($mysqli)
    {
        $sql = "SELECT * FROM Questions;";
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $this->displayQuestion($row);
        }
    }

    function displayQuestionsDev($mysqli)
    {
        $sql = "SELECT * FROM Questions;";
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <article class="question">
                <p><?= $row['question_id'], ". ", $row['question_text'] ?></p>
                <?php $this->displayOptions($row); ?>
                <?php $this->displayActionForm("delete", $row['question_id'], "Delete"); ?>
                <?php $this->displayActionForm("edit", $row['question_id'], "Edit Question"); ?>
                <?php $this->displayActionForm("get", $row['question_id'], "Get Question"); ?>
            </article>
            <?php
        }

        $mysqli->close();
    }

    function displayQuestion($row)
    {
        ?>
        <article class="question">
            <p><?= $row['question_id'], ". ", $row['question_text'] ?></p>
            <?php $this->displayOptions($row); ?>
        </article>
        <?php
    }

    function displayOptions($row)
    {
        $options = ['a', 'b', 'c', 'd'];

        foreach ($options as $option) {
            ?>
            <label><input type="radio" name="q<?= $row["question_id"] ?>" value="<?= $option ?>"> <?= $row["option_$option"] ?> </label>
            <?php
        }
    }

    function displayActionForm($action, $questionId, $buttonText)
    {
        ?>
        <form method="post">
            <input type="hidden" name="action" value="<?= $action ?>">
            <input type="hidden" name="question_id" value="<?= $questionId ?>">
            <button type="submit"><?= $buttonText ?></button>
        </form>
        <?php
    }
}
?>
