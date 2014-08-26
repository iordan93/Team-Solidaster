<?php foreach ($questions as $question) {
    ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="<?= ABS_ROOT_URL ?>questions/details/<?= $question['id'] ?>">
                        <h4><?= $question['title'] ?></h4>
                    </a>
        </div>
        <div class="panel-body">
            <div>
                <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<a
                    href="<?= ABS_ROOT_URL ?>profile/show/<?= $question['user_id'] ?>"><?= $question['author'] ?></a>
                &nbsp;&nbsp;
                <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;<?= $question['time_created'] ?>
                &nbsp;&nbsp;
                <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;<a
                    href="<?= ABS_ROOT_URL ?>categories/view/<?= $question['category_id'] ?>"><?= $question['category'] ?></a>
            </div>
            <hr/>
            <div>
                <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;<?= $question['vote_result'] ?>
                &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-eye-open">&nbsp;&nbsp;<?= $question['times_viewed'] ?>
                            &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-comment"><?= $question['answers_count'] ?>
            </div>
        </div>
    </div>
<?php
}
?>
