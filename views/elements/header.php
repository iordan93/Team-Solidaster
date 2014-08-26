<?php
include_once "models/QuestionModel.php";
$model = new \Models\QuestionModel();
$result = $model->getAll(array(
    "columns" => "count(*)"
));
$count = intval($result[0]["count(*)"])
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= $pageTitle ?></title>
    <link href="<?= ABS_ROOT_URL ?>content/bootstrap.css" rel="stylesheet"/>
    <link href="<?= ABS_ROOT_URL ?>content/bootstrap-theme.css" rel="stylesheet"/>
    <link href="<?= ABS_ROOT_URL ?>content/site.css" rel="stylesheet"/>

    <script src="<?= ABS_ROOT_URL ?>scripts/lib/jquery-2.1.1.js"></script>
    <script src="<?= ABS_ROOT_URL ?>scripts/lib/bootstrap.js"></script>
    <script src="<?= ABS_ROOT_URL ?>scripts/app.js"></script>
</head>
<body>
<header id="header">
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <a class="navbar-brand" href="<?=ABS_ROOT_URL ."home/index"?>">
                <div class="clearfix logo">
                    <span class="navbar-brand rotate2">SOLID</span>
                    <span class="dis">(dis)</span>
                    <span class="navbar-brand rotate1">ASTER</span>
                </div>
            </a>
            <?php
            $auth = \Lib\Auth::getInstance();
            if ($auth->isAuthenticated()): ?>
                <ul class="nav nav-pills">
                    <li class="active"><a href="<?=ABS_ROOT_URL ."questions/add"?>">Add new question </a></li>
                    <li class="active"><a href="<?=ABS_ROOT_URL ."home/index"?>">Home <span class="badge"><?= $count ?></span></a></li>
                    <li class="active"><a href="<?= ABS_ROOT_URL ?>profile/show/<?= $_SESSION[KEY_USER_ID] ?>">Hello, <?= $_SESSION[KEY_USERNAME] ?>!</a></li>
                    <li class="active"><a href="<?= ABS_ROOT_URL ?>profile/logout">Logout <span class="glyphicon glyphicon-log-out"></a></span></li>
                </ul>

            <?php else: ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form navbar-left" method="post" action="<?= ABS_ROOT_URL ?>profile/login">
                            <input type="text" name="loginUsername" required class="form-control col-lg-8" placeholder="Username">
                            <input type="password" name="loginPassword" required class="form-control col-lg-8" placeholder="Password">
                            <input class="btn btn-primary" type="submit" name="commit" value="Login">
                        </form>
                    </li>
                    <li class="active"><a href="<?= ABS_ROOT_URL ?>profile/register">Register</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</header>