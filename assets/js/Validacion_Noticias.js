/*CONTROL DE FORMULARIO*/
var form = document.getElementById("form_noticia");
form.addEventListener('submit', validar);
let cont = 0;

function validar(event){
    var resultado = true;
    var txtTitulo = document.getElementById("titulo");
    var slctTema = document.getElementById("tema");
    var slctDisp = document.getElementById("dispositivo");
    var txtDescrip = document.getElementById("descripcion");
    var txtImagen = document.getElementById("seleccionArchivos");
    
    limpiarMensajes();

    //validacion email
    if (txtTitulo.value == "") {
        resultado = false;
        mensaje("Título es requerido", txtTitulo);
    } else if(txtTitulo.length <10){
        resultado = false;
        mensaje("El título debe tener más de 10 caracteres", txtTitulo);
    }
    
    //validacion select temas
    if(slctTema.value == 0 || slctTema.value == ""){
        resultado = false;
        mensaje("Seleccione una sección", slctTema);
    }

    //validacion select temas
    if(slctDisp.value == 0 || slctDisp.value == ""){
        resultado = false;
        mensaje("Seleccione un dispositivo", slctDisp);
    }


    if(!resultado){
        event.preventDefault(); //stop submit
    }

    //validacion descripcion
    if (txtDescrip.value == "") {
        resultado = false;
        mensaje("Descripción es requerida", txtDescrip);
    } else if(txtDescrip.length <50){
        resultado = false;
        mensaje("La descripción debe tener más de 50 caracteres", txtDescrip);
    }

    //validacion imagen
    if (txtImagen.value == "") {
        resultado = false;
        mensaje("Imagen es requerida", txtImagen);
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