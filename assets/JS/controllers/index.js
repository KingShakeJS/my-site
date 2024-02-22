
let indexCategories = document.getElementById('index-categories')

async function renderIndexCaregories(){
       let indexCat= await getCategories()
       indexCat.forEach((elem)=>{
           indexCategories.innerHTML +=`
           <li><a href="#">${elem.name}</a></li>
           `
       })
}
renderIndexCaregories()