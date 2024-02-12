const username = document.getElementById('reg_name')
const email = document.getElementById('reg_email')
const password = document.getElementById('reg_password')
const secondPassword = document.getElementById('reg_second_password')
const regButton = document.getElementById('reg_button')
regButton.addEventListener('click', () => {
    const inputData = {
        'username': username.value,
        'email': email.value,
        'password': password.value,
    }
    createData(inputData)
})



