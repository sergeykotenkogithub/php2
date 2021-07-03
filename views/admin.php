<?php if($isAdmin): ?>
    <div>
        <div> <h2>Заказы:</h2> </div>
        <?php foreach ($orderAll as $item):?>
            <a href="/admin/adminOrder/?id=<?=$item->id?>">
                <div>
                    <h3>Заказ №: <?=$item->id?></h3>
                    <div>Телефон: <?=$item->tel?></div>
                    <div>email: <?=$item->email?></div>
                    <div>Дата: <?=$item->date?></div>
                </div>
            </a>
            <hr>
        <?php endforeach;?>
    </div>
<? else: ?>
   <div>Нет доступа</div>
<?php endif;?>

<?php //var_dump($orderAll); ?>
