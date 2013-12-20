<?php

class UsersController extends Controller
{
    public function actionIndex()
    {
        if (isset($_POST['Auth'])) {
            foreach ($_POST['Auth'] as $key => $item) {
                $$key = mysql_real_escape_string($item);
            }
            $password = md5($password);
            $query = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
            $result = mysql_query($query);
            $user = mysql_fetch_array($result);
            $num_rows = mysql_num_rows($result);
            if ($num_rows !== 0) {
                $_SESSION['auth'] = true;
                $_SESSION['userName'] = $user['name'];
                header('Location: /');
            } else {
                $response = 'Не правильный логин или пароль пожалуйста введите данные повторно!';
            }
        }
        $this->view->render('user/signIn', 'templateView', array('response' => $response));
    }

    public function actionSignUp()
    {
        if (isset($_POST['Registration'])) {
            foreach ($_POST['Registration'] as $key => $item) {
                $$key = mysql_real_escape_string($item);
            }
            $password = ($password == $confirmPassword) ? md5($password) : null;
            if ($password !== null) {
                $query = mysql_query("INSERT INTO users(name,email,password)
                    VALUES('$name', '$email', '$password')");
                $response = ($query)
                    ? 'Вы успешно зарегистрировались <br/> <a href="/users/">Войти</a>'
                    : 'Произошла ошибка при регистрации';
            } else {
                $response = 'Введите пароль повторно!';
            }
        }
        $this->view->render('user/signUp', 'templateView', array('response' => $response));
    }

    public function actionPasswordRecover()
    {
        if (isset($_POST['Recover'])) {
            extract($_POST['Recover']);
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysql_query($query);
            $user = mysql_fetch_array($result);
            $num_rows = mysql_num_rows($result);
            if ($num_rows !== 0) {
                $newPass = $this->randomPass();
                $query = mysql_query("UPDATE users SET password = '{$newPass}' WHERE email = '{$email}'");
                $message = "Здравствуйте, " . $user['name'] . "\nВаш логин " . $user['name'] . "\nВаш пароль " . $newPass . " ";
                mail($user['email'], 'Восстановление пароля', $message);

                $response = 'На ваш емайл было отправлено сообщение с новым паролем';
            } else {
                $response = 'Ошибка пользователь с такм email не был найден';
            }
        }
        $this->view->render('user/recoverPassword', 'templateView', array('response' => $response));
    }

    public function actionLogout()
    {
        session_destroy();
        header('Location: /');
    }
}