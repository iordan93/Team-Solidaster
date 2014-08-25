<?php
if (!empty($_SESSION)):
    if (isset($_SESSION["messages"])):
        $messages = $_SESSION["messages"];
        if (!empty($messages)):
            foreach ($messages as $message):
                $type = key($message); ?>
                <div class="alert alert-dismissible alert-<?= $type ?>"><?= $message[$type] ?></div>
            <?php
            endforeach;
        endif;
    endif;
endif;?>