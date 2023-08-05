<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Monopolio_Web</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--cargando iconos de font awesome-->
        <link href='vista/css/font-awesome.min.css' rel="stylesheet" type='text/css'>
        <!--cargando hojas de estilos boostrap-->
        <link rel="stylesheet" href="vista/css/bootstrap.min.css">
        <!--cargando hojas de estilos propia-->
        <link rel="stylesheet" href="vista/css/style.css">
        <style></style> 
    </head>
    

    <body id="body_menu">


        <section class="container" id="seccion_m" style="height: 40rem">


            <div class="container" id="menu" style="width: 50%">

                <nav>
                    <ul id="encabezado">
                        <li><h1 class="display-4">Menu</h1></li>
                    </ul>
                    <ul>
                        <li class="p-y-1"><a href="#" class="btn btn-primary " data-toggle="modal" data-target="#partidaNueva">Partida nueva</a></li>
                        <li class="p-y-1"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#cargarPartida">Cargar partida</a></li>
                        <li class="p-y-1"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#opciones">Opciones</a></li>
                        <li class="p-y-1"><a href="javascript:close_window();" class="btn btn-primary"  id="salir">Salir</a></li>

                    </ul>    

                </nav>


            </div>



        </section>







    </body>

    
   
    <!-- Modal carga de pagina nueva partida-->
 
    <div class="modal fade" id="partidaNueva" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Creacion del juego</h4>
                </div>
                <div class="modal-body">
                    
                    <div class="row">

                        <div class="col-md-12" id="crearjuego_div">
                            
                        </div>

                       


                    </div>

                </div>

            </div>
        </div>
    </div>
    
    
      <!--cargando scripts-->
    <script src="vista/js/jquery.min.js"></script>
    <script src="vista/js/bootstrap.min.js"></script>
    
     <!-- Modal carga de pagina cargar partida-->
 
    <div class="modal fade" id="cargarPartida" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Gargar una partida</h4>
                </div>
                <div class="modal-body">
                    <div class="row ">

                        <div class="col-md-12" id="cargar_div">
                           
                            
                        </div>

                       


                    </div>

                </div>

            </div>
        </div>
    </div>
     
     
     
      <!-- Modal carga de pagina opciones-->
 
    <div class="modal fade" id="opciones" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Desarrollo de Aplicaciones Mobiles</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12" id="opciones_div">
                           
                        </div>

                        


                    </div>

                </div>

            </div>
        </div>
    </div>
      
    <!--cargando scripts-->
    
    <script src="vista/js/codigo_menu.js"></script>
   
    
</html>

