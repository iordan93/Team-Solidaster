<?php require_once realpath("views/elements/header.php"); ?>
    <div>
        <?php require_once realpath("views/elements/message.php"); ?>
        <main class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
            <?php require_once $templateFileName; ?>
        </main>
        <?php require_once realpath("views/elements/sidebar.php"); ?>
    </div>
<?php require_once realpath("views/elements/footer.php"); ?>