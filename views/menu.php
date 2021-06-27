<?php if ($isAuth): ?>
    Добро пожаловать <?= $username ?> <a href="/auth/logout">[Выход]</a>
<?php else: ?>
<form action="/auth/login/" method="post">
    <input type="text" name="login" placeholder="Логин">
    <input type="text" name="pass" placeholder="Пароль">
    <div class="save">
        <div>Save</div><input class="login__checkbox" type="checkbox" name="save">
    </div>
    <input type="submit" name="submit" value="Войти">
</form>
<?php endif; ?>

<?= $noauth ?>

<?php if ($isAdmin): ?>
Это точно Админ
<?php endif;?>
<div class="menu">
    <a href="/">Главная</a>
    <a href="/product/catalog">Каталог</a>
    <a href="/feedback/all">Отзывы</a>
    <a class="menu__basket" href="/basket/goods"><img class="shopping" src="/img/icon/shopping_cart.svg" alt="shopping_cart"><span class="menu__span" >(0)</span></a>
</div>

