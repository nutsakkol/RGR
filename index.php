<?php
include('db.php');

session_start();

if (isset($_POST['Registration'])) {
    $password = md5($_POST['Registration']['password']);
    $query = mysql_query("INSERT INTO users(name,email,password)
                    VALUES('{$_POST['Registration']['name']}',
                            '{$_POST['Registration']['email']}',
                            '$password')") or die(mysql_error());
    echo 'success';
}
?>

<form method="post" action="">
    <input type="text" name="Registration[name]" placeholder="name" required/><br>
    <input type="text" name="Registration[email]" placeholder="email" required/><br>
    <input type="password" name="Registration[password]" placeholder="password" required/><br>
    <input type="submit" name="submit" value="Register"/>
</form>