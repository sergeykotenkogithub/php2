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
            <div class="rub basket__price"><?=$item['price']?></div>
            <div class="basket__quantity">Кол-во:<?=$item['quantity']?></div>
            <div class="basket__del" >
                <button class="basket__delete" data-id="<?=$item['basket_id']?>">Удалить</button>
            </div>
            <div class="basket__del">
                <a class="buy" href="/basket/?action=add&id=<?=$item['basket_id']?>">+</a>
            </div>
            <div class="basket__del">
                <a class="buy" href="/basket/?action=deleteitem&quantity=<?=$item['quantity']?>&id=<?=$item['basket_id']?>">-</a>
            </div>
        </div>
    <?php endforeach;?>
    <div class="rub total centerBasket">Итого: <?=$sum?> </div>
    <div class="order centerBasket"><a href="/order">Оформить заказ</a></div>
    <?endif; ?>
</div>

<script src="/script/async/delete.js?<?php echo uniqid();?>"></script>