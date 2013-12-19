<?php
include('./Methods.php');

$object = new Methods();

if(isset($_POST['Registration'])){
    $result = $object->registration($_POST['Registration']);
    echo($result);
}

include('view/registration.php');