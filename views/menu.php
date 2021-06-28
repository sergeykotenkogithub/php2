<div class="menu">
    <a href="/">Главная</a>
    <a href="/product/catalog">Каталог</a>
    <a href="/feedback/all">Отзывы</a>
    <div>
        <? if ($isAuth): ?>
            <a href="/myorders/all/?id=<?=$myOrders?>"><?= $username ?></a>
            <a href="/auth/logout""><img class="menu__icon" src="/img/icon/logout.svg" alt="logout"></a>
        <?else: ?>
        <a class="menu__basket" href="/login/enter"><img src="" alt=""></span> <img class="menu__icon"  src="/img/icon/login.svg" alt="login"></a>
        <?endif; ?>
    </div>

    <a class="menu__basket" href="/basket/goods"><img class="menu__icon" src="/img/icon/shopping_cart.svg" alt="shopping_cart"><span class="menu__span" >(0)</span></a>
</div>

