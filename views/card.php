<div class="goodsOne">
    <h1 class="goodsOne__title"><?=$item->name?></h1>
    <img class="goodsOne__img" src="/img/goods/<?=$item->image?>" alt="goods">
    <div class="goodsOne__description"><?=$item->description?></div>
    <div class="goodsOne__price rub">Цена: <?=$item->price?></div>
    <button class="goodsOne__btn goodsAsync btn" data-id="<?=$item->id?>" data-price="<?=$item->price?>">Купить</button>
</div>

<script src="/script/async/buy.js?<?php echo uniqid();?>"></script>