<div style="width: 300px; margin: 20px auto; padding: 10px; border: 1px double #eeeeee; border-radius: 4px;">
    <form method="post" action="">
        <label for="name">Имя пользователя</label>
        <input id="name" type="text" name="Registration[name]" style="width: 100%"
               value="<?= (!empty($_POST['Registration']['name'])) ? $_POST['Auth']['name'] : '' ?>"
               placeholder="Имя" required/><br>
        <label for="email">Почта</label>
        <input id="email" type="text" name="Registration[email]" style="width: 100%"
               value="<?= (!empty($_POST['Registration']['email'])) ? $_POST['Auth']['email'] : '' ?>"
               placeholder="user@example.com" required/><br>
        <label for="pass">Пароль</label>
        <input id="pass" type="password" name="Registration[password]" style="width: 100%"
               value="<?= (!empty($_POST['Registration']['email'])) ? $_POST['Auth']['email'] : '' ?>"
               placeholder="Пароль" required/><br>
        <label for="pass">Повторно введите пароль</label>
        <input id="pass" type="password" name="Registration[confirmPassword]" style="width: 100%"
               value="<?= (!empty($_POST['Registration']['confirmPassword'])) ? $_POST['Auth']['confirmPassword'] : '' ?>"
               placeholder="Пароль" required/><br>
        <input type="submit" name="submit" style="width: 100%" value="Register"/>
    </form>
</div>