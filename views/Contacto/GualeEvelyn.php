<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />        
        <meta name="description" content="Página para contactos ArkGames" />        
        <meta name="keywords" content="videojuegos,catalogo,juegos" /> 
        <link rel="stylesheet" href="../../assets/css/master.css" />  
        <link rel="stylesheet" href="../../assets/css/GualeEvelyn.css"/>       
        <link rel="shortcut icon" href="../../assets/img/logo.svg"/>
        <title>Contactos</title>
        <style>

            #bttenviar{
                border:whitesmoke;
                background-color: #524e4f;
                color: white;
                padding: 10px;
                text-align: center;
                font-size: 15px;
                margin: 1px 1px;
                cursor: pointer;
            }

            #bttenviar:hover {
                box-shadow: 5px 5px 7px 5px whitesmoke;
                background-color: #4CAF50;
            }
           
        </style>
    </head>
    <body>
        <!-------------------------------------------------MENU---------------------------------------->
        <?php
    include_once '../Templates/navBar.php'
    ?>
        <!------------------------------------------------------------------------------------------>
        <div >

            <section>
                <div id="contenedor">
                    <div  class="bloque_titulo">
                        <h1 style="text-align: center">CONTÁCTOS </h1>
                    </div>
                   
                    <div  class="bloque_items">
                        <h3>Regístrese para recibir el boletín más extraordinario conocido por ArkGames!</h3>
                        <br>
                        <p> &#10142; Creditos exclusivos en los juegos <strong>Gratis </strong> todos los meses.</p>
                        <p> &#128562;¡ Sorteos de nuevos juegos !</p>
                        <p> &#9993;  Detalles sobre las últimas actualizaciones y artículos del juego.</p>
                        <p> &#129331; Ultimas noticias de ArkGames. </p><br>                  

                        <div>
                            <label for="email">Ingrese su dirección de correo electrónico</label> <br> 
                            <form id="formCorreo">                               
                                <div>
                                    <input type="email" autocapitalize="off" id="email" name="email" size="45" onkeydown="validation()">
                                    <span id="text"></span><br><br> 
                                </div>

                                <div>                                   
                                    <input id="bttenviar" type="submit" value="ENVIAR">
                                </div>
                            </form>                  
                                         
                        </div>                     
    

                    </div>
                   
                    
                    <div  class="bloque_direccion">

                        <div class="blocKContacto">
                            <div class="contacto_titulo " style="color:green;">ArkGames SUR</div><hr>
                            <div class="contacto_titulo2">Oficinas Administrativas</div>
                            <div class="contact_info2">
                                <div>
                                    <span>Teléfono: +593 4 2524530</span>
                                </div>
                                <div>
                                   <span>Dirección: Sargento Vargas #116 y Av. Olmedo (frente al Club de La Unión)</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="blocKContacto">
                            <div class="contacto_titulo " style="color: indigo;">ArkGames CENTRO</div><hr>
                            <div class="contacto_titulo2">Oficinas Administrativas</div>
                            <div class="contact_info2">
                                <div>
                                   <span>Teléfono: +593 4 2692693</span>
                                </div>
                                <div>
                                    <span>Dirección: Quisquis y Tungurahua (a lado de la Universidad Estatal)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div  class="bloque_empleo">
                        <div> 
                            <a id="comentario" href="frm_empleo.php"> Trabaje con nosotros... </a></div>

                    </div>

                    
                    
                    <div id="map"> 
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37929.7444447131!2d-79.90299703870323!3d-2.2015795349300746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6f695445ffb1%3A0xf5bbafe3b79d59f6!2sGAME%20CITY!5e0!3m2!1ses-419!2sec!4v1642342013628!5m2!1ses-419!2sec"
                         width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" class="mapa"></iframe>
                    </div>
                    

                </div>
            </section>


        </div>
        <br>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->

   
    <script type="text/javascript">
    
        function validation(){
            var form = document.getElementById("formCorreo");
            var email = document.getElementById("email").value;
            var text = document.getElementById("text");
            
            var patter = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        
            if(email.match(patter)){
                form.classList.add("valid")
                form.classList.remove("invalid")
                text.innerHTML= "direccion de correo valida";
                text.style.color= "green";
            }
            else{
                form.classList.remove("valid");
                form.classList.add("invalid");
                text.innerHTML= "direccion de correo incompleta";
                text.style.color= "#ff0000";
            }

            if(email == ""){
                form.classList.remove("valid")
                form.classList.remove("invalid")
                text.innerHTML= "";
                text.style.color= "#00ff00";
            }
        }
    </script>
    </body>
    
</html>