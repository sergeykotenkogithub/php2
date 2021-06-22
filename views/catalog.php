<div hidden id="count">0</div>

<?php foreach ($catalog as $item): ?>

<!--    <a href="/?c=product&a=card&id=--><?//=$item->id?>
    <div id="addAsyncCatalog" class="goods">

        <a href="/?c=product&a=card&id=<?=$item->id?>">
            <img class="goods__img" src="/img/goods/<?=$item->image?>" alt="">
        </a>

        <div class="goods__buy">
            <p class="goods__name"> <?=$item->name?> </p>
            <p class="goods__price rub">Цена: <?=$item->price?></p>
            <a class="goods__iconBuy" href="#"><img src="/img/icon/cart.svg" alt=""></a>
        </div>

    </div>

<?php endforeach;?>


<div id="addCatalog">

</div>

<!--<a href="/?c=product&a=catalog&page=--><?//=$page?><!--">Ещё</a>-->

<script src="/script/script.js?<?php echo uniqid();?>"></script>