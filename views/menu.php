<div class="menu">
<!--    --><?php //var_dump($countBasket); ?>
    <a href="/">Главная</a>
    <a href="/product/catalog">Каталог</a>
    <a href="/feedback/all">Отзывы</a>
    <? if ($isAuth): ?>
        <div class="menu__logout">
            <a href="/myorders/all/?id=<?=$myOrders?>"><?= $username ?></a>
            <!--            <a href="/auth/logout""><img class="menu__icon" src="/img/icon/logout.svg" alt="logout"></a>-->
            <a href="/auth/logout""><div class="menu__iconLogout"></div></a>
        </div>

    <?else: ?>
<!--        <a class="menu__basket" href="/login/enter"></span> <img class="menu__icon"  src="/img/icon/login.svg" alt="login"></a>-->
    <a class="menu__basket" href="/login/enter">
        <div class="menu__iconLogin"></div>
    </a>
    <?endif; ?>
    <a class="menu__basket" href="/basket/goods">
<!--        <img class="menu__icon" src="/img/icon/shopping_cart.svg" alt="shopping_cart">-->
        <div class="menu__iconCart">
            <div class="menu__span" id="countBasket">(<?= $countBasket ?: 0 ?>)</div>
        </div>
    </a>
</div>

