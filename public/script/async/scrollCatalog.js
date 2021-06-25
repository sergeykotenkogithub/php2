// const windowScrollTop = window.pageYOffset; - высота

// Асинхрон для Каталога

let inProgress = false; // чтобь пока идёт асинхрон запово не шёл запрос

window.addEventListener('scroll', () => {

    // Максимальная высота экрана
    let scrollHeight = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
    );

    const scrollable = scrollHeight - window.innerHeight;
    const scrolled = window.scrollY + 400; // 400 - чтобы заранее было

    if (Math.ceil(scrolled) >= scrollable && !inProgress) {
        let count = document.getElementById('count')
        let txt = count.innerText;
        (async () => {
            inProgress = true;
            const response = await fetch(`/?c=async&a=catalog&page=two&count=${txt}`);
            const answer = await response.json();
            document.getElementById('count').innerText = `${answer.count}`;

            // Добавление в DOM

            $answerCatalog = answer.catalog;

            $answerCatalog.forEach(function(item) {
                let addCatalog = document.getElementById('addCatalog')
                addCatalog.insertAdjacentHTML('beforeend',
                `                    
                 <div id="countBasket"></div>
                        <div id="addAsyncCatalog" class="goods">
                        
                            <div class="goods__item">
                                <a href="/?c=product&a=card&id=${item['id']}">
                                    <img class="goods__img" src="/img/goods/${item['image']}" alt="">
                                </a>
                        
                                <div class="goods__buy">
                                    <p class="goods__price rub">Цена: ${item['price']}</p>
                                    <button class="goods__btn" data-id="${item['id']}" data-price="${item['price']}"><img src="/img/icon/cart.svg" alt="cart"></button>
                                    </button>
                                </div>
                            </div>
                        
                            <a href="/?c=product&a=card&id=${item['id']}">
                                <div>
                                    <div class="goods__description">
                                        <p class="goods__name"> ${item['name']} </p>
                                        <p>
                                            ${item['description']}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>                 
                `);
                inProgress = false;
            })
        })();
    }
})

