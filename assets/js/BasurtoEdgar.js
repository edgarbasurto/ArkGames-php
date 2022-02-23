var paginas = document.getElementById('numpagina');
var cuadriculas = document.querySelectorAll('.cuadricula');
var select = document.getElementById('cantreg');
var selectedOption = select.options[select.selectedIndex].text;
var selectedPage = paginas.options[paginas.selectedIndex].text;
var next = document.getElementById('nextPage');
var previous = document.getElementById('previousPage');
var first = document.getElementById('firstPage');
var last = document.getElementById('lastPage');



function actualizarCombo() {
    if (selectedOption != "Todos") {
        var totalPaginas = Math.ceil(cuadriculas.length / selectedOption)
        for (let index = 1; index <= totalPaginas; index++) {
            const option = document.createElement('option');
            option.value = index;
            option.text = index;
            paginas.appendChild(option);
        }
    }
}


function limpiar() {
    for (let i = paginas.options.length; i >= 0; i--) {
        paginas.remove(i);
    }
};



select.addEventListener('change',
    function () {
        selectedOption = this.options[select.selectedIndex].text;
        actualizar();

    });

paginas.addEventListener('change',
    function () {
        selectedPage = this.options[paginas.selectedIndex].text;
        actualizar();
    });

next.addEventListener('click', nextPage);

previous.addEventListener('click', previousPage);

first.addEventListener('click', firstPage);

last.addEventListener('click', lastPage);

function actualizar() {
    for (let index = 0; index < cuadriculas.length; index++) {
        var element = cuadriculas[index];
        limpiar();
        actualizarCombo();
        paginas.selectedIndex = selectedPage - 1;
        if (selectedOption === "Todos") {
            element.style.display = "block";
        } else {
            if (element.id <= (selectedPage * selectedOption) && element.id > ((selectedPage * selectedOption) - selectedOption)) {
                element.style.display = "block";
                paginas.selectedIndex = selectedPage - 1;
            } else {
                element.style.display = "none";
            }
        }
    }
};

function nextPage() {
    var totalPaginas = Math.ceil(cuadriculas.length / selectedOption);
    console.log(selectedPage);
    console.log(totalPaginas);
    if (selectedPage < totalPaginas) {
        let nextPage = selectedPage++;
        actualizar();
    }

};

function previousPage() {
    if (selectedPage > 1) {
        let previousPage = selectedPage--;
        // paginas.setAttribute.selectedOption = previousPage;
        actualizar();
    }

};

function firstPage() {
    paginas.selectedIndex = 1;
    selectedPage = 1;
    actualizar();
};

function lastPage() {
    var totalPaginas = Math.ceil(cuadriculas.length / selectedOption);
    paginas.selectedIndex = totalPaginas;
    selectedPage = totalPaginas;
    actualizar();
};

actualizar();


