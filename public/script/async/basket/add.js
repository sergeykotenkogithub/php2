// При нажатие кнопки "+" в корзине

let goodsAdd = document.querySelectorAll('.basket__add')
goodsAdd.forEach((elem) => {
    elem.addEventListener('click', (e) => {
        e.preventDefault();
        let id = elem.getAttribute('data-id');
        let goods = elem.getAttribute('data-goods');
        (async () => {
            const response = await fetch(`/async/addBasket/?id=${id}&goods=${goods}`);
            const answer = await response.json();

            // Изменяет количество товаров
            let basket_quantity = document.getElementById(`quantity${id}`);
            basket_quantity.innerText = answer.quantity;

            // Изменяет сумму товара
            let price = document.getElementById(`price${id}`);
            price.innerText = answer.price;

            // Изменяет общую сумму в корзине
            let summ = document.getElementById('basketSumm');
            summ.innerText = answer.summ;

            // Изменяет количество в корзине
            let count = document.getElementById('countBasket')
            count.innerText = answer.count
        })();
    })
})



