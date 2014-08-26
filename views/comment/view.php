<ul class="list-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <?php foreach($comments as $comment):?>
        <li class="list-group-item"><a href="view/1"><?= $comment["name"] ?></a><span class="badge"><?= $comment["posts_count"] ?></span></li>
    <?php endforeach; ?> 
</ul>