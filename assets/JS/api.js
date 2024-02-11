async function getPosts() {
    let res = await fetch('http://localhost/my-site/users')
    let users = await res.json()
    console.log(users)
    users.forEach(user=>{
        console.log(user.id)
        console.log(user.username)
    })

}
getPosts()



