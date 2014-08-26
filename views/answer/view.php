<ul class="list-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <?php foreach($answers as $answer):?>
        <li class="list-group-item"><a href="view/1"><?= $answer["name"] ?></a><span class="badge"><?= $answer["posts_count"] ?></span></li>
    <?php endforeach; ?> 
</ul>