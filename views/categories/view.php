<ul class="list-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<?php foreach($categories as $category):?>
    <li class="list-group-item"><a href="view/1"><?= $category["name"] ?></a><span class="badge"><?= $category["posts_count"] ?></span></li>
<?php endforeach; ?>
</ul>m