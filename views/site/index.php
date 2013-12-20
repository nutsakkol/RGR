<h1>Добро пожаловать!</h1>
<p>
    <?php if (!Route::user()): ?>
        Пожалуйста пройдите авторизацию <a href="/users/">Войти</a> или <a href="/users/signUp">Регистрация</a>
        или <a href="/users/PasswordRecover">Восстановить</a>
    <?php else: ?>
        Здравствуй! <?= $_SESSION['userName'] ?> <a href="/users/logout">Выйти???</a>
    <?php endif; ?>
</p>