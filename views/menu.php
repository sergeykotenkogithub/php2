<div class="menu">
<!--    --><?php //var_dump($countBasket); ?>
    <a href="/">Главная</a>
    <a href="/product/catalog">Каталог</a>
    <a href="/feedback/all">Отзывы</a>
    <? if ($isAuth): ?>
        <div class="menu__logout">
            <?if ($isAdmin) :?>
                 <a class="menu__Admin" href="/admin""><div class="menu__iconAdmin"></div><div>Админ</div></a>
            <?else: ?>
                 <a href="/myorders/all/?id=<?=$myOrders?>"><?= $username ?></a>
            <?endif; ?>
                 <a href="/auth/logout""><div class="menu__iconLogout"></div></a>
        </div>
    <?else: ?>
    <a class="menu__basket" href="/login/enter">
        <div class="menu__iconLogin"></div>
    </a>
    <?endif; ?>
    <a class="basketMenu" href="/basket/goods">
        <div class="menu__iconCart"> </div>
        <div class="menu__span" id="countBasket"><?= $countBasket ?: 0 ?></div>
    </a>
</div>

