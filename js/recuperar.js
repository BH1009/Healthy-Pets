//Recupera toda la cabecera de la url
// let query = window.location.search;
// let parametros = new URLSearchParams(query);
// const dato = parametros.get('q');
// console.log(dato); >>dato

const titulo = document.getElementById('titulo');
const descripcion = document.getElementById('descripcion');
const tipo = document.getElementById('tipo');
const recomendacion = document.getElementById('recomendacion');
const img1 = document.getElementById('img1');
const img2 = document.getElementById('img2');
const boton = document.getElementById('regresar');

document.addEventListener("DOMContentLoaded", () =>{
    let query = window.location.search.split('=');
    const dato = query[1];
    console.log(dato);
    const xmlh = new XMLHttpRequest();
    xmlh.open("GET", "../php/backend/recuperar.php?dato="+dato, true);
    xmlh.send();
    xmlh.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            const enfermedad = JSON.parse(this.responseText);
            const img = recuperarImagenes(enfermedad);
            titulo.textContent = enfermedad[0].nombre;
            descripcion.textContent = enfermedad[0].descripcion;
            recomendacion.textContent = enfermedad[0].recomendacion;
            tipo.textContent = enfermedad[0].tipo;
            img1.src = "../imagenes/" + img[0] + ".jpg";
            img2.src = "../imagenes/" + img[1] + ".jpg";
        }
    }
});


const recuperarImagenes = (enfermedad) => {
    let img = "";
    return img = enfermedad[0].imagenes.split(",");
}



// boton.addEventListener("click", () =>{
//     window.location.href = "index.html";
// });

/*
xmlh.open("GET", "./php/recuperar.php?dato="+dato, true);
    xmlh.send();
    xmlh.onreadystatechange = () => {
        if(this.readyState == 4 && this.status == 200){
            const enfermedad = JSON.parse(this.responseText);
            const img = recuperarImagenes(enfermedad);
            titulo.textContent = enfermedad[0].nombre;
            descripcion.textContent = enfermedad[0].descripcion;
            recomendacion.textContent = enfermedad[0].recomendacion;
            tipo.textContent = enfermedad[0].tipo;
            img1.src = "./img/" + img[0] + ".jpg";
            img2.src = "./img/" + img[1] + ".jpg";
        }
    }
*/