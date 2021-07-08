// При нажатие кнопки "удалить" в корзине

let goodsBtn = document.querySelectorAll('.basket__delete')
goodsBtn.forEach((elem) => {
    elem.addEventListener('click', (e) => {
        e.preventDefault();
        let id = elem.getAttribute('data-id');
        (async () => {

            try {
                // const response = await fetch(`/async/delete/?id=${id}`); // Без POST
                const response = await fetch('/async/delete',{
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                document.getElementById(`item${id}`).remove();

                if (!answer.count) {
                    document.querySelector('.wrapperBasket').remove()

                    document.body.insertAdjacentHTML('beforeend',
                `  <div class="wrapperBasket__empty">
                             Нет добавленных товаров
                        </div>
                    `)
                    answer.count = 0 // Чтобы не отображало null когда последний товар удаляешь
                } else {
                    let summ = document.getElementById('basketSumm');
                    summ.textContent = answer.summ
                }

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