<div class="col-sm-12 clearfix">

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

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href="<?= ABS_ROOT_URL ?>questions/details/<?= $question['id'] ?>">
                            <h3><?= $question['title'] ?></h3>
                        </a>
                    </div>
                    <div class="panel-body">
                        <a href="#" class="btn btn-info">Votes</a>
                        <a href="#" class="btn btn-success">Answers</a>
                        <!--                        <p class="text-info">--><? //= $question['text'] ?><!--</p>-->


                    </div>
                </div>

        <?php
        }
        ?>

</div>
<?php
