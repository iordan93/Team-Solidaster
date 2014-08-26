<?php foreach ($questions as $question) {
    var_dump($question)
    ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="<?= ABS_ROOT_URL ?>questions/details/<?= $question['id'] ?>">
                        <h3><?= $question['title'] ?></h3>
                    </a>

                </div>
                <div class="panel-body">
                    <div>
                        <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<a href="#">username!!!!</a>
                        &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;<?= $question['time_created']?>
                        &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;<a href="<?= ABS_ROOT_URL ?>categories/view/<?= $question['category_id'] ?>"><?= $question['category']?></a>
                    </div>
                    <hr/>
                    <div>
                        <!--                        <div>-->
                        <!--                            <form>vote!!!!!</form>-->
                        <!--                        </div>-->
                        <div>
                            <span class="glyphicon glyphicon-ok"></span><?= $question['vote_result']?>
                            &nbsp;&nbsp;
                            <span class="glyphicon glyphicon-eye-open"></span><?= $question['times_viewed']?>
                            &nbsp;&nbsp;
                            <span class="glyphicon glyphicon-comment"></span><?= $question['answers_count']?>
                        </div>
                    </div>
                </div>
            </div>
<?php
}
?>