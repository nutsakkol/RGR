<?php

class UsersModel extends Model
{
    public function model($className = __CLASS__)
    {
        $className = explode('Model', $className);
        return $className[0];
    }

    public function attributeLabels($form)
    {
        return array(
            'name' => $_POST[$form]['name'],
            'password' => $_POST[$form]['password'],
            'email' => $_POST[$form]['email'],
            'confirmPassword' => $_POST[$form]['confirmPassword'],
        );
    }

    public function authUser($array)
    {
        extract($array);
        $password = md5($password);
        $password = mysql_real_escape_string($password);
        $name = mysql_real_escape_string($name);
        $query = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
        $result = mysql_query($query);
        $user = mysql_fetch_array($result);
        $num_rows = mysql_num_rows($result);
        if ($num_rows !== 0) {
            $_SESSION['auth'] = true;
            $_SESSION['userName'] = $user['name'];
            return true;
        }

        return false;
    }

    public function signUpUser($array)
    {
        extract($array);
        $password = ($password == $confirmPassword) ? mysql_real_escape_string(md5($password)) : null;
        $name = mysql_real_escape_string($name);
        $email = mysql_real_escape_string($email);
        if ($password !== null) {
            $query = mysql_query("INSERT INTO users(name,email,password)
                    VALUES('$name', '$email', '$password')");
            if ($query) {
                return true;
            }
        }
        return false;
    }

    public function issetUser($array)
    {
        extract($array);
        $name = mysql_real_escape_string($name);
        $email = mysql_real_escape_string($email);
        $query = "SELECT * FROM users WHERE name = '$name' OR email = '$email'";
        $result = mysql_query($query);
        $num_rows = mysql_num_rows($result);
        if ($num_rows !== 0) {
            return false;
        }
        return true;
    }

    public function recoverUser($array)
    {
        extract($array);
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysql_query($query);
        $user = mysql_fetch_array($result);
        $num_rows = mysql_num_rows($result);
        if ($num_rows !== 0) {
            $newPass = Controller::randomPass();
            $query = mysql_query("UPDATE users SET password = '{$newPass}' WHERE email = '{$email}'");
            $message = "Здравствуйте, " . $user['name'] . "\nВаш логин " . $user['name'] . "\nВаш пароль " . $newPass . " ";
            mail($user['email'], 'Восстановление пароля', $message);
            return true;
        }
        return false;
    }
}