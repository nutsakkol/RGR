<div style="width: 300px; margin: 20px auto; padding: 10px; border: 1px double #eeeeee; border-radius: 4px;">
    <form method="post" action="">
        <label for="name">Имя пользователя</label>
        <input id="name" type="text" name="Auth[name]" placeholder="Имя" style="width: 100%"
               value="<?= (!empty($_POST['Auth']['name'])) ? $_POST['Auth']['name'] : '' ?>"
               required/><br>

        <label for="pass">Пароль</label>
        <input id="pass" type="password" name="Auth[password]" placeholder="Пароль"
               value="<?= (!empty($_POST['Auth']['password'])) ? $_POST['Auth']['password'] : '' ?>"
               style="width: 100%" required/><br>
        <input type="submit" name="enter" style="width: 100%" value="Log In"/>
    </form>
</div>