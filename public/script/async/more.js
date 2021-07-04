window.onload = function () {
    // const page = window.location.pathname
    // if (page == '/catalog/') {
        showFromProduct = 8
        showCountProduct = 8
        $showMoreButton = document.querySelector('.goodsMore')
        $showMoreButton.addEventListener('click', showMore)
    // }
}

function showMore() {
    fetch('/async/more', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify({
            showFromProduct: showFromProduct,
            showCountProduct: showCountProduct
        })
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            catalogField = document.getElementById('catalogField')
            catalogField.innerHTML += text
            showFromProduct += showCountProduct
            // console.log(text)
        })
}




// window.onload = function () {
//
//     let goodsMore = document.querySelector('.goodsMore');
//
//     goodsMore.addEventListener('click', showMore);
//
//     function showMore() {
//         // console.log('нажат')
//
//
//         let count = document.getElementById('count')
//         let txt = count.innerText;
//
//         (async () => {
//             const response = await fetch(`/async/more/?page=two&count=${txt}`);
//             const answer = await response.json();
//             // start()
//             // Добавление в DOM
//             $answerCatalog = answer.catalog;
//             document.getElementById('count').innerText = `${answer.count}`;
//
//             $answerCatalog = answer.catalog;
//             $answerCatalog.forEach(function (item) {
//                 let addCatalog = document.getElementById('addAsyncCatalog')
//
//                 addCatalog.insertAdjacentHTML('beforeend',
//                     `
//                  <div id="countBasket"></div>
//                         <div id="addAsyncCatalog" class="goods">
//
//                             <div class="goods__item">
//                                 <a href="/product/card/?id=${item['id']}">
//                                     <img class="goods__img" src="/img/goods/${item['image']}" alt="">
//                                 </a>
//
//                                 <div class="goods__buy">
//                                     <p class="goods__price rub">Цена: ${item['price']}</p>
//                                     <button class="goods__btn" data-id="${item['id']}" data-price="${item['price']}">
//                                     <img src="/img/icon/cart.svg" alt="cart"></button>
//                                     </button>
//                                 </div>
//                             </div>
//
//                             <a href="/?c=product&a=card&id=${item['id']}">
//                                 <div>
//                                     <div class="goods__description">
//                                         <p class="goods__name"> ${item['name']} </p>
//                                         <p>
//                                             ${item['description']}
//                                         </p>
//                                     </div>
//                                 </div>
//                             </a>
//                         </div>
//                         <script src="/script/async/more.js?<?php echo uniqid();?>"></script>
//                 `);
//
//             })
//         })();
//     }
//
//     btn()
//
//     function btn() {
//         let goodsBtn = document.querySelectorAll('.goods__btn')
//         goodsBtn.forEach((elem) => {
//             elem.addEventListener('click', (e) => {
//                 e.preventDefault();
//                 let id = elem.getAttribute('data-id');
//                 let price = elem.getAttribute('data-price');
//                 (async () => {
//                     // const response = await fetch(`/async/?action=buy&price=${price}&id=${id}`);
//                     const response = await fetch(`/async/buy/?price=${price}&id=${id}`);
//                     const answer = await response.json();
//
//                     // let count = document.getElementById('countBasket')
//                     // count.innerText = `(${answer.count})`
//                     console.log('sad')
//                 })();
//             })
//         })
//
//     }
//
// }
// // const windowScrollTop = window.pageYOffset; - высота
//
// // Асинхрон для Каталога
//
//
// // <div id="countBasket"></div>
// // <div id="addAsyncCatalog" className="goods">
// //
// //     <div className="goods__item">
// //         <a href="/?c=product&a=card&id=${item['id']}">
// //             <img className="goods__img" src="/img/goods/${item['image']}" alt="">
// //         </a>
// //
// //         <div className="goods__buy">
// //             <p className="goods__price rub">Цена: ${item['price']}</p>
// //             <button className="goods__btn" data-id="${item['id']}" data-price="${item['price']}"><img
// //                 src="/img/icon/cart.svg" alt="cart"></button>
// //         </button>
// //     </div>
// // </div>
// //
// // <a href="/?c=product&a=card&id=${item['id']}">
// //     <div>
// //         <div className="goods__description">
// //             <p className="goods__name"> ${item['name']} </p>
// //             <p>
// //                 ${item['description']}
// //             </p>
// //         </div>
// //     </div>
// // </a>
//
//
//
//
