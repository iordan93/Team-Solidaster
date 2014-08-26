<?php require_once realpath("views/elements/header.php"); ?>
    <div id="wrapper">
        <?php require_once realpath("views/elements/message.php"); ?>
        <main class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
            <?php require_once $templateFileName; ?>
        </main>
        <?php require_once realpath("views/elements/sidebar.php"); ?>
    </div>
<?php require_once realpath("views/elements/footer.php"); ?>
