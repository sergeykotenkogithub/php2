// Асинхрон для страницы Админ

let inProgress = false; // чтоб пока идёт асинхрон запово не шёл запрос

window.addEventListener('scroll', (e) => {

    // Максимальная высота экрана
    let scrollHeight = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
    );

    const scrollable = scrollHeight - window.innerHeight;
    const scrolled = window.scrollY + 400; // 400 - чтобы заранее было
    // const scrolled2 = window.scrollY; //


    if (Math.ceil(scrolled) >= scrollable && !inProgress) {

        let count = document.getElementById('count')
        let txt = count.innerText;

        (async () => {
            inProgress = true;
            const response = await fetch(`/async/admin/?page=two&count=${txt}`);
            const answer = await response.json();
            // start()
            document.getElementById('count').innerText = `${answer.count}`;
            // Добавление в DOM
            $answerCatalog = answer.catalog;
            $answerCatalog.forEach(function(item) {
                let addCatalog = document.getElementById('addAsyncAdmin')
                addCatalog.insertAdjacentHTML('beforeend',
                    `
                 
                   <a href="/admin/adminOrder/?id=${item['id']}">
                        <div class="admin__order">
                            <div>Заказ №: ${item['id']}</div>
                            <div class="admin__info">
                                <div>Телефон: ${item['tel']}</div>
                                <div>email: ${item['email']}</div>
                                <div>статус: ${item['status']}</div>
                                <div>Дата: ${item['date']}</div>
                            </div>
                        </div>
                    </a>
                    
                `);
                inProgress = false;
            })
        })();
    }
})