<div class="menu">
<!--    --><?php //var_dump($countBasket); ?>
    <a href="/">Главная</a>
    <a href="/product/catalog">Каталог</a>
    <a href="/feedback/all">Отзывы</a>
    <div>
        <? if ($isAuth): ?>
            <a href="/myorders/all/?id=<?=$myOrders?>"><?= $username ?></a>
            <a href="/auth/logout""><img class="menu__icon" src="/img/icon/logout.svg" alt="logout"></a>
        <?else: ?>
<!--        <a class="menu__basket" href="/login/enter"></span> <img class="menu__icon"  src="/img/icon/login.svg" alt="login"></a>-->
        <a class="menu__basket" href="/login/enter"> <div class="menu__iconLogin"></div> </a>
        <?endif; ?>
    </div>
    <a class="menu__basket" href="/basket/goods">
<!--        <img class="menu__icon" src="/img/icon/shopping_cart.svg" alt="shopping_cart">-->
        <div class="menu__iconCart">
            <div class="menu__span" id="countBasket">(<?= $countBasket ?: 0 ?>)</div>
<!--            <div class="menu__span" id="countBasket">(--><?//= $countBasket?><!--)</div>-->
        </div>
    </a>
</div>

