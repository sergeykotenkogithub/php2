<div class="wrapperLogin">
    <div>
        <div class="wrapperLogin__name">Вход:</div>
        <div class="login">
            <form class="login__form" action="/auth/login/" method="post">
                <input class="login__text" type="text" name="login" placeholder="Логин">
                <input class="login__text" type="text" name="pass" placeholder="Пароль">
                <div class="login__save save">
                    <div>Запомнить меня</div><input class="save__checkbox" type="checkbox" name="save">
                </div>
                <input class="login__submit" name="submit" type="submit" value="Войти">
            </form>
        </div>
        <div class="wrapperLogin__message">
            <?= $noAuth ?>
        </div>
    </div>

    <div>
        <div class="wrapperLogin__name">Регистрация:</div>
        <div class="login">
            <form class="login__form" action="/registration" method="post">
                <input class="login__text" type="text" name="login" placeholder="Логин">
                <input class="login__text" type="text" name="pass" placeholder="Пароль">
                <input class="login__submit" name="submit" type="submit" value="Зарегистрироваться">
            </form>
        </div>
        <div class="wrapperLogin__message">
            <?= $noRegistration ?>
        </div>
    </div>
</div>

