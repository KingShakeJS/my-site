async function selectAllOrOneId() {
    let res = await fetch('http://localhost/my-site/users')
    let users = await res.json()
    console.log(users)
    users.forEach(user => {
        console.log(user.id)
        console.log(user.username)
    })

}


async function createData() {
    let username = 'nnn333nnn'
    let email ='n33ddf1n'
    let password='nn33nnn'

    let formData = new FormData()
    formData.append('username', username)
    formData.append('email', email)
    formData.append('password', password)

    const res = await fetch('http://localhost/my-site/users', {
        method: 'POST',
        body: formData
    })
    const data = await res.json()
    if (data.status === true) {
      console.log(data)
    }
}

createData()



