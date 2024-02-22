let createA = document.getElementById('create-topics')
let manageA = document.getElementById('manage-topics')
let error = document.getElementById('error')
createA.href = `${BASE_URL}admin/topics/create.html`
manageA.href = `${BASE_URL}admin/topics/index.html`
var category = JSON.parse(localStorage.getItem("idCategory"));

if (window.location == `${BASE_URL + 'admin/topics/create.html'}`) {


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
        if (bool == true) {
            error.innerText = 'такая категория уже существует'
        } else {
            createCategory(topicsData)

            window.location = `${BASE_URL + 'admin/topics/index.html'}`

        }
    }
} else if (window.location == `${BASE_URL + 'admin/topics/index.html'}`) {
    let tableCategories = document.getElementById('table-categories')
    renderCategories()

    async function renderCategories() {
        let categories = await getCategories()
        // console.log(categories)

        categories.forEach((element) => {
            tableCategories.innerHTML += `
                          <tr>
                             <td id="dellit" >${element.id}</td>
                             <td>${element.name}</td>
                             <td><button onclick="edit(${element.id})">Edit</button></td>
                             <td><button onclick="del(${element.id})">Delete</button></td>
                         </tr>
            `

        })

    }

    function del(id) {
        deleteCat(id)
    }

    async function deleteCat(id) {
        await deleteCategory(id)
        tableCategories.innerHTML = `
                         <tr class="table-title">
                             <td>ID</td>
                             <td>Название категории</td>
                             <td>Управление</td>
                             <td></td>
                         </tr>
            `
        await renderCategories()
    }
    function edit(id){

        localStorage.setItem("idCategory", JSON.stringify(id))
        console.log(category)
        window.location=`${BASE_URL + 'admin/topics/update.html'}`
    }
}
else if (window.location == `${BASE_URL + 'admin/topics/update.html'}`){
    let createName = document.getElementById('create-name')
    let createDescription = document.getElementById('create-description')
    let createAdd = document.getElementById('create-add')
    renderCategory(category)
   async function renderCategory(category){
         let categoryForInput= await getCategory(category)
         console.log(categoryForInput)
         createName.value=`${categoryForInput.name}`
       createDescription.value=`${categoryForInput.description}`

       createAdd.addEventListener('click', () => {
           const topicsData = {
               'name': createName.value,
               'description': createDescription.value
           }
           // console.log(topicsData)
           if (topicsData.name == '' || topicsData.description == '') {
               error.innerText = 'не все заполненно'
           } else {
               // console.log(topicsData)
               // console.log(category)
               updateCategory(category, topicsData)
               window.location=`${BASE_URL + 'admin/topics/index.html'}`
           }
       })
    }
}





