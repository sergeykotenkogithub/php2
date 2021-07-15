<div hidden id="count">0</div>

<?php foreach ($catalog as $item): ?>

    <div id="countBasket"></div>
    <div id="addAsyncCatalog" class="goods">

        <div class="goods__item">
            <a href="/product/card/?id=<?=$item->id?>">
                <img class="goods__img" src="/img/goods/<?=$item->image?>" alt="">
            </a>

            <div class="goods__buy">
                <p class="goods__price rub">Цена: <?=$item->price?></p>
                <button class="goods__btn" data-id="<?=$item->id?>" data-price="<?=$item->price?>"><img src="/img/icon/cart.svg" alt="cart"></button>
            </div>
        </div>

        <a href="/product/card/?id=<?=$item->id?>">
            <div>
                <div class="goods__description">
                    <p class="goods__name"> <?=$item->name?> </p>
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

<script src="/script/async/scrollCatalog.js?<?php echo uniqid();?>"></script>
<script src="/script/async/buy.js?<?php echo uniqid();?>"></script>