<?php if($isAdmin): ?>
    <div class="admin">
         <div class="admin__title">Заказы:</div>
        <?php foreach ($orderAll as $item):?>
            <a href="/admin/adminOrder/?id=<?=$item->id?>">
                <div class="admin__order">
                    <div>Заказ №: <?=$item->id?></div>
                    <div class="admin__info">
                        <div>Телефон: <?=$item->tel?></div>
                        <div>email: <?=$item->email?></div>
                        <div>статус: <?=$item->status?></div>
                        <div>Дата: <?=$item->date?></div>
                    </div>
                </div>
            </a>
        <?php endforeach;?>
    </div>
<? else: ?>
   <div>Нет доступа</div>
<?php endif;?>


