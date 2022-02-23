let test = document.getElementById("categorias");

//Efectos de hover para menú 
test.addEventListener("mouseenter", function( event ) {
  event.target.style.color = "purple";

  setTimeout(function() {
    event.target.style.color = "";
  }, 250);
}, false);

test.addEventListener("mouseover", function( event ) {
  event.target.style.color = "orange";

  setTimeout(function() {
    event.target.style.color = "";
  }, 250);
}, false);

// Efecto de hover para menú ayuda per.
let per = document.getElementById("ayuda");

//Efectos de hover para menú 
per.addEventListener("mouseenter", function( event ) {
  event.target.style.color = "purple";

  setTimeout(function() {
    event.target.style.color = "";
  }, 300);
}, false);

per.addEventListener("mouseover", function( event ) {
  event.target.style.color = "green";

  setTimeout(function() {
    event.target.style.color = "";
  }, 500);
}, false);

// Hover sobre imagenes
function cambioImg(x) {
  x.style.height = "190px";
  x.style.width = "370px";  
}

function normalImg(x) {
  x.style.height = "200px";
  x.style.width = "380px";
}


function cambioImg2(x) {
  x.style.height = "320px";
  x.style.width = "775px";  
}

function normalImg2(x) {
  x.style.height = "330px";
  x.style.width = "785px";
}
