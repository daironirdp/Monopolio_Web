<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html id="paginaJuego">
    <head>
        <meta charset="UTF-8">
        <title>Monopolio_Web>>Jugando</title>
        <link href='../css/font-awesome.min.css' rel="stylesheet" type='text/css'>
        <!--cargando hojas de estilos boostrap-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!--cargando hojas de estilos propia-->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/style_juego.css">
    </head>
    <body>
        <?php
        // put your code here
        extract($_REQUEST); //extrayendo los datos de la partida enviados de la vista jugar.php
        ?>

        <script>
            var accion = '<?php echo $accion ?>';//capturando el valor de $accion en javaScript

            switch (accion) {
                case"juegoNuevo":
                    {
                        //codigo en caso de ser un juego nuevo
                        var numeroJugadores =<?php echo $numeroJugadores; ?>;//capturando el valor de $numeroJugadores en javaScript
                        var jugadores = new Array();
                        var colores = new Array();
                        var personajes = new Array();
<?php
//recorrer con php los datos de los personajes para capturarlos con javaScript
for ($i = 1; $i <= $numeroJugadores; $i++) {
    ?>

                            jugadores.push('<?php echo$_POST['player' . $i] ?>');//nombre del player$i
                            colores.push('<?php echo$_POST['color' . $i] ?>');//color del player$i
                            personajes.push(<?php echo$_POST['personaje' . $i] ?>);//personaje elegido por el player$i
    <?php
}
?>








                    }
                    break;
                case"cargarJuego":
                    {
//codigo en caso de cargar un juego existente
                    }
                    break;
                default:
                {

                }
            }




        </script>

        <section id="seccion_juego" name="seccion_juego">

            <div class="container-fluid">

                <div class="row" id="box">
                    <!-- tablero del juego-->
                    <div id="tablero" class="col-md-9">


                        <?php
                        for ($i = 1; $i <= $numeroJugadores; $i++) {
                            //figure de cada personaje
                            ?>
                            <figure id="personaje<?php echo $i; ?>" class="posInicial">

                            </figure>
<?php } ?>

                        <figure id="hotelcarmelita1" class="ocultar">

                            <i class="fa fa-home hotel "></i>  
                        </figure>
                        <figure id="carmelita1">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>




                        </figure>


                        <figure id="hotelcarmelita2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="carmelita2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>




                        </figure>

                        <figure id="hotelazulclaro1" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="azulclaro1" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelazulclaro2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="azulclaro2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelazulclaro3" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="azulclaro3" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>


                        <figure id="hotelmorado1" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="morado1" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelmorado2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="morado2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelmorado3" class="ocultar">

                            <i class="fa fa-home hotel "></i>  
                        </figure>
                        <figure id="morado3" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelnaranja1" class="ocultar">

                            <i class="fa fa-home hotel "></i>  
                        </figure>
                        <figure id="naranja1" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>


                        <figure id="hotelnaranja2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="naranja2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelnaranja3" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="naranja3" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelrojo1" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="rojo1" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelrojo2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="rojo2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelrojo3" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="rojo3" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelamarillo1" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="amarillo1" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelamarillo2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="amarillo2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>


                        <figure id="hotelamarillo3" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="amarillo3" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>


                        <figure id="hotelverde1" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="verde1" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelverde2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="verde2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelverde3" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="verde3" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelazul1" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="azul1" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>

                        <figure id="hotelazul2" class="ocultar">

                            <i class="fa fa-home hotel"></i>  
                        </figure>
                        <figure id="azul2" class="">


                            <i class="fa fa-home casa1 ocultar"></i>
                            <i class="fa fa-home casa2 ocultar"></i>
                            <i class="fa fa-home casa3 ocultar"></i>
                            <i class="fa fa-home casa4 ocultar"></i>
                        </figure>






                    </div>
                    <!-- Informacion del juego-->
                    <div class="col-md-3" id="informacion">
                        <?php
                        for ($i = 1; $i <= $numeroJugadores; $i++) {
                            //Ubica la informacion de cada personaje 
                            ?>
                        <div class="row" class="personaje<?php echo $i ?>">
                                <div class="col-md-1">
                                    <!-- color de cada personaje -->
                                    <i class="fa fa-square" id="colorJugador<?php echo $i ?>"></i>
                                </div>
                                <!-- Nombre de cada personaje-->
                                <div class="col-md-5" id="jugadores">
                                    <label><span></span><?php echo $i; ?>- <span style="font-weight: bold"><?php echo$_POST['player' . $i]; ?></span></label>


                                </div>
                                <!-- Si esta activo o no el personaje-->
                                <div class="col-md-1" id="turnoJugador<?php echo $i; ?>">
                                    <i class="fa fa-circle desactivo" style="color:green;"></i>
                                </div>
                                <!-- Figura del personaje-->
                                <div class="col-md-1" id="Caja_personaje<?php echo $i; ?>">

                                </div>
                                <!-- dinero de cada personaje-->
                                <div class="col-md-3"id="dinero<?php echo $i; ?>">
                                    <i class="fa fa-usd"></i> <span id="dineroValor<?php echo $i; ?>">1500</span>
                                </div>

                            </div>

                            <?php
                        }
                        ?>
                        <!-- Seccion de tirar dados-->
                        <div class="row" id="caja_botonTirar">
                            <!-- valor de los dados -->
                            <div class="col-md-12" style="text-align: center">
                                <p id="valorDados"></p>
                                <p id="info"></p>
                            </div>
                            <!-- boton tirar o terminar turno-->
                            <div class="col-md-12" style="">

                                <li id="botonTirar" class="botonSpecial"style="list-style: none;text-align: center;" onclick="tirarDados()"><a class="btn btn-primary ">Tirar dados</a></li>

                            </div> 
                            <div class="col-md-12">
                                <li  class="liberar" id="tarjeta" style="list-style: none;text-align: center;display: none;" onclick="usarTarjeta()"><a class="btn btn-primary ">Usar tarjeta</a></li> 
                            </div>
                            <div class="col-md-12">
                                <li   class="liberar" id="pagar" style="list-style: none;text-align: center;display: none;" onclick="pagar()"><a class="btn btn-primary ">Pagar</a></li> 
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Barra de opciones de jugador-->
                <nav id="menu_opciones_juego" class="nav navbar-fixed-bottom">

                    <ul id="barra_juego">
                        <li><a class="btn btn-primary " data-toggle="modal" data-target="#propiedades" onclick=" peticionAjaxMostrarPropiedades()">Propiedades</a></li>
                        <li><a class="btn btn-primary " data-toggle="modal" data-target="#negociar" onclick="Negociar('directo')">Negociar</a></li>
                        <li><a class="btn btn-primary " data-toggle="modal" data-target="#tesoros">Guardar Partida</a></li>
                        <li><a data-toggle="modal"class="btn btn-primary" data-target="#compraProp" style="display:none;" id="ventanaComprar">Comprar Propiedad</a></li>
                        <li><a class="btn btn-primary btn-danger " data-toggle="modal" id="bancarrota" data-target="#bancarrota"style="display: none;" onclick="bancarrota()">Bancarrota</a></li>

                    </ul>

                </nav>


            </div>


        </section>





        <!-- Modal carga de pagina propiedades-->

        <div class="modal fade" id="propiedades" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"id="identificadorP"></h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12" id="mostrarPropiedades">

                            </div>




                        </div>

                    </div>

                </div>
            </div>
        </div>




        <!-- Modal carga de pagina negociar-->

        <div class="modal fade" id="negociar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="tituloVentana"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row ">

                            <div class="col-md-12" id="mostrarNegoceo">




                            </div>




                        </div>

                    </div>

                </div>
            </div>
        </div>



        <!-- Modal carga de pagina chances-->

        <div class="modal fade" id="chances" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Chances de </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12" id="mostrarChances">

                            </div>




                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Modal compra de  propiedad-->

        <div class="modal fade" id="compraProp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"id="identificadorProp"></h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12" id="Mostrarpropiedad">

                            </div>




                        </div>

                    </div>

                </div>
            </div>
        </div>



    </body>
    <!--cargando scripts-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/codigo_juego.js"></script>
</html>
