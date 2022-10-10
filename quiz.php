<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/blog-head.php";
include "pages/blog-nav.php";
$Questions = fetchAll("quiz_questions");

?>

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto py-5">
            <h2>WEEKLY QUIZ</h2>
            <h3>This weeks theme: NBA </h3>
            <form action="models/quiz-model.php" method="post" class="form">
                <div class="form-group">
                    <?php foreach($Questions as $question) :?>
                    <label for="question"><?=$question->question?></label><br>
                    <div class="form-check">
                        <?php
                            $answers = fetchAnswers($question->id);
                            foreach($answers as $answer):
                        ?>
                    <input class="form-check-input"type="radio" name="rb<?=$question->id?>" value="<?=$answer->id?>"><?=$answer->answer?><br>
                    <?php endforeach;?>
                    </div>
                    <?php endforeach;?>
                </div>
                <input class="btn btn-primary" type="submit" value="Submit answers">
            </form>
        </div>
    </div>
</div>


<?php
include "pages/blog-footer.php"
?>