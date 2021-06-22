<div hidden id="count">0</div>

<?php foreach ($catalog as $item): ?>

    <div id="countBasket"></div>
    <div id="addAsyncCatalog" class="goods">

        <div class="goods__item">
            <a href="/?c=product&a=card&id=<?=$item->id?>">
                <img class="goods__img" src="/img/goods/<?=$item->image?>" alt="">
            </a>

            <div class="goods__buy">
                <p class="goods__name"> <?=$item->name?> </p>
                <p class="goods__price rub">Цена: <?=$item->price?></p>
<!--                <a class="goods__iconBuy" href="#"><img src="/img/icon/cart.svg" alt=""></a>-->
                <button class="goodsBuy buy" data-id="<?=$item->id?>" data-price="<?=$item->price?>">Купить</button>
            </div>
        </div>

        <a href="/?c=product&a=card&id=<?=$item->id?>">
            <div>
                <div class="goods__description">
                    <p>
                        <?=$item->description?>
                    </p>
                </div>
            </div>
        </a>
    </div>

<?php endforeach;?>


<div id="addCatalog">

</div>

<!--<a href="/?c=product&a=catalog&page=--><?//=$page?><!--">Ещё</a>-->

<script src="/script/script.js?<?php echo uniqid();?>"></script>
<script src="/script/async/buy.js?<?php echo uniqid();?>"></script>