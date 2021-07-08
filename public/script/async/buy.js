// Асинхрон. Добавление товара со страницы каталог в корзину

let goodsBtn = document.querySelectorAll('.goodsAsync')
goodsBtn.forEach((elem) => {
    elem.addEventListener('click', (e) => {
        e.preventDefault();
        let id = elem.getAttribute('data-id');
        let price = elem.getAttribute('data-price');
        (async () => {
            // const response = await fetch(`/async/?action=buy&price=${price}&id=${id}`);
            const response = await fetch(`/async/buy/?price=${price}&id=${id}`);
            const answer = await response.json();

            let count = document.getElementById('countBasket')
            count.innerText = `${answer.count}`
        })();
    })
})