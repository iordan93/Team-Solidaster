<?php
include_once "controllers/CategoriesController.php";
$controller = new \Controllers\CategoriesController();
$model = $controller->all();
?>

<aside id="sidebar-home" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
    <div class="sidebar">
        <header>
            <h3><?= $model["title"] ?></h3>
        </header>
        <main>
            <?php
            $auth = \Lib\Auth::getInstance();
            if ($auth->isAdmin()): ?>
            <ul class="list-group">
                <?php
                foreach ($model["categories"] as $category) {

                    echo "<li class=\"list-group-item\"><span class='badge'>{$category["questions_count"]}</span>" .
                        "<a href=\"" . ABS_ROOT_URL . "categories/view/{$category["id"]}\">{$category["name"]}</a></li>";
                }
                ?>
                    <a href="<?=ABS_ROOT_URL ."categories/add"?>" class="list-group-item">Add Category<span class="glyphicon glyphicon-plus"></span></a>
            </ul>
            <?php else: ?>
            <ul class="list-group">
                <?php
                foreach ($model["categories"] as $category) {

                    echo "<li class=\"list-group-item\"><span class='badge'>{$category["questions_count"]}</span>" .
                        "<a href=\"" . ABS_ROOT_URL . "categories/view/{$category["id"]}\">{$category["name"]}</a></li>";
                }
                ?>
            </ul>
            <?php endif; ?>
        </main>
    </div>
</aside>
<div class="clearfix"></div>
