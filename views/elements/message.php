<?php
if (!empty($_SESSION)) {
    if (isset($_SESSION["messages"])) {
        $messages = $_SESSION["messages"];
        $newMessages = array();
        if (!empty($messages)) {
            foreach ($messages as $message) {
                $lifetime = $message[0];
                $type = $message[1];
                $text = $message[2];
                if ($lifetime > 0) {
                    echo "<div class=\"alert alert-dismissible alert-{$type}\">{$text}</div>";
                }

                if ($lifetime - 1 >= 0) {
                    $newMessages[] = array($lifetime - 1, $type, $text);
                }
            }
        }

        $_SESSION["messages"] = $newMessages;
    }
}