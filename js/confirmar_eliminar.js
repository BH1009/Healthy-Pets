function confirmacion(e) {
    if (confirm("¿Estas seguro de que deseas eliminar este cliente?")) {
        return true;
    } else {
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".btn--2");

for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', confirmacion);
}