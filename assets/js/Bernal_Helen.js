/*VARIABLES PARA BOTON ARRIBA*/
let btnArriba = document.getElementById("flecha_arriba");
document.addEventListener("scroll", scroll);

/*VARIABLES PARA SLIDER DE ANUNCIO*/
const slider = document.querySelector("#slider");
let sliderSection = document.querySelectorAll(".slider_section");
let sliderSectionLast = sliderSection[sliderSection.length-1];
const btnLeft = document.querySelector("#btn-left");
const btnRight = document.querySelector("#btn-right");
slider.insertAdjacentElement('afterbegin', sliderSectionLast);

/*VARIABLES PARA NOTICIA DESTACADA*/
var clic = 1;
function mostrarBloque() {
    var contenido = document.getElementById("juego_destacado");
    var aside_destacado = document.getElementById("aside_nuevo");
    if(clic==1){
        contenido.style.visibility = 'visible';
        aside_destacado.style.height="400px";
        clic = clic + 1;
     
    } else{
        contenido.style.visibility = 'hidden';
        aside_destacado.style.height="70px";
        clic = 1;
    }      
}

/*BOTON PARA DIRIGIRSE ARRIBA DE LA PAGINA*/
function scroll(){
    var pagina = document.querySelector("html");
    var x = pagina.scrollTop;
    if(x >= 0 && x <= 20 ){
    btnArriba.style.visibility='hidden';
    }else{
        btnArriba.style.visibility='visible';
    }
};


btnArriba.addEventListener("click", function() {
    window.scrollTo(0, 0)
});


/*CONTROL DE SLIDER ANUNCIO*/
function Next(){
    let sliderSectionFirst = document.querySelectorAll(".slider_section")[0];
    slider.style.marginLeft="-200%";
    slider.style.transition="all 0.5s";
    setTimeout(function(){
        slider.style.transition="none";
        slider.insertAdjacentElement('beforeend', sliderSectionFirst);
        slider.style.marginLeft="-100%";
    },500);
}

function Prev(){
    let sliderSection = document.querySelectorAll(".slider_section")[0];
    let sliderSectionLast = sliderSection[sliderSection.length-1];
    slider.style.marginLeft="0";
    slider.style.transition="all 0.5s";
    setTimeout(function(){
        slider.style.transition="none";
        slider.insertAdjacentElement('afterbegin', sliderSectionLast);
        slider.style.marginLeft="-100%";
    },500);
}

btnRight.addEventListener('click', function(){
    Next();
});

btnLeft.addEventListener('click', function(){
    Prev();
});

setInterval(function(){
    Next();
}, 5000);

