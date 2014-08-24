<?php
require_once  realpath("views/elements/header.php");
echo "<main>";
require_once $templateFileName;
echo "</main>";
require_once realpath("views/elements/sidebar.php");
require_once realpath("views/elements/footer.php");