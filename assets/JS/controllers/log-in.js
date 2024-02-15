let logEmail = document.getElementById('log-email')
let logPassword = document.getElementById('log-password')
let logButton = document.getElementById('log-button')

logButton.addEventListener('click', ()=>{
    let whereDate={
        'email': logEmail.value,
        'password': logPassword.value,
    }
    isVerni(whereDate)


})

async function isVerni(whereDate){
    let bool = await logIn(whereDate)
    if(bool){
        window.location.href = BASE_URL + 'index.html';
    }
}