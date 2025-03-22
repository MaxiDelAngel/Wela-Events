<?php

function debuguear($variable):string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitiza el HTML
function s($html):string
{
    $s = htmlspecialchars($html);
    return $s;
}

// Proximamente envio de correos