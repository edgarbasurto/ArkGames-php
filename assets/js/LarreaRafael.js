"use strict";

var maestro = document.getElementsByClassName('main')[0],
    divslider = maestro.getElementsByClassName('div_slider')[0],
    slider = divslider.getElementsByClassName('slider')[0];

var slide_Actual = 0, slide_Intervalos, slide_TiempoIntervalo = 7000;
var catalogo_Intervalos, catalogo_TiempoIntervalo = 3000;

function iniciar() {
    catalogo_Disparador();
    slide_Disparador();

    slide_Timer();
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

/***Inicio código control autoslide ***/
function slide_Timer() {
    clearInterval(slide_Intervalos);
    slide_Intervalos = setInterval(() => {
        slide_Disparador();
    }, slide_TiempoIntervalo);
}

function slide_Disparador() {
    let tmp = slide_Actual;
    while (tmp == slide_Actual) {
        tmp = randmon(4);
    }
    slide_Actual = tmp;
    slide_Establecer(slide_Actual);
}

function slide_Establecer(index) {
    for (let i = 0; i < slider.childElementCount; i++) {
        let element = slider.children[i];
        if (i == index) { element.style.opacity = 1; }
        else { element.style.opacity = 0; }
    }
}
/***Fin Código control autoslide ***/

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

var libCatalogo = new Array(
    new Catalogo(0, "Hitman 3", "$2.50 c/mes", "../../assets/img/posters/Hitman3_poster.jpg", true),
    new Catalogo(1, "Back 4 Blood", "$3.25  c/mes", "../../assets/img/posters/Back4Blood_poster.jpg", false),
    new Catalogo(2, "Deathloop", "$2.55  c/mes", "../../assets/img/posters/Deathloop_poster.jpg", false),
    new Catalogo(3, "FIFA 22", "$2.50 c/mes", "../../assets/img/posters/FIFA_22_Poster.jpg", false),
    new Catalogo(4, "Fornite", "$1.66 c/mes", "../../assets/img/posters/fornite_poster.jpg", true),
    new Catalogo(5, "Forza Horison", "$2.50 c/mes", "../../assets/img/posters/Forza-Horizon-poster.jpg", false),
    new Catalogo(6, "Guadians Galaxy", "$2.80 c/mes", "../../assets/img/posters/GuardiansoftheGalaxy_poster.jpg", true),
    new Catalogo(7, "Halo Infinite", "$2.50 c/mes", "../../assets/img/posters/halo-infinite_poster.jpg", false),
    new Catalogo(8, "It Takes 2", "$2.50 c/mes", "../../assets/img/posters/ItTakesTwo_poster.jpg", false),
    new Catalogo(9, "Kena Bridge", "$2.50 c/mes", "../../assets/img/posters/KenaBridgeOfSpirits_poster.jpg", false),
    new Catalogo(10, "Little Night", "$2.50 c/mes", "../../assets/img/posters/LittleNightmares2_poster.jpg", false),
    new Catalogo(11, "Psychonauts", "$1.80 c/mes", "../../assets/img/posters/Psychonauts2_poster.jpg", true),
    new Catalogo(12, "Resident Evil", "$2.80 c/mes", "../../assets/img/posters/ResidentEvilVillage_poster.jpg", false),
    new Catalogo(13, "Returnal", "$3.63 c/mes", "../../assets/img/posters/returnal_poster.jpeg", false),
    new Catalogo(14, "The Medium", "$1.08 c/mes", "../../assets/img/posters/TheMedium_poster.jpg", true),
);

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