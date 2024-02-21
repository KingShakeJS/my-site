let createA = document.getElementById('create-topics')
let manageA = document.getElementById('manage-topics')
let error = document.getElementById('error')
createA.href = `${BASE_URL}admin/topics/create.html`
manageA.href = `${BASE_URL}admin/topics/index.html`


if (window.location==`${BASE_URL + 'admin/topics/create.html'}`){



    let createName = document.getElementById('create-name')
    let createDescription = document.getElementById('create-description')
    let createAdd = document.getElementById('create-add')

    createAdd.addEventListener('click', () => {
        const topicsData = {
            'name': createName.value,
            'description': createDescription.value
        }
        // console.log(topicsData)
        if (topicsData.name == '' || topicsData.description == '') {
            error.innerText = 'не все заполненно'
        } else {
            proverkaCategori(topicsData)
        }

    })

    async function proverkaCategori(topicsData) {
        let bool = await getCategoriesWhere({'name': createName.value})
        // console.log(bool)
        if (bool==true){
            error.innerText = 'такая категория уже существует'
        }else{
            createCategory(topicsData)

            window.location=`${BASE_URL + 'admin/topics/index.html'}`

        }
    }
}

