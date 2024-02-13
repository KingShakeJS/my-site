async function selectAllOrOneId() {
    let res = await fetch('http://localhost/my-site/users')
    let users = await res.json()
    console.log(users)
    users.forEach(user => {
        console.log(user.id)
        console.log(user.username)
    })

}

async function createData(inputData) {

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
        console.log(data)
    }
}


async function updateData(id) {
    const data = {
        admin: 12,
        username: 'fihhh',
        password: '1234567890zzz',
    }
    const res = await fetch(`http://localhost/my-site/users/${id}`, {
        method: 'PATCH',
        body: JSON.stringify(data)
    })
    let resData = await res.json()
    if (resData.status === true) {

    }
}

async function deleteData(id) {
    const res = await fetch(`http://localhost/my-site/users/${id}`, {
        method: 'DELETE'
    })
    const data = await res.json()
    if (data.status === true) {

    }
}


async function getWhere(whereDate) {
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




