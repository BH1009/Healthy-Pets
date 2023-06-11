let dato = '';
const buscador = document.getElementById('search');
const enlace = document.getElementById('response');
let busqueda = document.getElementById('search');

window.addEventListener("DOMContentLoaded", () => {
    busqueda.textContent = '';
    busqueda.value = '';
})

/* A function that is executed when the user types something in the search bar. */
buscador.addEventListener('keyup', () => {
    let key = '';
    key = busqueda.value;

    if(key !== ''){
        const xmlht = new XMLHttpRequest();
        xmlht.open('GET', '../backend/buscar.php?buscar='+key, true); 
        xmlht.send();
        xmlht.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                console.log(data);
                for(let res of data){
                    enlace.innerHTML += `<a class="enfermedad">${res.nombre}</a>`;
                }   
            }
        }
        document.querySelector('#response').innerHTML = ``;    
    } else {
        document.querySelector('#response').innerHTML = ``;
    }
});

enlace.addEventListener("click", () => {
    const dato = enlace.textContent;
    window.location.href = `../../html/enfermedad.html?q=${dato}`;
    busqueda.value = "";
})
    
    

