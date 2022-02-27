/*CONTROL DE FORMULARIO*/
var form = document.getElementById("form_suscripcion");
form.addEventListener('submit', validar);
let cont = 0;

function validar(event){
    var resultado = true;
    var txtEmail = document.getElementById("email");
    var checkboxTema = document.querySelectorAll(".tema");
    var checkboxDispositivo = document.querySelectorAll(".dispositivo");
    var radiobDiscord = document.getElementsByName("rdbdiscord");
    var radiobfrecuencia = document.getElementsByName("rdbfrecuencia");
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    
    limpiarMensajes();

    //validacion email
    if (txtEmail.value == "") {
        resultado = false;
        mensaje("Email es requerido", txtEmail);
    } else if (!correo.test(txtEmail.value)) {
        resultado = false;
        mensaje("Email no es correcto", txtEmail);
    }

    //validacion de varios checkbox tema
    sel = false;
   
    for (let i = 0; i < checkboxTema.length; i++) {
        if (checkboxTema[i].checked) {
            sel = true;
            break;
        }
        else{
            sel=false;
        }
    }
    if (!sel) {
        mensaje("Debe seleccionar al menos un tema de su preferencia", checkboxTema[0]);
    } 
    
    //validacion de varios checkbox dispositivo
    sel = false;
       
    for (let i = 0; i < checkboxDispositivo.length; i++) {
        if (checkboxDispositivo[i].checked) {
            sel = true;
            break;
        }
        else
        {
            sel=false;
        }
    }
    if (!sel) {
        mensaje("Debe seleccionar un dispositivo tecnológico de su preferencia", checkboxDispositivo[0]);
    }   
    
    //validacion radio button frecuencia
    var sel = false;
    for (let i = 0; i < radiobfrecuencia.length; i++) {
        if (radiobfrecuencia[i].checked) {
            sel = true;
            let res = radiobfrecuencia[i].value;
            
            break;
        }
    }
    if (!sel) {
        resultado = false;
        mensaje("Debe seleccionar la frecuencia", radiobfrecuencia[0]);
    }   

    //validacion radio button discord
    var sel = false;
    for (let i = 0; i < radiobDiscord.length; i++) {
        if (radiobDiscord[i].checked) {
            sel = true;
            let res = radiobDiscord[i].value;
            
            break;
        }
    }
    if (!sel) {
        resultado = false;
        mensaje("Debe seleccionar si desea unirse al canal", radiobDiscord[0]);
    }

    if(!resultado){
        event.preventDefault(); //stop submit
    }

    
}

function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    var nodoPadre = elemento.parentNode;
    var nodoMensaje = document.createElement("span");
    nodoMensaje.textContent = cadenaMensaje;
    nodoMensaje.style.color = "red";
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