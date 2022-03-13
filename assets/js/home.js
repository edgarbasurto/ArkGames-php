"use strict";

var maestro = document.getElementsByClassName('main')[0];

var catalogo_Intervalos, catalogo_TiempoIntervalo = 3000;

function iniciar() {
    catalogo_Disparador();

    catalogo_Timer();
};

function randmon(limite) {
    return Math.floor(Math.random() * limite);
}

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}


/***Inicio código control catalogo dinámico ***/
class Catalogo {
    #nombre;
    #precio;
    #img_uri;
    #isOferta;
    constructor(id, nombre, precio, img_uri, isOferta) {
        this.id = id;
        this.#nombre = nombre;
        this.#precio = precio;
        this.#img_uri = img_uri;
        this.#isOferta = isOferta;

    }

    getSeccion() {
        const div = document.createElement("div");
        div.className = "mini_inline_block";
        div.id = "store" + this.id;

        const a = document.createElement("a");
        a.href = "BasurtoEdgar.html";

        const img = document.createElement("img");
        img.src = this.#img_uri;
        img.alt = this.#nombre;

        const h1 = document.createElement("h1");
        h1.textContent = this.#nombre;

        const h4 = document.createElement("h4");
        h4.textContent = this.#precio;
        if (this.#isOferta == true) { h4.style = "color: red"; }

        a.appendChild(img);
        a.appendChild(h1);
        a.appendChild(h4);
        div.appendChild(a);

        /* doom template
       return '<div class="mini_inline_block" id= "store'+this.id+'"><a href="BasurtoEdgar.html"><img src="' + this.img_uri + '"  alt="'+ this.nombre +'"><h1>'+this.nombre +'</h1><h4 '+this.#ofertaStyle+'>'+ this.precio +'</h4> </a>  </div>';
       */
        return div;
    }
}



var arrayCatalogoActual = catalogo_inicializar(7);

function catalogo_inicializar(tamano) {
    let retorno = new Array(tamano);
    for (let i = 0; i < tamano; i++) {
        retorno[i] = libCatalogo[i];
    }
    return retorno;
};

function catalogo_ValidarRepetido(idRegistro) {
    var valorEncontrado = arrayCatalogoActual.find(function (_catalogo) {
        return _catalogo.id === idRegistro;
    });
    return valorEncontrado;
}
function catalogo_GetRandom() {
    let tmp = randmon(14);
    var valorEncontrado = libCatalogo.find(function (_catalogo) {
        return _catalogo.id == tmp;
    });
    return valorEncontrado;
}
function catalogo_Cambiar() {
    let index_PanelCambiar = randmon(7);

    let objCambiar = catalogo_GetRandom();
    while (catalogo_ValidarRepetido(objCambiar.id)) {
        objCambiar = catalogo_GetRandom();
    }
    arrayCatalogoActual[index_PanelCambiar] = objCambiar;

    catalogo_Disparador();
}
function catalogo_Timer() {
    clearInterval(catalogo_Intervalos);
    catalogo_Intervalos = setInterval(() => {
        catalogo_Cambiar();
    }, catalogo_TiempoIntervalo);
}

function catalogo_Disparador() {
    let secgaleria = document.getElementById('sec_galeria');
    removeAllChildNodes(secgaleria);
    const fragment = document.createDocumentFragment();

    arrayCatalogoActual.forEach(item => {
        fragment.appendChild(item.getSeccion());
    });

    secgaleria.appendChild(fragment);
}

/***Fin código control catalogo dinámico ***/

iniciar();
