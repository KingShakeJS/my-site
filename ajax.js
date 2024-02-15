const BASE_URL = 'http://localhost:63342/my-site/assets/HTML/'

let isLogIn = null


async function getUsers() {
    let res = await fetch('http://localhost/my-site/users')
    let users = await res.json()
    console.log(users)
}


async function createUser(inputData) {
    // let inputData = {
    //     "username": "2323",
    //     "email": "ee31snn",
    //     "password": "ee2321313",
    // }
    let formData = new FormData()
    for (let key in inputData) {
        formData.append(key, inputData[key])
    }
    const res = await fetch('http://localhost/my-site/users', {
        method: 'POST',
        body: formData
    })
    const data = await res.json()
    if (data.status === true) {
        isLogIn = {
            'user_id': data.user_id,
            'admin': data.admin,
            'username': data.username,
        }
        localStorage.setItem("isLogInKey", JSON.stringify(isLogIn))
    }


}

async function updateUser(id, data) {
    // const data = {
    //     admin: 12,
    //     username: 'fsssfssssss',
    //     password: 'ssssfssssss',
    // }
    const res = await fetch(`http://localhost/my-site/users/${id}`, {
        method: 'PATCH',
        body: JSON.stringify(data)
    })
    let resData = await res.json()
    if (resData.status === true) {
        console.log(resData)
    }
}


async function deleteUser(id) {
    const res = await fetch(`http://localhost/my-site/users/${id}`, {
        method: 'DELETE'
    })
    const data = await res.json()
    if (data.status === true) {

    }
}

async function getUsersWhere(whereDate) {

    let formData = new FormData()
    for (let key in whereDate) {
        formData.append(key, whereDate[key])
    }
    let res = await fetch('http://localhost/my-site/reg-users', {
        method: 'POST',
        body: formData
    })
    let data = await res.json()
    return data.status

}

async function logOut() {
    let res = await fetch(`http://localhost/my-site/out-users`)
    let data = await res.json()
    console.log(data)
}
async function logIn(whereDate){
    let formData = new FormData()
    for (let key in whereDate) {
        formData.append(key, whereDate[key])
    }
    let res = await fetch('http://localhost/my-site/log-in-users', {
        method: 'POST',
        body: formData
    })
    let data = await res.json()

    if (data.status === true) {
        isLogIn = {
            'user_id': data.user_id,
            'admin': data.admin,
            'username': data.username,
        }
        localStorage.setItem("isLogInKey", JSON.stringify(isLogIn))
    }
    console.log(isLogIn)
    return data.status
}










