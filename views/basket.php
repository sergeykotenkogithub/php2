<div class="wrapperBasket">
    <?php if (empty($basket)): ?>
    <div class="wrapperBasket__empty">
        Нет добавленных товаров
    </div>
    <?php else: ?>
    <div class="centerBasket">
        Товаров в корзине: <?=$count['count']?>
    </div>
    <?php foreach ($basket as $item): ?>
        <div class="basket" id="item<?=$item['basket_id']?>">
            <div class="basket__name"><?=$item['name']?> </div>
            <div>
                <img src="/img/goods/<?= $item['image'] ?>" width="100">
            </div>
            <div class="rub basket__price" id="price<?=$item['basket_id']?>"><?=$item['price']?></div>
            <div class="basket__quantity">Кол-во: <span id="quantity<?=$item['basket_id']?>"><?=$item['quantity']?></span> </div>
            <div>
                <button class="basket__delete basketBtn" data-id="<?=$item['basket_id']?>">Удалить</button>
            </div>
            <div>
                <button class="basket__add" data-id="<?=$item['basket_id']?>" data-goods="<?=$item['goods_id']?>"></button>
            </div>
            <div>
                <button class="basket__deleteOne" data-id="<?=$item['basket_id']?>" data-goods="<?=$item['goods_id']?>"></button>
            </div>
        </div>
    <?php endforeach;?>
    <div class="rub total centerBasket">Итого: <span id="basketSumm"><?=$sum?></span></div>
    <div class="order centerBasket"><a href="/orderform">Оформить заказ</a></div>
    <?endif; ?>
</div>

<script src="/script/async/basket/deleteWholly.js?<?php echo uniqid();?>"></script>
<script src="/script/async/basket/deleteOne.js?<?php echo uniqid();?>"></script>
<script src="/script/async/basket/add.js?<?php echo uniqid();?>"></script>