<main>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-user"></span>
                <!--                --><? //=var_dump($question['question']) ?>
                <a href="<?= ABS_ROOT_URL ?>profile/show/<?= $question['question'][0]['user_id'] ?>">
                    <span><strong> <?= htmlentities($question['question'][0]['author']) ?></strong></span></a>

            <span><em> asked:
                    <?= htmlentities($question['question'][0]['title']) ?>
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
            <span class="label label-primary"><?= htmlentities($question['question'][0]['category']) ?></span>
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
            <?php
            $auth = \Lib\Auth::getInstance();
            if ($auth->isAuthenticated())
                : ?>

                <a href="<?= ABS_ROOT_URL ?>answers/add/<?= $question['question'][0]['id'] ?>" class="btn btn-link">
                <span class="text-danger">
                    <span class="glyphicon glyphicon-comment"></span>
                    <span class="label label-danger">Add answer!</span>
                </span>
                </a>
            <?php endif; ?>

            <!--        to-be removed-->
            <!--        to-be removed-->
            <p class="text-info">
                <span class="glyphicon glyphicon-tag"></span>
            <span>
                <?php
                foreach ($question['tags'] as $tag) : ?>
                    <span class="label label-info"><?= htmlentities($tag['name']) ?></span>
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
                    <a href="<?= ABS_ROOT_URL ?>profile/show/<?= $answer['user_id'] ?>">
                        <span class="glyphicon glyphicon-user"></span>
                        <span><strong><?= htmlentities($answer['username']) ?></strong></span>
                        <span><em> answered:</em></span>
                    </a>
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
                <!--                add comment icon here!!!-->
                <?php
                if ($auth->isAuthenticated()) : ?>

                    <a href="<?= ABS_ROOT_URL ?>comments/add/<?= $answer['id'] ?>" class="btn btn-link">
                                        <span class="text-danger">
                                            <span class="glyphicon glyphicon-comment"></span>
                                            <span class="label label-danger">Add comment!</span>
                                        </span>
                    </a>
                <?php endif; ?>
                <!--                add comment icon here!!!-->
            </div>
            <?php
            if (count($answer['comments']) > 0):
                echo('&nbsp');
                foreach ($answer['comments'] as $comment) : ?>

                    <div class="col-sm-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-user"></span>
                                <span><strong><?= htmlentities($comment['username']) ?></strong></span>
                                <span><em> answered:</em></span>
                            </div>
                            <div class="panel-body">
                                <?php echo(htmlentities($comment['text']));
                                ?>
                                <div class="text-muted">
                                    <span class="glyphicon glyphicon-time"></span>
                                    <span class="label label-default"><?= $comment['time_created'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php
                endforeach;
            endif;
            ?>
        </div>

    <?php endforeach;
    ?>
</main>