let goodsBtn = document.querySelectorAll('.basket__delete')
goodsBtn.forEach((elem) => {
    elem.addEventListener('click', (e) => {
        e.preventDefault();
        let id = elem.getAttribute('data-id');
        (async () => {
            const response = await fetch(`/async/delete/?id=${id}`);
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
            }
            document.getElementById('countBasket').innerText = `(${answer.count})`
            document.querySelector('.total').textContent = answer.sum
        })();
    })
})