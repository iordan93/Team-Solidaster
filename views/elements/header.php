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
            <?php
            $auth = \Lib\Auth::getInstance();
            if ($auth->isAuthenticated()): ?>
                <ul class="nav nav-pills">
                    <li class="active"><a href="#">Home <span class="badge">42</span></a></li>
                    <li class="active"><a href="#">Profile <span class="badge"></span></a></li>
                    <li class="active"><a href="#">????? <span class="badge">3</span></a></li>
                    <li class="active"><a href="profile/logout"><span class="glyphicon glyphicon-log-out">Logout</a></span></li>
                </ul>

            <?php else: ?>
                <form class="navbar-form navbar-left" method="post" action="profile/login">
                    <input type="text" name="loginUsername" required class="form-control col-lg-8" placeholder="Username">
                    <input type="password" name="loginPassword" required class="form-control col-lg-8" placeholder="Password">
                    <input class="btn btn-primary" type="submit" name="commit" value="Login">
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="profile/register">Register</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</header>