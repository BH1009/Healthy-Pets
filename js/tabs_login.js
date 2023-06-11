const title = document.querySelectorAll(".title")
const form = document.querySelectorAll(".form")


title.forEach( (cadaTitle, i)=>{
    title[i].addEventListener('click', ()=>{

        title.forEach( (calaTitle, i)=>{
            title[i].classList.remove('activo')
            form[i].classList.remove('activo')
        })
        title[i].classList.add('activo')
        form[i].classList.add('activo')
    })
})






