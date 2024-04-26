<?php
session_start(); 
function redirect(string $path){
    header("Location: $path");
    die();
}

function chekAuth(){
    if (!empty($_SESSION['user'])){
        redirect('/TulaHack2024Spring/index.php');}}


