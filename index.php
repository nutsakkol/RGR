<?php
session_start();
include('./Methods.php');

$object = new Methods();

if (isset($_POST['Auth'])) {
    if ($object->auth($_POST['Auth'])) {
        header('Refresh: 3;url=/');
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    header('Location: /');
}

if ($_SESSION['auth']) {
    echo 'cool ' . $_SESSION['userName'] . '<a href="/index.php?logout">Выйти</a>';
} else {
    include('view/login.php');
}
