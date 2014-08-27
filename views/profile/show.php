<?php
//var_dump($user);
//var_dump($questions);
//var_dump($answers);
//var_dump($comments);
?>

<div class="clearfix">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Questions</a></li>
        <li><a href="#profile" data-toggle="tab">Answers</a></li>
        <li class="disabled"><a>Disabled</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
            <?php foreach ($questions as $question) {
                echo "<div>
                        <a href=\"" . ABS_ROOT_URL . "questions/details/{$question['id']}\">{$question["title"]}</a>
                      </div>";
                echo "<div>" . substr("{$question["text"]}", 0, 100);
                if (strlen($question["text"]) > 100) {
                    echo "...";
                }

                echo "</div>";
            } ?>
        </div>
        <div class="tab-pane fade" id="profile">
            <?php foreach ($answers as $answer) {
                echo "<div><a href=\"" . ABS_ROOT_URL . "questions/details/{$answer['questions_id']}\">{$answer["title"]}</a></div>";
                echo "<div>" . substr($answer["text"], 0, 100);
                if (strlen($answer["text"]) > 100) {
                    echo "...";
                }

                echo "</div>";
            } ?>
        </div>
    </div>
</div>