<?php
session_start();
function redirect($path)
{
    header("Location: $path");
    die();
}

function chekAuth()
{
    if (!empty($_SESSION['user'])) {
        redirect('../index.php');
    }
}


function chekNotAuth()
{
    if (empty($_SESSION['user'])) {
        redirect('../index.php');
    }
}
