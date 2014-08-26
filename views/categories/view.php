<div class="col-sm-12 clearfix">
    <ul>

        <div class="well">
            <h2>
                <?php echo $category['name'] ?>
            </h2>

            <h3>
                <?php echo '[' . $category['description'] . ']' ?>
            </h3>
        </div>

        <?php foreach ($questions as $question) {
            ?>
            <li>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href="../questions/details/<?= $question['id']?>">
                        <h3><?= $question['title'] ?></h3>
                        </a>
                    </div>
                    <div class="panel-body">
                        <a href="#" class="btn btn-info">Votes</a>
                        <a href="#" class="btn btn-success">Answers</a>
<!--                        <p class="text-info">--><?//= $question['text'] ?><!--</p>-->


                    </div>
                </div>
            </li>
        <?php
        }
        ?>

    </ul>
</div>
<?php


//var_dump($category);
//var_dump($questions);
//var_dump($query);