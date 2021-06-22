// const windowScrollTop = window.pageYOffset; - высота

window.addEventListener('scroll', () => {

    // Максимальная высота экрана
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
            const response = await fetch(`/?c=async&a=catalog&page=two&count=${txt}`);
            const answer = await response.json();
            document.getElementById('count').innerText = `${answer.count}`;

            // Добавление в DOM

            $answerCatalog = answer.catalog;

            $answerCatalog.forEach(function(item) {
                let addCatalog = document.getElementById('addCatalog')
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
            })
        })();
    }
})

