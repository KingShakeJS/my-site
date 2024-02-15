var user = JSON.parse(localStorage.getItem("isLogInKey"));
let upravlenie = document.getElementById('upravlenie')


// localStorage.removeItem('isLogInKey')


if (user) {
    upravlenie.innerHTML = `<a  class="cabinet" href="#">${user.username}</a>
                               <ul class="vipadat">
                                  <li><a id="logOutButton" href="#" >Выход</a></li>
                                </ul>`
    console.log(user)
    let logOutButton = document.getElementById('logOutButton')
    logOutButton.addEventListener('click', () => {
        localStorage.removeItem('isLogInKey')
        logOut()
        console.log(user)
        upravlenie.innerHTML = `
<a  class="cabinet" href=${BASE_URL + 'log-in.html'} >Войти</a>
 <ul class="vipadat">
    <li><a href="">Регистрация</a></li>
 </ul>`
    })

} else {
    upravlenie.innerHTML = `
<a  class="cabinet" href=${BASE_URL + 'log-in.html'}>Войти</a>
 <ul class="vipadat">
    <li><a href=${BASE_URL + 'reg.html'}>Регистрация</a></li>
 </ul>`
}













