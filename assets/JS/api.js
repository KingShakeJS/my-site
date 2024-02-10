async function getPosts() {
    let res = await fetch('http://localhost/my-site/users')
    let users = await res.json()
    console.log(users)

}
getPosts()



