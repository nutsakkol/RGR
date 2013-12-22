<?=$response?>

<div style="width: 300px; margin: 20px auto; padding: 10px; border: 1px double #eeeeee; border-radius: 4px;">
    <form method="post" action="">
        <label for="email">Введите емайл</label>
        <input id="email" type="text" name="Recover[email]" placeholder="email" style="width: 100%"
               value="<?= $data['email'] ?>"
               required/><br>
        <input type="submit" name="enter" style="width: 100%" value="Log In"/>
    </form>
</div>