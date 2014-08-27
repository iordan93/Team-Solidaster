<main>
    <div class="col-sm-12 clearfix">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>
                    <?php echo htmlentities($category['name']) ?>
                </h3>
            </div>
            <div class="panel-body">
                <h4>
                    <?php echo '[' . htmlentities($category['description']) . ']' ?>
                </h4>
            </div>
        </div>

        <?php foreach ($questions as $question) : ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="<?= ABS_ROOT_URL ?>questions/details/<?= $question['id'] ?>">
                        <h4><strong>
                                <span class="glyphicon glyphicon-user"> </span>
                                <?= $question['username'] ?>
                            </strong>
                            <em> asked:
                                <?= $question['title'] ?>
                            </em>
                        </h4>
                    </a>
                </div>

                <div class="panel-body">
                    <p class="text-info"><?php
                        echo substr($question['text'], 0, 100);
                        if (strlen($question['text']) > 100):
                            echo "...";
                        endif;
                        ?>
                    </p>
                </div>

                <div class="panel-footer">
                <span class="text-muted">
                    <span class="glyphicon glyphicon-time"></span>
                    <span class="label label-default"><?= $question['time_created'] ?></span>
                </span>
                    &nbsp;
                <span class="text-info">
                    <span class="glyphicon glyphicon-eye-open"></span>
                    <span class="label label-info"><?= $question['times_viewed'] ?>
                        <?php
                        if ($question['times_viewed'] == 1) {
                            echo(" view");
                        } else {
                            echo(" views");
                        }
                        ?>
                    </span>
                    &nbsp;
                </span>
                    <!--        to-be removed? -->
                    <!--        to-be removed? -->
                <span class="text-warning">
                <span class="glyphicon glyphicon-plus-sign"></span>
                <span class="label label-warning"><?= $question['vote_result'] ?>
                    <?php
                    if ($question['vote_result'] == 1) {
                        echo(" vote");
                    } else {
                        echo(" votes");
                    }
                    ?>
                </span>
                </span>
                    <!--        to-be removed? -->
                    <!--        to-be removed? -->
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</main>