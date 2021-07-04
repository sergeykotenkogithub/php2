<!--<div hidden id="count">0</div>-->

<?//=$page?>

<div class="goodsPagination">
    <?php for ($i = 1; $i <= $pageCount; $i++): ?>
        <? if ($page == $i) :?>
            <a class="active" href="/product/catalog/?page=<?=$i?>"><?=$i?></a>
        <? else: ?>
            <a href="/product/catalog/?page=<?=$i?>"><?=$i?></a>
        <? endif; ?>

    <?php endfor; ?>
</div>


<?php foreach ($catalog as $item): ?>

    <div class="goods">

        <div class="goods__item">
            <a href="/product/card/?id=<?=$item->id?>">
                <img class="goods__img" src="/img/goods/<?=$item->image?>" alt="">
            </a>

            <div class="goods__buy">
                <p class="goods__price rub">Цена: <?=$item->price?></p>
                <button class="goods__btn" data-id="<?=$item->id?>" data-price="<?=$item->price?>">
                    <img src="/img/icon/cart.svg" alt="cart"></button>
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

<!--<div class="goodsMoreWrapper">-->
<!--    <button class="goodsMore">Ещё</button>-->
<!--</div>-->

<!--<div class="goodsMoreWrapper">-->
<!--    <button class="goodsMore">Ещё</button>-->
<!--</div>-->
<!---->
<!---->
<!--<div id="addAsyncCatalog" >-->
<!---->
<!--</div>-->
<!---->
<!--<div id="catalogField">-->
<!--</div>-->



<!--<a href="/product/catalog/?page=--><?//=$page?><!--">Ещё</a>-->
>

<!--<script src="/script/async/scrollCatalog.js?--><?php //echo uniqid();?><!--"></script>-->
<script src="/script/async/buy.js?<?php echo uniqid();?>"></script>
<!--<script src="/script/async/more.js?--><?php //echo uniqid();?><!--"></script>-->