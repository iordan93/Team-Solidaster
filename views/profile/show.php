<?php
var_dump($user);
var_dump($questions);
var_dump($answers);
var_dump($comments);
?>

<div class="clearfix">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Questions</a></li>
        <li><a href="#profile" data-toggle="tab">Answers</a></li>
        <li class="disabled"><a>Disabled</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Profile <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#dropdown1" data-toggle="tab">Info</a></li>
                <li class="divider"></li>
                <li><a href="#dropdown2" data-toggle="tab">Settings</a></li>
            </ul>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Question title</th>
                    <th>Question description</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($questions as $question) {
                        echo "<tr><td><a href=\"" . ABS_ROOT_URL . "questions/details/{$question['id']}\">{$question["title"]}</a></td><td>{$question["text"]}</td></tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile">
            <?php foreach($answers as $answer) {
            echo "<div><a href=\"" . ABS_ROOT_URL . "questions/details/{$questions['id']}\">{$answer["title"]}</a></div>";
            echo "<div>{$answer["text"]}</div>";
            } ?>
        </div>
        <div class="tab-pane fade" id="dropdown1">
            <p></p>
        </div>
        <div class="tab-pane fade" id="dropdown2">
            <p></p>
        </div>
    </div>
</div>