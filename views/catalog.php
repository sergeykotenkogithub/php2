<!--.......................Пагинация........................-->

<div class="goodsPagination">

    <a href="/product/catalog/?page=<?=$prev?>"><<</a>

    <?php for ($i = 1; $i <= $pageCount; $i++): ?>
        <? if ($page == $i) :?>
            <a class="active" href="/product/catalog/?page=<?=$i?>"><?=$i?></a>
        <? else: ?>
            <a href="/product/catalog/?page=<?=$i?>"><?=$i?></a>
        <? endif; ?>

    <?php endfor; ?>

    <a href="/product/catalog/?page=<?=$next?>">>></a>

</div>

<!-- .......................Отображение товаров............. -->

<?php foreach ($catalog as $item): ?>

    <div class="goods">

        <div class="goods__item">
            <a href="/product/card/?id=<?=$item->id?>">
                <img class="goods__img" src="/img/goods/<?=$item->image?>" alt="">
            </a>

            <div class="goods__buy">
                <p class="goods__price rub">Цена: <?=$item->price?></p>
                <div class="goods__btn goodsAsync" data-id="<?=$item->id?>" data-price="<?=$item->price?>">

                    <img src="/img/icon/cart.svg" alt="cart"></div>
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

<script src="/script/async/buy.js?<?php echo uniqid();?>"></script>
