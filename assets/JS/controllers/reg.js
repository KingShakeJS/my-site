const username = document.getElementById('reg_name')
const email = document.getElementById('reg_email')
const password = document.getElementById('reg_password')
const secondPassword = document.getElementById('reg_second_password')
const regButton = document.getElementById('reg_button')
const regError = document.getElementById('reg-error')

regButton.addEventListener('click', () => {
    const inputData = {
        'username': username.value,
        'email': email.value,
        'password': password.value,
    }
    const secondPass = secondPassword.value
    if (secondPass === '' || inputData.username === '' || inputData.password === '' || inputData.email === '') {
        regError.innerText = "заполни все поля"
        password.value=''
        secondPassword.value=''
    } else if (inputData.password !== secondPass) {
        regError.innerText = "пароли должны совпадать"
        password.value=''
        secondPassword.value=''
    } else {
        proverka(inputData)
    }
})


async function proverka(inputData) {
    const whereDate = {
        email: inputData.email,
    }
    let bool = await getWhere(whereDate)
    if (bool === false) {
        // создать пользователя
        createData(inputData)
        username.value = ''
        email.value = ''
        password.value = ''
        secondPassword.value = ''
    } else {
        regError.innerText = "пользователь с такой почтой уже зарегистрирован"
    }
}