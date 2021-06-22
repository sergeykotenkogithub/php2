// Максимальная высота экрана



// const windowScrollTop = window.pageYOffset;

window.addEventListener('scroll', () => {

    let scrollHeight = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
    );

    const scrollable = scrollHeight - window.innerHeight;
    const scrolled = window.scrollY;

    if (Math.ceil(scrolled) === scrollable) {
        let count = document.getElementById('count')
        let txt = count.innerText;
         console.log('Ура');
        (async () => {
            // const response = await fetch(`/?action=buy&price=${price}&id=${id}`);
            const response = await fetch(`/?c=async&a=catalog&page=two&count=${txt}`);
            const answer = await response.json();
            document.getElementById('count').innerText = `${answer.count}`;

            // Добавление в DOM

            $answerCatalog = answer.catalog;

            $answerCatalog.forEach(function(item) {
                let addCatalog = document.getElementById('addCatalog')
                // let div = document.createElement('div');
                // let div2 = document.createElement('div');
                // let img = document.createElement('img');
                // img.className = "goods__img"
                // // let src = document.createElement('img');
                // img.src = `/img/goods/${item['image']}`;
                // div.className = "goods";
                // addCatalog.insertAdjacentHTML('beforebegin', `<a href=/?c=product&a=card&id${item['id']}>`);
                addCatalog.insertAdjacentHTML('beforeend',
                `                    
                    <div id="addAsyncCatalog" class="goods">                    
                        <a href=/?c=product&a=card&id=${item['id']}>
                            <img class="goods__img" src=/img/goods/${item['image']}>
                        </a>                        
                        <div class="goods__buy">
                            <p class="goods__name"> ${item['name']} </p>
                            <p class="goods__price rub">Цена: ${item['price']}</p>
                            <a class="goods__iconBuy" href="#"><img src="/img/icon/cart.svg" alt=""></a>
                        </div>                        
                    </div>                        
                `);

                // <div id="addAsyncCatalog" className="goods">
                //
                //     <a href="/?c=product&a=card&id=<?=$item->id?>">
                //         <img className="goods__img" src="/img/goods/<?=$item->image?>" alt="">
                //     </a>
                //
                //     <div className="goods__buy">
                //         <p className="goods__name"> <?=$item->name?> </p>
                //         <p className="goods__price rub">Цена: <?=$item->price?></p>
                //         <a className="goods__iconBuy" href="#"><img src="/img/icon/cart.svg" alt=""></a>
                //     </div>
                //
                // </div>

                // div.innerHTML = item['name'];
                // div2.insertAdjacentHTML()
                // d.insertAdjacentHTML('afterend', `<div>${item['name']}</div>`);
                // addCatalog.appendChild()
            })
        })();
    }
})

