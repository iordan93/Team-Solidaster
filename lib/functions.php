<?php
function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

function mergeKeysAndValues($array, $separator = " ") {
    $result = array();
    foreach ($array as $key => $value) {
        $result[] = "{$key}{$separator}{$value}";
    }

    return $result;
}