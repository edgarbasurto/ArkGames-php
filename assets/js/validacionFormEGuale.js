
var form = document.getElementById("formulario");
form.addEventListener('submit', validar);
let cont = 0;

function validar(event) {

    var resultado = true;
    var txtNombres = document.getElementById("nombre");
    var txtApellido = document.getElementById("apellido");
    var radiosGenero = document.getElementsByName("genero");// document.querySelectorAll("input[name='genero']");
    var txtTelefono = document.getElementById("phone");
    var selectCiudad = document.getElementById("ciudades");
    var txtemail = document.getElementById("correo");
    var txtAsunto = document.getElementById("asunto");
    var txtMensaje = document.getElementById("mensaje");

   
    var letra = /^[a-z ,.'-]+$/i;// letras y espacio   
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var telefono = /^[0-9]{10}$/g;

    limpiarMensajes();

    //validacion nombres 
    if(txtNombres.value == ""){
        resultado = false;
        mensaje("Nombre es requerido", txtNombres);
    }else if (!letra.test(txtNombres.value)) {
        resultado = false;
        mensaje("Nombre solo debe contener letras", txtNombres);
    } else if (txtNombres.value.length > 25) {
        resultado = false;
        mensaje("Nombre maximo 25 caracteres", txtNombres);
    }

    //validacion apellidos
    if (txtApellido.value === '') {
        resultado = false;
        mensaje("Apellido es requerido", txtApellido);
    } else if (!letra.test(txtApellido.value)) {
        resultado = false;
        mensaje("Nombre solo debe contener letras", txtApellido);
    } else if (txtApellido.value.length > 25) {
        resultado = false;
        mensaje("Nombre maximo 25 caracteres", txtApellido);
    }

     //validacion radio button - Genero
     var sel = false;
     for (let i = 0; i < radiosGenero.length; i++) {
         if (radiosGenero[i].checked) {
             sel = true;
             break;
         }
     }
     if (!sel) {
         resultado = false;
         mensaje("Debe seleccionar un género", radiosGenero[0]);
     }

     //validacion telefono
    if (txtTelefono.value === "") {
        resultado = false;
        mensaje("Telefono requerido", txtTelefono);
    } else if (!telefono.test(txtTelefono.value)) {
        resultado = false;
        mensaje("El número de telefono debe contener 10 digitos", txtTelefono);
    }

    //validacion select - ciudad
    if (selectCiudad.value === null || selectCiudad.value === '0') {
        resultado = false;
        mensaje("Debe seleccionar una cuidad", selectCiudad);
    }

     //validacion email
     if (txtemail.value === "") {
        resultado = false;
        mensaje("Email es requerido", txtemail);
    } else if (!correo.test(txtemail.value)) {
        resultado = false;
        mensaje("Email no es correcto", txtemail);
    }

    //validacion Asunto
    if (txtAsunto.value === '') {
        resultado = false;
        mensaje("El Asunto es requerido", txtAsunto);
    } else if (!letra.test(txtAsunto.value)) {
        resultado = false;
        mensaje("El Asunto solo debe contener letras", txtAsunto);
    } else if (txtAsunto.value.length > 30) {
        resultado = false;
        mensaje("maximo 25 caracteres", txtAsunto);
    }

    //validacion textarea
    if (txtMensaje.value === '') {
        resultado = false;
        mensaje("Ingrese el Asunto a describir", txtMensaje);
    } else if (!letra.test(txtMensaje.value)) {
        resultado = false;
        mensaje("Esta sección solo debe contener letras y caracteres de puntuación", txtMensaje);
    } 

    

   if(!resultado){
        event.preventDefault();
   }


}


function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    var nodoPadre = elemento.parentNode;
    var nodoMensaje = document.createElement("span");
    nodoMensaje.textContent = cadenaMensaje;
    nodoMensaje.display = "block";
    nodoMensaje.style.color = "red";
    nodoMensaje.setAttribute("class", "mensaje");

    nodoPadre.appendChild(nodoMensaje);

}

function limpiarMensajes() {
    var mensajes = document.querySelectorAll(".mensaje");
    for (let i = 0; i < mensajes.length; i++) {
        mensajes[i].remove();
    }
} 