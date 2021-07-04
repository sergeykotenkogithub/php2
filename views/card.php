<div class="goodsOne">
    <h1 class="goodsOne__title"><?=$good->name?></h1>
    <img class="goodsOne__img" src="/img/goods/<?=$good->image?>" alt="goods">
    <div class="goodsOne__description"><?=$good->description?></div>
    <div class="goodsOne__price rub">Цена: <?=$good->price?></div>
    <button class="goodsOne__btn goodsAsync btn" data-id="<?=$good->id?>" data-price="<?=$good->price?>">Купить</button>
</div>

<script src="/script/async/buy.js?<?php echo uniqid();?>"></script>