<h2>Каталог</h2>

<div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt dolor doloribus ducimus eius illum iure laudantium, necessitatibus odit perferendis qui reiciendis rerum sequi, tempore, unde voluptas voluptate. Blanditiis, reiciendis?</p>
</div>


<div hidden id="count">0</div>
<div id="count2">0</div>
<!--<div id="countBasket2">0</div>-->

<?php foreach ($catalog as $item): ?>

    <div id="addAsyncCatalog" class="goods">

       <img class="goods__img" src="/img/goods/<?=$item->image?>" alt="">

        <div class="goods__name">
            <a href="/?c=product&a=card&id=<?=$item->id?>"><?=$item->name?></a>
        </div>
        <div class="goods__buy">
            <p>price: <?=$item->price?></p>
            <button>Купить</button>
        </div>

    </div>

<?php endforeach;?>


<div id="addCatalog" class="goods">

</div>

<a href="/?c=product&a=catalog&page=<?=$page?>">Ещё</a>

<script src="/script/script.js?<?php echo uniqid();?>"></script>