const navToggle = document.querySelector("#navToggle")
const nav = document.querySelector("#links")
const desplegar = document.querySelector("#btn__desplegar")

navToggle.addEventListener("click", () =>{
    nav.classList.toggle('nav-open')
}
)

desplegar.addEventListener("click", () =>{
    desplegar.classList.toggle('list__button-click')
})


const nav2 = document.querySelector('.nav')
window.addEventListener('scroll', function(){
    nav2.classList.toggle('nav--active', window.scrollY > 10)
})
