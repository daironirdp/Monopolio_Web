<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>



        <form class="" role="form" id="configPartida" action="vista/paginas/juego.php?accion=juegoNuevo" method="post">

            <div class="col-md-12"> 
                <div class="form-group col-md-4">

                    <label for="numeroJugadores">Numero de jugadores</label>
                    <select name="numeroJugadores" class="form-control" id="numeroJugadores">
                        <option value="0">-- Seleccione --</option>

                        <option value="1"> Un jugador</option>
                        <option value="2"> Dos jugadores</option>
                        <option value="3"> Tres jugadores</option>
                        <option value="4"> Cuatro Jugadores</option>
                        <option value="5"> Cinco jugadores</option>
                        <option value="6"> Seis jugadores</option>
                    </select>

                </div>



                <div class="form-group col-md-9" id="cajon_salida">

                    <!-- aki van los players-->


                </div>

            </div>





        </form>  


        <?php
        // put your code here
        ?>
    </body>
    <script>

        $("#numeroJugadores").change(function () {
            $(".oculto").remove();//remover residuos de codigo html en caso de q existan 

            var size = $("#numeroJugadores").val();
            if (size != 0) {
                for (var i = 1; i <= size; i++) {
                    $("#cajon_salida").append("<div class='row oculto'>"

                            + "<div class='col-md-4 '>"
                            + " <label for='nombre'> Nombre</label>"
                            + "<input type='text' placeholder='Player" + i + "' class='form-control ' id='player" + i + "' name='player" + i + "'>"
                            + "     </div>"

                            + "     <div class='col-md-4'>"
                            + " <label for='color'>Color</label>"
                            + "<select name='color" + i + "' class='form-control' id='color" + i + "'onchange='gestorColores(event)'onclick='ValorAnteriorColor(event)'>"
                            + "   <option value='0'>-- Seleccione --</option>"

                            + "<option value='1'id='azul'> Azul</option>"
                            + "<option value='2'id='rojo'> Rojo</option>"
                            + "<option value='3'id='verde'> Verde</option>"
                            + "<option value='4'id='morado'> Morado</option>"
                            + "<option value='5'id='carmelita'>Carmelita</option>"
                            + "<option value='6'id='amarillo'> Amarillo</option>"
                            + "</select>"

                            + "</div>"
                            + " <label for='personaje'>Elige un personaje</label>"
                            + "<div class='col-md-4'>"
                            + "  <select name='personaje" + i + "'id='personaje" + i + "'onchange='gestorPersonajes(event)'onclick='ValorAnterior(event)'class='form-control' >"
                            + "<option value='0'>-- Seleccione --</option>"
                            + "<option value='1'class=''id='ambulancia'>Ambulancia</option>"
                            + "<option value='2'class=''id='avion'>Avion de combate</option>"
                            + "<option value='3'class=''id='bicicleta'>Bicicleta</option>"
                            + "<option value='4'class=''id='coche'>Coche</option>"
                            + "<option value='5'class=''id='motocicleta'>Motocicleta</option>"
                            + "<option value='6'class=''id='pelota'>Pelota de futbol</option>"
                            + "</div>"
                            + "</div>");

                }

                $("#configPartida").append("<div class='offset-md-10 oculto'>"
                        + "<input type='submit' value='jugar' class='btn btn-success pull-right '>"

                        + "</div>");

            } else {
                $(".oculto").remove();//remover residuos de codigo html en caso de q existan 

            }



        });


        var valor_anterior = new Array(12);//Guarda el valor anterior elegido por cada jugador
        //Funcion liberacion permite liberar opciones que ya no estan elegidas para hacerlas disponibles para 
        //otros jugadores
        function Liberacion(id) {
      
            var cadena = id.substring(0, 2);
            
            var pos = id.substring(id.length - 1, id.length);//captura el numero del jugador;
             
            if (cadena == "#c") {
                pos = parseInt(pos) + 5;
                
            } else {

                pos = parseInt(pos) - 1;//posicion real del jugador en el array
            }




            var value = valor_anterior[pos];//valor anterior elegido por el jugador
             


            switch (value) {
                case '1':
                    {
                        if (cadena == "#c") {
                            $(".ocultarAzul #azul").show();//hacer disponible el azul         
                            $(".ocultarAzul").removeClass("ocultarAzul");
                        } else {
                            $(".ocultarAmbulancia #ambulancia").show();//hacer disponible ambulancia
                            $(".ocultarAmbulancia").removeClass("ocultarAmbulancia");
                        }

                    }
                    break;
                case '2':
                    {
                        if (cadena == "#c") {
                            $(".ocultarRojo #rojo").show();//hacer disponible el color rojo         
                            $(".ocultarRojo").removeClass("ocultarRojo");
                        } else {
                            $(".ocultarAvion #avion").show();//hacer disponible el avion
                            $(".ocultarAvion").removeClass("ocultarAvion");
                        }


                    }
                    break;
                case '3':
                    {
                        if (cadena == "#c") {
                            $(".ocultarVerde #verde").show();//hacer disponible el color rojo         
                            $(".ocultarVerde").removeClass("ocultarVerde");
                        } else {
                            $(".ocultarBicicleta #bicicleta").show();//hacer disponible bicicleta
                            $(".ocultarBicicleta").removeClass("ocultarBicicleta");
                        }


                    }
                    break;
                case '4':
                    {
                        if (cadena == "#c") {
                            $(".ocultarMorado #morado").show();//hacer disponible el color rojo         
                            $(".ocultarMorado").removeClass("ocultarMorado");
                        } else {
                            $(".ocultarCoche #coche").show();//hacer  disponible el coche
                            $(".ocultarCoche").removeClass("ocultarCoche");
                        }


                    }
                    break;
                case '5':
                    {
                        if (cadena == "#c") {
                            $(".ocultarCarmelita #carmelita").show();//hacer disponible el color rojo         
                            $(".ocultarCarmelita").removeClass("ocultarCarmelita");
                        } else {
                            $(".ocultarMotocicleta #motocicleta").show();//hacer disponible motocicleta
                            $(".ocultarMotocicleta").removeClass("ocultarMotocicleta");
                        }


                    }
                    break;
                case '6':
                    {
                        if (cadena == "#c") {
                            $(".ocultarAmarillo #amarillo").show();//hacer disponible el color rojo         
                            $(".ocultarAmarillo").removeClass("ocultarAmarillo");
                        } else {
                            $(".ocultarPelota #pelota").show();//hacer disponible la pelota
                            $(".ocultarPelota").removeClass("ocultarPelota");
                        }

                    }
                    break;
            }

        }
function ValorAnteriorColor(e){
    switch(e.target){
        //color
                case color1:
                    {  
                        valor_anterior[6] = $("#color1").val();//valor de color 1

                    }
                    break;

                case color2:
                    {
                        valor_anterior[7] = $("#color2").val();//valor de color 2
                    }
                    break;
                case color3:
                    {
                        valor_anterior[8] = $("#color3").val();//valor de color 3
                    }
                    break;
                case color4:
                    {
                        valor_anterior[9] = $("#color4").val();//valor de color 4
                    }
                    break;
                case color5:
                    {
                        valor_anterior[10] = $("#color5").val();//valor de color 5
                    }
                    break;
                case color6:
                {
                    valor_anterior[11] = $("#color6").val();//valor de color 6
                }
        
    }
    
}
        function ValorAnterior(e) {
//funcion que llena el arreglo de valores elegidos anteriormente por los jugadores
          
        switch (e.target) {
                case personaje1:
                    {
                        valor_anterior[0] = $("#personaje1").val();//valor de personaje 1

                    }
                    break;

                case personaje2:
                    {
                        valor_anterior[1] = $("#personaje2").val();//valor de personaje 2
                    }
                    break;
                case personaje3:
                    {
                        valor_anterior[2] = $("#personaje3").val();//valor de personaje 3
                    }
                    break;
                case personaje4:
                    {
                        valor_anterior[3] = $("#personaje4").val();//valor de personaje 4
                    }
                    break;
                case personaje5:
                    {
                        valor_anterior[4] = $("#personaje5").val();//valor de personaje 5
                    }
                    break;
                case personaje6:
                {
                    valor_anterior[5] = $("#personaje6").val();//valor de personaje 6
                }


            }
        }

        function gestorPersonajesAux(id) {
//funcion para deshabilitar para otros jugadores la opcion seleccionada por un jugador determinado
            var valor = $(id).val();
            var numeroJugadores = $("#numeroJugadores").val();
            var cadena = id.substring(0, 2);
            var id2;
            if (cadena == "#c") {
                id2 = "#color";
            } else {
                var id2 = "#personaje";
            }
            Liberacion(id);
            switch (valor) {
                case '1':
                    {

                        for (var i = 1; i <= numeroJugadores; i++) {
                            if (id2 + i != id) {

                                if (cadena == "#c") {

                                    $(id2 + i).addClass("ocultarAzul");
                                } else {
                                    $(id2 + i).addClass("ocultarAmbulancia");
                                }

                            }
                        }

                        if (cadena == "#c") {
                            $(".ocultarAzul #azul").hide();
                        } else {
                            $(".ocultarAmbulancia #ambulancia").hide();
                        }

                    }
                    break;

                case '2':
                    {
                        for (var i = 1; i <= numeroJugadores; i++) {
                            if (id2 + i != id) {
                                if (cadena == "#c") {

                                    $(id2 + i).addClass("ocultarRojo");
                                } else {
                                    $(id2 + i).addClass("ocultarAvion");
                                }



                            }
                        }

                        if (cadena == "#c") {
                            $(".ocultarRojo #rojo").hide();
                        } else {
                            $(".ocultarAvion #avion").hide();
                        }


                    }
                    break;
                case '3':
                    {
                        for (var i = 1; i <= numeroJugadores; i++) {
                            if (id2 + i != id) {
                                if (cadena == "#c") {

                                    $(id2 + i).addClass("ocultarVerde");
                                } else {
                                    $(id2 + i).addClass("ocultarBicicleta");
                                }
                            }
                        }

                        if (cadena == "#c") {
                            $(".ocultarVerde #verde").hide();
                        } else {
                            $(".ocultarBicicleta #bicicleta").hide();
                        }
                    }
                    break;
                case '4':
                    {


                        for (var i = 1; i <= numeroJugadores; i++) {
                            if (id2 + i != id) {
                                if (cadena == "#c") {

                                    $(id2 + i).addClass("ocultarMorado");
                                } else {
                                    $(id2 + i).addClass("ocultarCoche");
                                }
                            }
                        }

                        if (cadena == "#c") {
                            $(".ocultarMorado #morado").hide();
                        } else {
                            $(".ocultarCoche #coche").hide();
                        }



                    }
                    break;
                case '5':
                    {


                        for (var i = 1; i <= numeroJugadores; i++) {
                            if (id2 + i != id) {
                                if (cadena == "#c") {

                                    $(id2 + i).addClass("ocultarCarmelita");
                                } else {
                                    $(id2 + i).addClass("ocultarMotocicleta");
                                }
                            }
                        }

                        if (cadena == "#c") {
                            $(".ocultarCarmelita #carmelita").hide();
                        } else {
                            $(".ocultarMotocicleta #motocicleta").hide();
                        }


                    }
                    break;
                case '6':{
               
                    for (var i = 1; i <= numeroJugadores; i++) {
                        if (id2 + i != id) {
                            if (cadena == "#c") {

                                $(id2 + i).addClass("ocultarAmarillo");
                            } else {
                                $(id2 + i).addClass("ocultarPelota");
                            }
                        }
                    }

                    if (cadena == "#c") {
                        $(".ocultarAmarillo #amarillo").hide();
                    } else {
                        $(".ocultarPelota #pelota").hide();
                    }
                    
                    }
                }




            }
        

        function gestorColores(e) {
            if (e.target == color1) {

                var id = "#color1";
                gestorPersonajesAux(id);

            } else if (e.target == color2) {
                var id = "#color2";
                gestorPersonajesAux(id);

            } else if (e.target == color3) {
                var id = "#color3";
                gestorPersonajesAux(id);

            } else if (e.target == color4) {

                var id = "#color4";
                gestorPersonajesAux(id);
            } else if (e.target == color5) {

                var id = "#color5";
                gestorPersonajesAux(id);
            } else if (e.target == color6) {

                var id = "#color6";
                gestorPersonajesAux(id);
            }


        }
        function gestorPersonajes(e) {

            if (e.target == personaje1) {

                var id = "#personaje1";
                gestorPersonajesAux(id);

            } else if (e.target == personaje2) {
                var id = "#personaje2";
                gestorPersonajesAux(id);

            } else if (e.target == personaje3) {
                var id = "#personaje3";
                gestorPersonajesAux(id);

            } else if (e.target == personaje4) {

                var id = "#personaje4";
                gestorPersonajesAux(id);
            } else if (e.target == personaje5) {

                var id = "#personaje5"
                gestorPersonajesAux(id);
            } else if (e.target == personaje6) {

                var id = "#personaje6";
                gestorPersonajesAux(id);
            }

        }



    </script>
</html>
