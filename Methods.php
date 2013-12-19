<?php

include('./db.php');
class Methods extends db
{
    public $response;

    public function init()
    {
        $this->connect();
    }

    public function auth($data = null)
    {
        if ($data === null) {
            $this->CHttpException();
            return false;
        }

        foreach ($data as $key => $item) {
            if (isset($data[$key])) {
                $$key = mysql_real_escape_string($item);
            }
        }
        $password = md5($password);
        $query = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
        $result = mysql_query($query);
        $user = mysql_fetch_array($result);
        $num_rows = mysql_num_rows($result);
        if ($num_rows !== 0) {
            $_SESSION['auth'] = true;
            $_SESSION['userName'] = $user['name'];
        }

        return $_SESSION['auth'];
    }

    public function registration($data = null)
    {
        if ($data === null) {
            $this->CHttpException();
            return false;
        }

        foreach ($data as $key => $item) {
            if (isset($data[$key])) {
                $$key = mysql_real_escape_string($item);
            }
        }

        $password = ($password == $confirmPassword) ? md5($password) : null;
        if ($password !== null) {
            $query = mysql_query("INSERT INTO users(name,email,password)
                    VALUES('$name', '$email', '$password')");
            $this->response = ($query)
                ? 'Вы успешно зарегистрировались <br/> <a href="/">Войти</a>'
                : 'Произошла ошибка при регистрации';
        } else {
            $this->response = 'Повторный пороль введен не верно!';
        }

        return $this->response;
    }
}