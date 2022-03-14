<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Página para contactos ArkGames" />       
        <meta name="keywords" content="formulario,juegos,comentario" /> 
        <link rel="stylesheet" href="../../assets/css/master.css" /> 
        <link rel="stylesheet" href="../../assets/css/GualeEvelyn.css"/> 
        <link rel="shortcut icon" href="../../assets/img/logo.svg"/>
        <title>Comentarios - ArkGames</title>

        <style>
            #frm_comentarios{
                        
                width: 500px;
                background: rgba(28, 28, 28, 0.6);
                padding: 15px;
                margin: auto;
                margin-top: 100px;
                margin-bottom: 20px;
                border-radius: 4px;
                color: white;
                font-size:large;
                box-shadow: 7px 13px 37px #000;
            }

            .elemento_form{
                display: flex;
                justify-content: space-around;
                flex-direction: column;
            }

            .frm_campos{
                padding: 10px;
            }

            .controls{
                width: 1px;
                margin-left: 4px;
                padding-right: 5px;
            }

            .controls_2{
                width: 90%;
                padding: 4px;
                border-radius: 3px;
                margin-bottom: 13px;
                margin-left: 2px;            
                               
            }

            #frm_comentarios .botn{
                width: 90%;
                background: darkslategray;
                padding: 12px;
                color: white;
                font-size: 16px;
            }

            #btEnviar:hover {                
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
        <div>
            <div id="frm_comentarios">
                
                    <fieldset>

                        <legend style="color:#31B2A0; font-weight: bold; "><h4>TU OPINION CUENTA!</h4></legend> 

                        <h1 class="frm_campos" style="text-align: center; font-size: 36px">Ayudanos a seguir mejorando. </h1>

                        <div class="frm_campos">

                            <form id="formulario">

                                <div class=elemento_form >
                                    <label  class="controls" for="nombre">Nombre: </label>
                                    <input class="controls_2" type="text" id="nombre">
                                </div>

                                <div class=elemento_form>
                                    <label class="controls" for="apellido">Apellido: </label>
                                    <input class="controls_2" type="text" id="apellido">
                                </div>

                                <div >
                                    <label>Genero:  </label>
                                    <input class="gen" id="fem" type="radio" name="genero" value="F" />Femenino
                                    <input class="gen" id="mas" type="radio" name="genero" value="M" />Masculino
                                    <input class="gen" id="otro" type="radio" name="genero" value="O" />Otro
                                </div><br>
                                                            
                                <div class=elemento_form>
                                    <label class="controls" for="phone">Telefono: </label>
                                    <input class="controls_2" type="tel" id="phone" placeholder="099-999-9999">
                                </div>
                                
                                <div class=elemento_form>
                                    <label class="controls" for="ciudades">Ciudad: </label>
                                    <select class="controls_2"  id="ciudades"> 
                                        <option value="0">Seleccione...</option>                      
                                        <option value="1">Guayaquil</option>
                                        <option value="2">Quito</option>
                                        <option value="3">Portiviejo</option>
                                        <option value="4">Loja</option>
                                    </select>
                                </div>
                                
                                <div class=elemento_form>
                                    <label class="controls" for="correo">Correo Electronico: </label>
                                    <input class="controls_2" type="email" id="correo">
                                </div>
                                
                                <div >
                                    <label class="controls" for="asunto">Asunto: </label>
                                    <input class="controls_2" type="text" id="asunto"><br>
                                </div>

                                <div>
                                    <textarea id="mensaje" name="mensaje" placeholder="Escriba aqui su comentario"  cols="70" rows="10"></textarea>
                                </div>
                                
                                <div class="botnes">
                                    <input class="botn" id="btEnviar" type="submit" value="ENVIAR">
                                    <input class="botn" type="reset" value="CANCELAR">
                                </div>  
                            </form>                          
                        

                        </div>
                                              
                    </fieldset>
                    
                
            </div>
           
        </div>
        <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->

        <script async type="text/javascript" src="../../assets/js/validacionFormEGuale.js"></script>  

        
    </body>
</html>