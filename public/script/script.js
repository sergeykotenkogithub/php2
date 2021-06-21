// Максимальная высота экрана

// let scrollHeight = Math.max(
//     document.body.scrollHeight, document.documentElement.scrollHeight,
//     document.body.offsetHeight, document.documentElement.offsetHeight,
//     document.body.clientHeight, document.documentElement.clientHeight
// );
//
// const windowScrollTop = window.pageYOffset;

let a = document.getElementById('hiddenPage').value
console.log(a);

// window.addEventListener('scroll', () => {
//
//     const scrollable = document.documentElement.scrollHeight - window.innerHeight;
//     const scrolled = window.scrollY;
//
//     if (Math.ceil(scrolled) === scrollable) {
//         // console.log('Ура');
//         (async () => {
//             // const response = await fetch(`/?action=buy&price=${price}&id=${id}`);
//             const response = await fetch(`/?c=async&a=catalog&page=two`);
//             const answer = await response.json();
//             document.getElementById('countBasket').innerText = `(${answer.count})`;
//         })();
//     }
//
// })

//
// let goodsBtn = document.querySelectorAll('.goodsBuy')
// goodsBtn.forEach((elem) =>{
//     elem.addEventListener('click', () => {
//         let id = elem.getAttribute('data-id');
//         let price = elem.getAttribute('data-price');
//         (async () => {
//             // const response = await fetch(`/?action=buy&price=${price}&id=${id}`);
//             const response = await fetch(`/http://gb/?c=product&a=catalog&page=2`);
//             const answer = await response.json();
//             document.getElementById('countBasket').innerText = `(${answer.count})`;
//         })();
//     })
// })