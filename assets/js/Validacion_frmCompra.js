/*CONTROL DE FORMULARIO*/
var form = document.getElementById("frm_compra");
form.addEventListener('submit', validar);

let cont = 0;

function validar(event) {
    var resultado = true;
    var txtEmail = document.getElementById('email');
    var txtNombre = document.getElementById('nombres');
    var txtApellido = document.getElementById('apellidos');
    var txtContrasenia = document.getElementById('contrasenia');
    var txtNumTarjeta = document.getElementById('numTarjeta');
    var radios = document.getElementsByName("sex");
    var selectTipoTarjeta = document.getElementById('tipoTarjeta');
    var selectMes = document.getElementById('mes');
    var selectAnio = document.getElementById('anio');


    var letra = /^[a-z ,.'-]+$/i;// letrasyespacio   ///^[A-Z]+$/i;// solo letras
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var numeroReg = /^[0-9]{16}$/g; // para validar datos que deban tener 16 numeros


    limpiarMensajes();
    console.log(selectTipoTarjeta.options[selectTipoTarjeta.selectedIndex].text);

    //validacion email
    if (txtEmail.value == "") {
        resultado = false;
        mensaje("Email es requerido", txtEmail);
    } else if (!correo.test(txtEmail.value)) {
        resultado = false;
        mensaje("Email no es correcto", txtEmail);
    }

    //validacion nombres y apellidos
    if (txtNombre.value == "") {
        resultado = false;
        mensaje("Nombres es requerido", txtNombre);
    } else if (!letra.test(txtEmail.value)) {
        resultado = false;
        mensaje("Nombres no es correcto", txtNombre);
    }

    if (txtApellido.value == "") {
        resultado = false;
        mensaje("Apellidos es requerido", txtApellido);
    } else if (!letra.test(txtApellido.value)) {
        resultado = false;
        mensaje("Apellidos no es correcto", txtApellido);
    }

    //validacion contrasenia
    if (txtContrasenia.value == "") {
        resultado = false;
        mensaje("Contraseña es requerida", txtContrasenia);
    }

    //validacion radio button
    var sel = false;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            sel = true;
            let res = radios[i].value;

            break;
        }
    }
    if (!sel) {
        resultado = false;
        mensaje("Debe seleccionar un método de pago", radios[0]);
    }


    //validacion numero de tarjeta
    if (txtNumTarjeta.value === "") {
        resultado = false;
        mensaje("Número de tarjeta es requerido", txtNumTarjeta);
    } else if (!numeroReg.test(txtNumTarjeta.value)) {
        resultado = false;
        mensaje("Número de tarjeta debe ser de 16 digitos", txtNumTarjeta);
    }


    //validacion select
    if (selectTipoTarjeta.value === null || 
        selectTipoTarjeta.value === '0' || 
        selectTipoTarjeta.options[selectTipoTarjeta.selectedIndex].text ==='--') {
        resultado = false;
        mensaje("Debe seleccionar un tipo de tarjeta", selectTipoTarjeta);
    }

    if (selectMes.value === null || 
        selectMes.value === '0' || 
        selectMes.options[selectMes.selectedIndex].text ==='--') {
        resultado = false;
        mensaje("Debe seleccionar un mes", selectMes);
    }

    if (selectAnio.value === null || 
        selectAnio.value === '0'|| 
        selectAnio.options[selectAnio.selectedIndex].text ==='--') {
        resultado = false;
        mensaje("Debe seleccionar un año", selectAnio);
    }


    if (!resultado) {
        event.preventDefault(); //stop submit
    }


}

function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    var nodoPadre = elemento.parentNode;
    var nodoMensaje = document.createElement("span");
    nodoMensaje.textContent = cadenaMensaje;
    nodoMensaje.style.color = "red";
    nodoMensaje.style.fontSize = "12px";
    nodoMensaje.display = "block";
    nodoMensaje.setAttribute("class", "mensajeError");
    nodoPadre.appendChild(nodoMensaje);
}

function limpiarMensajes() {
    var mensajes = document.querySelectorAll(".mensajeError");
    for (let i = 0; i < mensajes.length; i++) {
        mensajes[i].remove();// remueve o elimina un elemento de mi doc html
    }
}