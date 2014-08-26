<?php
//var_dump($user);
//var_dump($questions);
//var_dump($answers);
//var_dump($comments);
?>


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
            <?php foreach($questions as $question) {
                echo "<div>{$question["title"]}</div>";
                echo "<div>{$question["text"]}</div>";
            } ?>
    </div>
    <div class="tab-pane fade" id="profile">
        <?php foreach($answers as $answer) {
            echo "<div>{$answer["title"]}</div>";
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