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
<header>
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <form class="navbar-form navbar-left">
                <input type="text" class="form-control col-lg-8" placeholder="Username">
                <input type="password" class="form-control col-lg-8" placeholder="Password">
                <input class="btn btn-primary" type="submit" name="commit" value="Login">
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Register</a></li>
            </ul>
        </div>
    </div>
</header>