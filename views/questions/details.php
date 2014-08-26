<ul>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><strong><?= $question['question'][0]['author'] ?></strong><span><em>
                        asked: </em></span><?= $question['question'][0]['title'] ?></h3>
        </div>
        <div class="panel-body">
            <?= $question['question'][0]['text'] ?>
        </div>
        <div class="panel-footer">
            <span class="label label-default"><?= $question['question'][0]['time_created'] ?></span>
            <span class="label label-warning">votes: <?= $question['question'][0]['vote_result'] ?></span>
            <span class="label label-primary">category: <?= $question['question'][0]['category'] ?></span>

            <p class="text-info">tags: <?php
                foreach ($question['tags'] as $tag) : ?>
                    <span class="label label-info"><?= $tag['name'] ?></span>
                <?php
                endforeach ?>
            </p>
        </div>
    </div>
    <?php foreach ($question['answers'] as $answer) :
        ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><strong><?= $answer['username'] ?></strong><span><em> answered:</em></span></h3>
            </div>


            <div class="panel-body">
                <?= $answer['text'] ?>
            </div>
            <div class="panel-footer">
                <span class="label label-default"><?= $answer['time_created'] ?></span>
            </div>
        </div>
    <?php endforeach; ?>

</ul>