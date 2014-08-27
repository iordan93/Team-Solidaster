<main>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-user"></span>
                <span><strong> <?= $question['question'][0]['author'] ?></strong></span>
            <span><em> asked:
                    <?= $question['question'][0]['title'] ?>
                </em></span>
            </h3>
        </div>
        <div class="panel-body">
            <?= str_replace(PHP_EOL, "<br />", $question['question'][0]['text']) ?>
        </div>
        <div class="panel-footer">
        <span class="text-muted">
            <span class="glyphicon glyphicon-time"></span>
            <span class="label label-default"><?= $question['question'][0]['time_created'] ?></span>
        </span>
            &nbsp;
        <span class="text-primary">
            <span class="glyphicon glyphicon-book"></span>
            <span class="label label-primary"><?= $question['question'][0]['category'] ?></span>
        </span>
            &nbsp;
            <!--        to-be removed-->
            <!--        to-be removed-->
         <span class="text-warning">
                <span class="glyphicon glyphicon-plus-sign"></span>
        <span class="label label-warning"><?= $question['question'][0]['vote_result'] ?>
            <?php
            if ($question['question'][0]['vote_result'] == 1) {
                echo(" vote");
            } else {
                echo(" votes");
            }
            ?>
        </span>

             </span>
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
                <?= str_replace(PHP_EOL, "<br/ >", $answer['text']) ?>
            </div>
            <div class="panel-footer">
            <span class="text-muted">
                <span class="glyphicon glyphicon-time"></span>
                <span class="label label-default"><?= $answer['time_created'] ?></span>
            </span>
            </div>
        </div>
    <?php endforeach; ?>
</main>