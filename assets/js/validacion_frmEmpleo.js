
var form = document.getElementById("solicitudEmpleo");
form.addEventListener('submit', validar);
let cont = 0;

function validar(event) {
    var resultado = true;
    var txtnombre = document.getElementById("nombre");
    var txtapellido = document.getElementById("apellido");
    var txtedad = document.getElementsByName("edad");
    var txtTelefono = document.getElementById("telefono");
    var txtemail = document.getElementById("email");
    var selectVacante = document.getElementById("vacante");
    var txtExperiencia = document.getElementById("experiencia");
    
    var letra = /^[a-z ,.'-]+$/i;// letras y espacio   
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var telefono = /^[0-9]{10}$/g;

    limpiarMensajes();

    //validacion nombres 
    if(txtnombre.value == ""){
        resultado = false;
        mensaje("Nombre es requerido", txtnombre);
    }else if (!letra.test(txtnombre.value)) {
        resultado = false;
        mensaje("Nombre solo debe contener letras", txtnombre);
    } else if (txtnombre.value.length > 25) {
        resultado = false;
        mensaje("Nombre maximo 25 caracteres", txtnombre);
    }

    //validacion apellidos
    if (txtapellido.value === '') {
        resultado = false;
        mensaje("Apellido es requerido", txtapellido);
    } else if (!letra.test(txtapellido.value)) {
        resultado = false;
        mensaje("Nombre solo debe contener letras", txtapellido);
    } else if (txtapellido.value.length > 25) {
        resultado = false;
        mensaje("Nombre maximo 25 caracteres", txtapellido);
    }

     //validacion edad
     if (txtedad.value === "") {
        resultado = false;
        mensaje("La edad es requerida", txtedad);
    }  
    if(!resultado){
        event.preventDefault(); //stop submit
    }

     //validacion telefono
    if (txtTelefono.value === "") {
        resultado = false;
        mensaje("Telefono requerido", txtTelefono);
    } else if (!telefono.test(txtTelefono.value)) {
        resultado = false;
        mensaje("El número de telefono debe contener 10 digitos", txtTelefono);
    }

     //validacion email
     if (txtemail.value === "") {
        resultado = false;
        mensaje("Email es requerido", txtemail);
    } else if (!correo.test(txtemail.value)) {
        resultado = false;
        mensaje("Email no es correcto", txtemail);
    }

     //validacion select vacante
     if(selectVacante.value == 0 || selectVacante.value == ""){
        resultado = false;
        mensaje("Seleccione una vacante", selectVacante);
    }

    //validacion experiencia
    if (txtExperiencia.value === '') {
        resultado = false;
        mensaje("Debe ingresar su experiencia", txtExperiencia);
    } else if (!letra.test(txtExperiencia.value)) {
        resultado = false;
        mensaje("Esta sección solo debe contener letras y caracteres de puntuación", txtExperiencia);
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