<div class="response">
    <?= $response ?>
</div>
<div style="width: 300px; margin: 20px auto; padding: 10px; border: 1px double #eeeeee; border-radius: 4px;">
    <form method="post" action="">
        <label for="name">Имя пользователя</label>
        <input id="name" type="text" name="Auth[name]" placeholder="Имя"
               value="<?=$_POST['Auth']['name']?>"
               style="width: 100%" required/><br>

        <label for="pass">Пароль</label>
        <input id="pass" type="password" name="Auth[password]" placeholder="Пароль"
               value="<?=$_POST['Auth']['password']?>"
               style="width: 100%" required/><br>
        <input type="submit" name="enter" style="width: 100%" value="Log In"/>
    </form>
</div>