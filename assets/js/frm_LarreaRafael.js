
var form = document.getElementById("frmLogIn");
form.addEventListener('submit', formulario_validar);


function iniciar() {
  servidores_Load();
  // console.log(form);
};

class Servidores {
  constructor(id, nombre, modoValidacion) {
    this.id = id;
    this.nombre = nombre;
    this.modoValidacion = modoValidacion;
  }
}
/************************formualario opcion servidores***************************** */
var objServidores = new Array(
  new Servidores(0, "E.E.U.U. - California", "user"),
  new Servidores(1, "E.E.U.U. - Miami", "user"),
  new Servidores(2, "America del Sur", "mail"),
  new Servidores(3, "Europa - Oriente", "user"),
  new Servidores(4, "Europa - Occidente", "user"),
  new Servidores(5, "Asia -  Central", "mail"),
  new Servidores(6, "Otros", "mail"),
);

function servidores_Load() {
  let lst = document.getElementById('regiones');

  const fragment = document.createDocumentFragment();
  objServidores.forEach(item => {
    const option = document.createElement("option");
    option.value = item.id;
    option.id = "servidor" + item.id;
    option.text = item.nombre;
    fragment.appendChild(option);
  });

  lst.appendChild(fragment);
};

function servidores_Buscar(Id) {
  let valorEncontrado = objServidores.find(function (obj) {
    return obj.id == Id;
  });
  return valorEncontrado;
}

function servidores_ActivarCampos(item) {
  let divUsuario = document.getElementById('divUser');
  let divMail = document.getElementById('divEmail');
  let inputMail = document.getElementById('email-ingreso');
  let inputUsuario = document.getElementById('txt-ingreso');

  let servidor = servidores_Buscar(item.value);


  switch (servidor.modoValidacion) {
    case "mail":
      divMail.style = "visibility: visible;  display: inherit;";
      divUsuario.style = "visibility: collapse; display:none;";
      /*quitado por solicitud del proyecto*/
      //inputMail.required = true;
      //inputUsuario.required = false;
      break;
    case "user":
      divMail.style = "visibility:collapse ; display:none;";
      divUsuario.style = "visibility:visible ;  display: inherit;";
      /*quitado por solicitud del proyecto*/
      //inputMail.required = false;
      //inputUsuario.required = true;
      break;
    default:
      break;
  }

};
/************************formualarios***************************** */

function formulario_mensaje(mensaje, elemento) {
  alert(mensaje);
  elemento.focus();
  throw mensaje;
}

function formulario_LimpiarTodoMensaje() {
  var mensajes = document.querySelectorAll(".mensajeError");
  // eliminar los nodos con esta clase
  for (let i = 0; i < mensajes.length; i++) {
    mensajes[i].remove();
  }
}

function formulario_validar(event) {
  try {

    let txtUsuario = document.getElementById("txt-ingreso");
    let txtCorreo = document.getElementById("email-ingreso");
    let txtPassword = document.getElementById("password");
    let cmbServidor = document.getElementById("regiones");

    let servidor = servidores_Buscar(cmbServidor.value);
    let validador_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    formulario_LimpiarTodoMensaje();

    switch (servidor.modoValidacion) {
      case "mail":
        if (txtCorreo.value === "") {
          formulario_mensaje("Email es requerido", txtCorreo);
        }
        else if (!validador_correo.test(txtCorreo.value)) {
          formulario_mensaje("Email no es correcto", txtCorreo);
        }
        break;
      case "user":
        if (txtUsuario.value === '') {
          formulario_mensaje("Usuario es requerido", txtUsuario);
        } else if (txtUsuario.value.length > 15) {
          formulario_mensaje("Usuario debe contener maximo 15 caracteres", txtUsuario);
        }
        break;
      default:
        break;
    }

    if (txtPassword.value === "") {
      bandera = false;
      formulario_mensaje("Password es requerido", txtPassword);
    }
    event.preventDefault();
     alert("Bienvenido");     
     
  } catch (error) {
    //console.log(error);
    event.preventDefault();
  }
}
function formulario_olvidoContrasenia()
{
  let valor=  prompt("Ingrese su email para validar el proceso");
  formulario_redirigir();
}
function formulario_redirigir()
{
  location.replace("index.html");
}
iniciar(); 