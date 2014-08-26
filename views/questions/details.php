<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-user"></span>
            <span><strong> <?= $question['question'][0]['author'] ?></strong></span>
            <span><em> asked: </em></span>
            <?= $question['question'][0]['title'] ?>
        </h3>
    </div>
    <div class="panel-body">
        <?= $question['question'][0]['text'] ?>
    </div>
    <div class="panel-footer">
        <span class="glyphicon glyphicon-time"></span>
        <span class="label label-default"><?= $question['question'][0]['time_created'] ?></span>
        <span class="glyphicon glyphicon-book"></span>
        <span class="label label-primary"><?= $question['question'][0]['category'] ?></span>
        <!--        to-be removed-->
        <!--        to-be removed-->
        <span class="label label-warning">votes: <?= $question['question'][0]['vote_result'] ?></span>
        <!--        to-be removed-->
        <!--        to-be removed-->
        <p class="text-info">
            <span class="glyphicon glyphicon-tag"></span>
            <span>
                <?php
                foreach ($question['tags'] as $tag) : ?>
                    <span class="label label-info"><?= $tag['name'] ?></span>
                <?php
                endforeach ?>
            </span>
        </p>
    </div>
</div>
<?php foreach ($question['answers'] as $answer) :
    ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-user"></span>
                <span><strong><?= $answer['username'] ?></strong></span>
                <span><em> answered:</em></span>
            </h3>
        </div>

        <div class="panel-body">
            <?= $answer['text'] ?>
        </div>
        <div class="panel-footer">
            <span class="glyphicon glyphicon-time"></span>
            <span class="label label-default"><?= $answer['time_created'] ?></span>
        </div>
    </div>
<?php endforeach; ?>