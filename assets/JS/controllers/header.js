var user = JSON.parse(localStorage.getItem("isLogInKey"));
let upravlenie = document.getElementById('upravlenie')


// localStorage.removeItem('isLogInKey')


if (user) {
    upravlenie.innerHTML = `<a  class="cabinet" href="#">${user.username}</a>
                               <ul class="vipadat">
                                  <li><a id="logOut" href="#" >Выход</a></li>
                                </ul>`
    console.log(user)
    let logOut = document.getElementById('logOut')
    logOut.addEventListener('click', () => {
        localStorage.removeItem('isLogInKey')
        console.log(user)
        upravlenie.innerHTML = `
<a  class="cabinet" href="#">Войти</a>
 <ul class="vipadat">
    <li><a href="">Регистрация</a></li>
 </ul>`
    })

} else {
    upravlenie.innerHTML = `
<a  class="cabinet" href="#">Войти</a>
 <ul class="vipadat">
    <li><a href=${BASE_URL + 'reg.html'}>Регистрация</a></li>
 </ul>`
}


// let upravlenie = document.getElementById('upravlenie')

//     if (user) {
//         upravlenie.innerHTML = `<a  class="cabinet" href="#">${user.username}</a>
//                                <ul class="vipadat">
//                                   <li><button id="logOut" href="#" >Выход</button></li>
//                                 </ul>`
//         if (user.admin == 1) {
//             upravlenie.innerHTML += `
//
// <ul class="vipadat">
//     <li><a href="">Админ панель</a></li>
//     <li><a id="logOut" href="#" >Выход</a></li>
// </ul>`
//         } else  {
//             upravlenie.innerHTML += `
//  <ul class="vipadat">
//     <li><a id="logOut" href="#" >Выход</a></li>
//  </ul>`
//         }
//     } else if (user==null) {
//         upravlenie.innerHTML = `
// <a  class="cabinet" href="#">Войти</a>
//  <ul class="vipadat">
//     <li><a href="">Регистрация</a></li>
//  </ul>`}
//
//
// //     let logOut = document.getElementById('logOut')
// //     logOut.addEventListener('click', () => {
// //         localStorage.removeItem('isLogInKey');
// //         upravlenie.innerHTML = `
// // <a  class="cabinet" href="#">Войти</a>
// //  <ul class="vipadat">
// //     <li><a href="">Регистрация</a></li>
// //  </ul>`










