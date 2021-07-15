<?php if ($isAdmin): ?>

    <div class="adminOrderNumber">
        Заказ №<?=$status['id']?>
    </div>

    <div class="adminOrderWrapper">
        <div class="adminOrderWrapper__status"> Статус: <?=$status['status']?> </div>

        <div class="adminOrder">
            <form class="adminOrder__form" action="admin/adminOrder?id=<?=$status['id']?>" method="post">
                <input hidden type="text" name="status_id" value="<?=$status['id']?>">
                <select name="change">
                    <option value="Ожидайте звонка от оператора">Ожидайте звонка от оператора</option>
                    <option value="Передан на обработку">Передан на обработку</option>
                    <option value="Обрабатывается">Обрабатывается</option>
                    <option value="Подготовлен счёт на оплату">Подготовлен счёт на оплату</option>
                    <option value="Ожидаем поставку товара">Ожидаем поставку товара</option>
                    <option value="Едет в пункт выдачи">Едет в пункт выдачи</option>
                    <option value="Готов к получению">Готов к получению</option>
                    <option value="Передан в отдел доставки">Передан в отдел доставки</option>
                    <option value="Отменён">Отменён</option>
                    <option value="Передан курьеру">Передан курьеру</option>
                    <option value="Нам не удалось с Вами связаться">Нам не удалось с Вами связаться</option>
                    <option value="Выполнен">Выполнен</option>
                </select>
                <button class="adminOrder__btn" type="submit">Изменить статус</button>
            </form>
        </div>
    </div>



    <? foreach ($order as $item):?>
        <div class="wrapperBasket">
            <div class="basket">
                <div class="basket__name"><?=$item['name']?> </div>
                <div>
                    <img src="/img/goods/<?= $item['image'] ?>" width="100">
                </div>
                <div class="rub basket__price"><?=$item['price']?></div>
                <div class="basket__quantity">Кол-во:<?=$item['quantity']?></div>
            </div>
        </div>
    <?php endforeach;?>
    <hr>
    <div class="adminOrderSumm rub">Итого: <?=$summ->total?></div>
<?php else: ?>
    Нет доступа
<?php endif; ?>