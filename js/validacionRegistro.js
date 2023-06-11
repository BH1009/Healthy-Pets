const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const btn_registro_usuario = document.querySelector('#btn__registro-usuario')

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	veterinaria: /^[a-zA-ZÀ-ÿ\s]{1,50}$/,
	localidad: /^[a-zA-ZÀ-ÿ\s]{1,50}$/,
	calle: /^[a-zA-ZÀ-ÿ\s]{1,50}$/,
	numero: /^[Z0-9]{1,50}$/,
	telefono: /^[Z0-9]{10,10}$/,
}

const campos = {
	nombre: false,
	email: false,
	usuario: false,
	contraseña: false,
	veterinaria: false,
	localidad: false,
	calle: false,
	numero: false,
	telefono: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre')
		break;
		case "email":
			validarCampo(expresiones.correo, e.target, 'email')
		break;
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario')
		break;
		case "contraseña":
			validarCampo(expresiones.password, e.target, 'contraseña')
		break;
		case "veterinaria":
			validarCampo(expresiones.veterinaria, e.target, 'veterinaria')
		break;
		case "localidad":
			validarCampo(expresiones.localidad, e.target, 'localidad')
		break;
		case "calle":
			validarCampo(expresiones.calle, e.target, 'calle')
		break;
		case "numero":
			validarCampo(expresiones.numero, e.target, 'numero')
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono')
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-xmark')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-check')
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo')
		campos[campo] = true
	} else{
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-xmark')
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-check')
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo')
		campos[campo] = false
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario)
	input.addEventListener('blur', validarFormulario)
})

formulario.addEventListener('keyup', habilitarBtn)

function habilitarBtn()  {
	if(campos.nombre && campos.email && campos.usuario && campos.contraseña){
		btn_registro_usuario.disabled = false
		document.getElementById('btn__registro-usuario').classList.remove('btn__registro-disable')
	}else{
		btn_registro_usuario.disabled = true
		document.getElementById('btn__registro-usuario').classList.add('btn__registro-disable')
	}
}
