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

                        echo "<a class=\"list-group-item\" href=\"" . ABS_ROOT_URL . "categories/view/{$category["id"]}\"><span class='badge'>{$category["questions_count"]}</span>{$category["name"]}</a>";
                    }
                    ?>
                </ul>
                <a class="btn btn-danger btn-lg" style="color: #ffffff !important" href="<?= ABS_ADMIN_ROOT_URL ?>">Danger zone</a>
            <?php else: ?>
                <ul class="list-group">
                    <?php
                    foreach ($model["categories"] as $category) {

                        echo "<a class=\"list-group-item\" href=\"" . ABS_ROOT_URL . "categories/view/{$category["id"]}\"><span class='badge'>{$category["questions_count"]}</span>{$category["name"]}</a>";
                    }
                    ?>
                </ul>
            <?php endif; ?>
        </main>
    </div>
</aside>
<div class="clearfix"></div>
