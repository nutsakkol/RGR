<?php
include('db.php');

session_start();

if (isset($_POST['Registration'])) {
    $password = md5($_POST['Registration']['password']);
    $query = mysql_query("INSERT INTO users(name,email,password)
                    VALUES('{$_POST['Registration']['name']}',
                            '{$_POST['Registration']['email']}',
                            '$password')") or die(mysql_error());
    echo 'Регистрация прошла успешно!';
}

if(isset($_POST['Auth'])) {
    $password = md5($_POST['Auth']['password']);
    $query = mysql_query("SELECT * FROM users
                        WHERE name = '{$_POST['Auth']['name']}' AND password = '$password'");
    $user = mysql_fetch_assoc($query);
    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['userName'] = $user['name'];
    } else {
        echo 'Повторно заполните форму';
    }
}
if($_GET['exit']){
    session_destroy();
    header('Location: /');
}

if(!isset($_SESSION['login'])){
    include('registrationForm.php');
    include('loginForm.php');
} else {
    echo "Hi, ".$_SESSION['userName'] . '<br/><a href="/index.php?exit=1">Выход</a>';
}


?>

