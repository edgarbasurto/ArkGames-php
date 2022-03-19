// var form = document.querySelector("#busquedaAjax");
// form.addEventListener('keyup', cargarProductos);

// function cargarProductos(){
//     // leer paramteros
//     var bus= document.getElementById("busquedaAjax").value;
//     // realizar la peticion
//     var url="index.php?c=productos&f=buscarAjax&b="+ bus;
//     var xmlh = new XMLHttpRequest();
//     xmlh.open("GET", url, true);
//     xmlh.send();

//     // lectura de respuesta
//      xmlh.onreadystatechange = function(){
//         if(xmlh.readyState === 4 && xmlh.status===200){
//             var respuesta = xmlh.responseText;
//              var productos = JSON.parse(respuesta);

//              //actualizar cierta parte de la pagina
//               console.log(productos);
//             // actualizar cierta parte de la pagina
//                        resultados = '';
//             for (var i = 0; i < productos.length; i++) {
//                 resultados += '<tr>';
//                 resultados += '<td>' + productos[i].prod_codigo + '</td>';
//                 //o tambien  resultados += '<td>' + producto['prod_codigo']+ '</td>';
//                 resultados += '<td>' + productos[i].prod_nombre + '</td>';
//                 resultados += '<td>' + productos[i].cat_nombre + '</td>';
//                 resultados += '<td>' + productos[i].prod_precio + '</td>';
//                   resultados += '<td>' +
//                         "<a href='index.php?c=Productos&a=editar&id=" + productos[i].prod_id +
//                         "' " + "class='btn btn-primary'><i class='fas fa-marker'></i></a>" +
//                         "<a href='index.php?c=Productos&a=eliminar&id=" + productos[i].prod_id + "'" +
//                         "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + producto.prod_nombre
//                         + " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
//                 resultados += '</tr>';

//             }
//             document.getElementById('tbodyProd').innerHTML = resultados;
//         }
//      };
// }


function updateCartItem(obj, id) {
    // realizar la peticion
    var url = "index.php?c=carrito&a=updateCartItem&id=" + id + "&qty=" + obj.value;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();

    // lectura de respuesta
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            var productos = JSON.parse(respuesta);

            //actualizar cierta parte de la pagina
            console.log(productos);
            //actualizar cierta parte de la pagina
                    
            location.reload();
            // document.getElementById('subtotal_carrito').innerHTML = 0;
            // document.getElementById('total_carrito').innerHTML = 0;




        }


    }
}


