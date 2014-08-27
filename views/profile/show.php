<?php
//var_dump($user);
//var_dump($questions);
//var_dump($answers);
//var_dump($comments);
?>

<div class="clearfix">
    <div>
        <?php
        $auth = \Lib\Auth::getInstance();
        if ($auth->isAdmin()): ?>
            <h4>
                <span class="glyphicon glyphicon-user"></span>
                <?php echo $user['username'] ?>
            </h4>
            <h4>
                <span class="glyphicon glyphicon-envelope"></span>
                <?php echo $user['email'] ?>
            </h4>
            <h4>
                <span class="glyphicon glyphicon-tower"></span>
                <?php echo $user['role'] ?>
            </h4>
        <?php else: ?>
            <h4>
                <span class="glyphicon glyphicon-user"></span>
                <?php echo $user['username'] ?>
            </h4>
            <h4>
                <span class="glyphicon glyphicon-envelope"></span>
                <?php echo $user['email'] ?>
            </h4>
        <?php endif; ?>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Questions</a></li>
        <li><a href="#profile" data-toggle="tab">Answers</a></li>
        <li class="disabled"><a>Comments</a></li>
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