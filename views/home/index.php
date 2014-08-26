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
                        <span class="glyphicon glyphicon-time"></span><?= $question['time_created']?>
                        <span class="glyphicon glyphicon-user"></span><a href="#"></a>
                        <a href="<?= ABS_ROOT_URL ?>categories/view/<?= $question['category_id'] ?>"><?= $question['category']?></a>
                    </div>
                    <hr/>
                    <div>
                        <span class="glyphicon glyphicon-time"></span><?= $question['time_created']?>
                        <span class="glyphicon glyphicon-user"></span><a href="#"></a>
                        <a href="<?= ABS_ROOT_URL ?>categories/view/<?= $question['category_id'] ?>"><?= $question['category']?></a>
                    </div>
                </div>
            </div>
    <?php
    }
    ?>
