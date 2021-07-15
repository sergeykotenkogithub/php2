<div class="wrapperMyorder">
    <h1 class="wrapperMyorder__title">Заказы:</h1>

<!--    --><?php //var_dump($order); ?>

    <? if(empty($order)): ?>
        <div class="wrapperMyorder__empty">
            У вас нет заказов
        </div>
    <?endif;?>

        <?php for($i = 0; $i < $count_orders - 1; ++$i): ?>
            <?php if ($order[$i]['id'] === $order[$i - 1]['id']): ?>
                <div></div>
            <?php else: ?>
            <div class="wrapperMyorder__order">
                <div class="myorder">Заказ №<?="{$order[$i]['id']}"?></div>
                <div class="status__order myorder"> Статус: <?="{$order[$i]['status']}"?></div>
                <div class="rub myorder__total myorder">Общая сумма: <?="{$order[$i]['total']}"?></div>
            </div>
            <?endif;?>
            <div class="basket myorderBasket">
                <div class="basket__name"><?="{$order[$i]['name']}"?> </div>
                <div>
                    <img src="/img/goods/<?="{$order[$i]['image']}"?>" width="100">
                </div>
                <div class="rub basket__price"><?="{$order[$i]['price']}"?></div>
                <div class="basket__quantity">Кол-во:<?="{$order[$i]['quantity']}"?></div>
            </div>
        <?endfor;?>
</div>