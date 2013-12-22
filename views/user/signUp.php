<div class="response">
    <?= $response ?>
</div>

<div style="width: 300px; margin: 20px auto; padding: 10px; border: 1px double #eeeeee; border-radius: 4px;">
    <form method="post" action="">
        <label for="name">Имя пользователя</label>
        <input id="name" type="text" name="Registration[name]" style="width: 100%" placeholder="Имя"
               value="<?= $data['name'] ?>"
               required/><br>
        <label for="email">Почта</label>
        <input id="email" type="text" name="Registration[email]" style="width: 100%"
               value="<?= $data['email'] ?>"
               placeholder="user@example.com"
               required/><br>
        <label for="pass">Пароль</label>
        <input id="pass" type="password" name="Registration[password]" style="width: 100%"
               value="<?= $data['password'] ?>"
               placeholder="Пароль"
               required/><br>
        <label for="confirm_pass">Повторить пароль</label>
        <input id="confirm_pass" type="password" name="Registration[confirmPassword]"
               value="<?= $data['confirmPassword'] ?>"
               style="width: 100%"
               placeholder="Повторить пароль"
               required/><br>
        <input type="submit" name="submit" style="width: 100%" value="Register"/>
    </form>
</div>