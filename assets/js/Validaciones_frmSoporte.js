var form = document.getElementById("Soporte");
form.addEventListener('submit', validar);
let cont=0;

function validar(event) {
    var resultado = true;
    var txtUsuario = document.getElementById("usuario");
    var txtCorreo = document.getElementById("correo");
    var txtTelefono = document.getElementById("phone");
    var selectServicio = document.getElementById("servicios");
    var selectJuego = document.getElementById("juegos");    
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros
    
    limpiarMensajes();
    
    if (txtUsuario.value === '') {
        resultado = false;
        mensaje("Usuario es requerido", txtUsuario);
    } else if (txtUsuario.value.length > 15) {
        resultado = false;
        mensaje("Usuario debe contener maximo 15 caracteres", txtUsuario);
    }
    
    if (txtTelefono.value === "") {
        resultado = false;
        mensaje("Telefono es requerido", txtTelefono);
    } else if (!telefonoreg.test(txtTelefono.value)) {
        resultado = false;
        mensaje("Telefono debe ser de 10 digitos", txtTelefono);
    }
    
    if (txtCorreo.value === "") {
        resultado = false;
        mensaje("Email es requerido", txtCorreo);
    } else if (!correo.test(txtCorreo.value)) {
        resultado = false;
        mensaje("Email no es correcto", txtCorreo);
    }
    
    if (selectServicio.value === null || selectServicio.value === '0' ) {
        resultado = false;
        mensaje("Debe seleccionar un servicio", selectServicio);
    }
    
    if (selectJuego.value === null || selectJuego.value === '0' ) {
        resultado = false;
        mensaje("Debe seleccionar un producto", selectJuego);
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
//    nodoMensaje.style.color = "red";
//    nodoMensaje.display = "block";
    nodoMensaje.setAttribute("class", "mensajeError");
    nodoPadre.appendChild(nodoMensaje);
    }

    function limpiarMensajes() {
    var mensajes = document.querySelectorAll(".mensajeError");
    for (let i = 0; i < mensajes.length; i++) {
        mensajes[i].remove();// remueve o elimina un elemento de mi doc html
        }
    }    



