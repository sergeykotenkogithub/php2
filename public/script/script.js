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
            document.getElementById('count2').innerText = `${answer.count}`;

            // Добавление в DOM

            $answerCatalog = answer.catalog;

            $answerCatalog.forEach(function(item) {
                let addCatalog = document.getElementById('addCatalog')
                let div = document.createElement('div');
                let div2 = document.createElement('div');
                let img = document.createElement('img');
                img.className = "goods__img"
                // let src = document.createElement('img');
                img.src = `/img/goods/${item['image']}`;
                // div.className = "goods";
                // div.innerHTML = item['name'];
                // div2.insertAdjacentHTML()
                // d.insertAdjacentHTML('afterend', `<div>${item['name']}</div>`);
                addCatalog.appendChild(img)
            })
        })();
    }
})

