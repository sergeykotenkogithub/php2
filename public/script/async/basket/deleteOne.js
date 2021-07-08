// При нажатие кнопки "-" в корзине

let goodsDel = document.querySelectorAll('.basket__deleteOne')
goodsDel.forEach((elem) => {
    elem.addEventListener('click', (e) => {
        e.preventDefault();
        let id = elem.getAttribute('data-id');
        let goods = elem.getAttribute('data-goods');
        (async () => {

            try {
                const response = await fetch('/async/del',{
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        id: id,
                        goods: goods
                    })
                });
                const answer = await response.json();
                const deleteWholly = answer.deleteWholly;

                //..............Если 1 элемент удаляется.................................

                if (deleteWholly === 'no') {

                    // Изменяет количество товаров
                    let basket_quantity = document.getElementById(`quantity${id}`);
                    basket_quantity.innerText = answer.quantity;

                    // Изменяет сумму товара
                    let price = document.getElementById(`price${id}`);
                    price.innerText = answer.price;

                } else {
                    document.getElementById(`item${id}`).remove();
                }

                //.............Если нет товаров в корзине.................................

                if (!answer.count) {
                    document.querySelector('.wrapperBasket').remove()

                    document.body.insertAdjacentHTML('beforeend',
                        `  <div class="wrapperBasket__empty">
                             Нет добавленных товаров
                        </div>
                    `)
                    answer.count = 0 // Чтобы не отображало null когда последний товар удаляешь
                } else {
                    // Изменяет общую сумму в корзине
                    let summ = document.getElementById('basketSumm');
                    summ.textContent = answer.summ
                }

                //............Показывает сумму товаров в корзине............................
                document.getElementById('countBasket').innerText = `(${answer.count})`

                // Изменяет количество в корзине
                let count = document.getElementById('countBasket')
                count.innerText = answer.count
            }

            catch (e) {
                // console.log(`Error ssss ${e}`)
                console.log('Неверный путь api')
            }

        })();
    })
})