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
    <?php
    // put your code here
    //extrayendo informacion del $_GET[]
    extract($_REQUEST);
    //incluyendo Conexion y Propiedad
    include_once '../../modelo/Conexion.php';
    include_once '../../modelo/Propiedad.php';
    //Creando objeto de propiedad
    $objeto = new Propiedad();
//Obteniendo propiedad dado su ID en un resulset o matriz asociativa
    $propiedad = $objeto->obtenerPropiedadDadoID($id);
    ?>


    <body>
        <div class="container">

            <div class="row clearfix">

                <div class="col-md-12 column" id="">

                    <table class="table table-hover table-condensed" id="Tpropiedades">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Nombre
                                </th>
                                <th>
                                    Color
                                </th>
                                <th>
                                    Renta
                                </th>
                                <th>
                                    Hipoteca
                                </th>
                                <th colspan="3">
                                    Renta por inmuebles
                                </th>
                                <th>
                                    Precio
                                </th>
                                <th colspan="2">
                                    Acciones
                                </th>

                            </tr>
                        </thead>       


                        <tbody>
                            <!--Incluir código necesario-->
                            <tr>
                                <td colspan="2">
                                    <?php
                                    //Nombre de la propiedad
                                    echo $propiedad[0]['nombre'];
                                    ?>
                                </td>
                                <td id="colorPropiedad">
                                    <?php
                                    //color
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    //Valor de la renta
                                    echo "$" . $propiedad[0]['renta'];
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    //Valor de hipoteca
                                    echo "$" . $propiedad[0]['hipoteca'];
                                    ?>
                                </td>
                                <!-- Valor de renta por cantidad de inmueble seleccionado-->
                                <td colspan="3">

                                    <select id="SeleccionInmueble" class="form-control">
                                        <option value="0">--Seleccione--</option>
                                        <option value="1">1 Casa</option>
                                        <option value="2">2 Casa</option>
                                        <option value="3">3 Casa</option>
                                        <option value="4">4 Casa</option>
                                        <option value="5">Hotel</option>

                                    </select>

                                    <script>
                                        //array de valores por cantidad de inmuebles

                                        var precio =<?php echo $propiedad[0]['precio']; ?>;

                                        var rentaXinmueble = new Array();
<?php
for ($i = 0; $i < 4; $i++) {
    ?>
                                            //llenando el array con las casas
                                            rentaXinmueble.push(<?php echo $propiedad[0]['casa' . ($i + 1)]; ?>);

    <?php
}
?>//llenando el array con el hotel
                                        rentaXinmueble.push(<?php echo $propiedad[0]["hotel"]; ?>);


                                        $("#colorPropiedad").append("<i class='fa fa-square'style='color:<?php echo $propiedad[0]['color']; ?>;font-size: x-large;'></i>");
                                    </script>
                                    <!-- coste segun valor seleccionado-->
                                    <span id="coste">
                                        Coste: $0
                                    </span>            

                                </td>
                                <td>
                                    <?php
//precio de la propiedad
                                    echo "$" . $propiedad[0]['precio'];
                                    ?>
                                </td>
                                <!-- Acciones permitidas-->
                                <td colspan="2">
                                    <a href='#'class='btn btn-sm btn-success botonAccion'id="botonComprar"onclick="ComprarPropiedad(precio, '<?php echo $propiedad[0]['color']; ?>', Jugadoractivo)" id="">Comprar</a>
                                    <a href='#'class='btn btn-sm btn-success botonAccion'onclick="Negociar('indirecto')">Negociar</a>
                                    <a href='#'class='btn btn-sm btn-danger botonAccion' onclick="Subastar()">Subastar</a>  

                                </td>

                            </tr>
                        <script>
                            var color='<?php echo $propiedad[0]['color']; ?>';
                            //si no tiene el dinero suficiente no se puede comprar
                             ToogleCompra(precio);

                            //Funcion que modifica el valor del coste segun la opcion que se seleccione
                            $("#SeleccionInmueble").change(function () {

                                switch ($("#SeleccionInmueble").val()) {
                                    case "0":
                                        {
                                            $("#coste").replaceWith("<span id='coste'> $0 </span>");
                                        }
                                        break;


                                    case "1":
                                        {
                                            $("#coste").replaceWith("<span id='coste'>Coste: " + rentaXinmueble[0] + "</span>");
                                        }
                                        break;
                                    case "2":
                                        {
                                            $("#coste").replaceWith("<span id='coste'>Coste: " + rentaXinmueble[1] + "</span>");
                                        }
                                        break;
                                    case "3":
                                        {
                                            $("#coste").replaceWith("<span id='coste'>Coste: " + rentaXinmueble[2] + "</span>");
                                        }
                                        break;
                                    case "4":
                                        {
                                            $("#coste").replaceWith("<span id='coste'>Coste: " + rentaXinmueble[3] + "</span>")
                                        }
                                        break;
                                    case "5":
                                    {
                                        $("#coste").replaceWith("<span id='coste'>Coste: " + rentaXinmueble[4] + "</span>")
                                    }




                                }


                            });



                        </script>

                        </tbody>
                    </table>

                    <div style="display: none;text-align: center" id="compraExitosa">
                        <h2 style="color: green">Compra exitosa!!!</h2> <p id="pprecio">Se le restaran  $ <?php echo $propiedad[0]['precio'] ?> de su dinero</p>

                    </div>


                    <!-- tabla de subasta-->
                    <table class="subasta table table-hover table-condensed" id="tabla_subasta">
                        <thead>
                            <tr>
                                <th>
                                    Jugador
                                </th>
                                <th>
                                    Oferta
                                </th>
                                <th>
                                    Acciones
                                </th>


                            </tr>
                        </thead>   
                        <tbody>



                        </tbody>

                    </table> 

                    <!-- tabla posibles negociantes-->
                    <div id="tabla_posibles_negociantes">


                    </div>


                    <div id="ventana_Negociar" class="ventana_negociar">


                    </div>



                    <div class="negociar" style="display: flex;justify-content: space-between;">

                        <input type="button" class="negociar btn btn-sm btn-success botonAccion" onclick="Atras()"value="atras">
                        <input type="button" class="negociar btn btn-sm btn-success botonAccion" onclick="Confirmar('indirecto')" value="Confirmar">
                    </div>



                </div>
            </div>
        </div>
        <?php
// put your code here
        ?>




    </body>
</html>

