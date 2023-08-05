<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MonopolioWeb>>Cargar partida</title>

    </head>

    <?php
    extract($_REQUEST);
    include_once '../../modelo/Conexion.php';
    include_once '../../modelo/Propiedad.php';
    $objeto = new Propiedad();
    $propiedades = $objeto->obtenerPropiedadesDunjugador($id);

    if ($propiedades != false) {
        ?>
        <script>


            var rentaXinmueble = new Array();
            var element;
            var quitar = new Array();
            var contador = 0;
        </script>

        <body>
            <div class="container">

                <div class="row clearfix">

                    <div class="col-md-12 column">

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

                                <?php
                                //Mostar propiedades del jugador
                                for ($i = 0; $i < count($propiedades); $i++) {
                                    ?>
                                    <tr id="fila<?php echo ($i + 1); ?>"class="<?php echo $propiedades[$i]['color']; ?>">
                                        <td colspan="2">
                                            <?php
                                            echo $propiedades[$i]["nombre"];
                                            ?>
                                        </td>
                                        <td id="colorPropiedad<?php echo ($i + 1); ?>">
                                            <?php
                                            //color
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "$ " . $propiedades[$i]["renta"];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "$ " . $propiedades[$i]["hipoteca"];
                                            ?>
                                        </td>

                                <script>

                                    //array de valores por cantidad de inmuebles
                                    rentaXinmueble.push(new Array());


        <?php
        for ($j = 0; $j < 4; $j++) {
            ?>
                                        //llenando el array con las casas  
                                        if (<?php echo $propiedades[$i]['casa' . ($j + 1)]; ?> != 0) {

                                            (rentaXinmueble[<?php echo $i; ?>])[<?php echo $j; ?>] =<?php echo $propiedades[$i]['casa' . ($j + 1)]; ?>;
                                        } else {
                                            quitar.push(<?php echo $i; ?>);
                                        }
            <?php
        }
        ?>//llenando el array con el hotel
                                    if (<?php echo $propiedades[$i]["hotel"]; ?> != 0) {
                                        element =<?php echo $propiedades[$i]["hotel"]; ?>;
                                        rentaXinmueble[<?php echo $i; ?>].push(element);
                                    }



                                    $("#colorPropiedad<?php echo ($i + 1); ?>").append("<i class='fa fa-square'style='color:<?php echo $propiedades[$i]['color']; ?>;font-size: x-large;'></i>");
                                </script>





                                <td colspan="3">

                                    <select id="SeleccionInmueble<?php echo ($i + 1); ?>" class="form-control" onchange="Seleccion('#SeleccionInmueble<?php echo ($i + 1); ?>',<?php echo ($i + 1); ?>)">
                                        <option value="0">--Seleccione--</option>
                                        <option value="1">1 Casa</option>
                                        <option value="2">2 Casa</option>
                                        <option value="3">3 Casa</option>
                                        <option value="4">4 Casa</option>
                                        <option value="5">Hotel</option>

                                    </select>


                                    <!-- coste segun valor seleccionado-->
                                    <span id="coste<?php echo ($i + 1); ?>">
                                        Coste: $ 0
                                    </span>            

                                </td>

                                <td>
                                    <?php
                                    //precio de la propiedad
                                    echo "$ " . $propiedades[$i]['precio'];
                                    ?>
                                </td>

                                <!-- Acciones permitidas-->
                                <td colspan="2">
                                    <a href='#'class='btn btn-sm btn-success botonAccion ocultar'onclick="ComprarInmueble('<?php echo $propiedades[$i]["color"] ?>', '<?php echo ($i + 1) ?>',<?php echo $propiedades[$i]["costeInmueble"] ?>)" id="comprarCasa" >Comprar Casa</a>
                                    <a href='#'class='btn btn-sm btn-success botonAccion ocultar'onclick="Deshipotecar('fila<?php echo ($i + 1) ?>',<?php echo $propiedades[$i]["hipoteca"] ?>,<?php echo $propiedades[$i]["id"] ?>,'<?php echo $propiedades[$i]["color"] ?>')" id="deshipotecar">Deshipotecar</a>
                                    <a href='#'class='btn btn-sm btn-danger botonAccion' onclick="Hipotecar('fila<?php echo ($i + 1) ?>',<?php echo $propiedades[$i]["hipoteca"] ?>,<?php echo $propiedades[$i]["id"] ?>,'<?php echo $propiedades[$i]["color"] ?>')"id="hipotecar">Hipotecar</a>  
                                    <a href='#'class='btn btn-sm btn-danger botonAccion ocultar' onclick="VenderInmueble('<?php echo $propiedades[$i]["color"] ?>', '<?php echo ($i + 1) ?>',<?php echo $propiedades[$i]["costeInmueble"] ?>)"id="venderInmueble">Vender Inmueble</a>  
                                </td>

                                </tr>

                                <script>
                                    if (<?php echo $propiedades[$i]["hipotecada"]; ?> == 1) {

                                        $("#fila<?php echo ($i + 1); ?>").css("background", "#ab2e2ead");
                                        $("#fila<?php echo ($i + 1); ?>    #hipotecar").addClass("ocultar");
                                        $("#fila<?php echo ($i + 1); ?>  #deshipotecar").removeClass("ocultar");
                                    } else {
                                        var color = '<?php echo $propiedades[$i]['color'] ?>';

                                        switch (color) {
                                            case "brown":
                                                {
                                                    if ((propiedadesXcolor[Jugadoractivo - 1])[0] == 2) {
                                                        $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");
                                                        //botom vender mostrar 
                                                        console.log("1");
                                                        if (casas[1] != undefined && casas[3] != undefined && casas[1] != 0 && casas[3] != 0) {
                                                             
                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                         
                                                            $("#fila<?php echo ($i + 1); ?> #hipotecar").addClass("ocultar");
                                                            if (casas[1] == 5 && casas[3] == 5) {
                                                                $("#fila<?php echo ($i + 1); ?> #comprarCasa").addClass("ocultar");
                                                               
                                                            } else {

                                                                if (casas[1] == 5 && contador == 0) {
                                                                    $("#fila<?php echo ($i + 1); ?> #comprarCasa").addClass("ocultar");
                                                                    
                                                                    contador++;
                                                                } else {
                                                                    contador = 0;
                                                                }
                                                            }

                                                        } else {
                                                            
                                                            if (casas[1] != undefined && contador == 0 && casas[1] !=0) {
                                                              $("#fila<?php echo ($i + 1); ?> #hipotecar").addClass("ocultar");
                                                                $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                                contador++;

                                                            } else { 
                                                                contador = 0;
                                                               
                                                                if(casas[3]!=undefined && casas[3] !=0){
                                                              
                                                              $("#fila<?php echo ($i + 1); ?> #hipotecar").addClass("ocultar"); 
                                                              $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");      
                                                                }
                                                                
                                                                
                                                                
                                                            }
                                                        }

                                                    }


                                                }
                                                break;
                                            case "azure":
                                                {
                                                    if ((propiedadesXcolor[Jugadoractivo - 1])[1] == 3) {
                                                        $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");

                                                        if (casas[6] != undefined && casas[8] != undefined && casas[9] != undefined) {
                                                            contador = 0;
                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");

                                                        } else {

                                                            if (casas[6] != undefined && casas[8] != undefined && contador == 1) {

                                                                $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                                contador++;
                                                            } else {
                                                                if (casas[6] != undefined && contador == 0) {

                                                                    $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar")
                                                                    contador++;
                                                                }

                                                            }
                                                        }

                                                    }
                                                }
                                                break;
                                            case "purple":
                                                {
                                                    if ((propiedadesXcolor[Jugadoractivo - 1])[2] == 3) {

                                                        $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");

                                                        if (casas[11] != undefined && casas[13] != undefined && casas[14] != undefined) {
                                                            contador = 0;
                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");

                                                        } else {

                                                            if (casas[11] != undefined && casas[13] != undefined && contador == 1) {

                                                                $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                                contador++;
                                                            } else {
                                                                if (casas[11] != undefined && contador == 0) {

                                                                    $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar")
                                                                    contador++;
                                                                }

                                                            }
                                                        }

                                                    }
                                                }
                                                break;
                                            case "orange":
                                                {
                                                    if ((propiedadesXcolor[Jugadoractivo - 1])[3] == 3) {
                                                        $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");

                                                        if (casas[16] != undefined && casas[18] != undefined && casas[19] != undefined) {
                                                            contador = 0;
                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");

                                                        } else {

                                                            if (casas[16] != undefined && casas[18] != undefined && contador == 1) {

                                                                $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                                contador++;
                                                            } else {
                                                                if (casas[16] != undefined && contador == 0) {

                                                                    $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar")
                                                                    contador++;
                                                                }

                                                            }
                                                        }
                                                    }
                                                }
                                                break;
                                            case "red":
                                                {
                                                    if ((propiedadesXcolor[Jugadoractivo - 1])[4] == 3) {
                                                        $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");

                                                        if (casas[21] != undefined && casas[23] != undefined && casas[24] != undefined) {
                                                            contador = 0;
                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");

                                                        } else {

                                                            if (casas[21] != undefined && casas[23] != undefined && contador == 1) {

                                                                $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                                contador++;
                                                            } else {
                                                                if (casas[21] != undefined && contador == 0) {

                                                                    $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar")
                                                                    contador++;
                                                                }

                                                            }
                                                        }

                                                    }

                                                }
                                                break;
                                            case "yellow":
                                                {
                                                    if ((propiedadesXcolor[Jugadoractivo - 1])[5] == 3) {
                                                        $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");

                                                        if (casas[26] != undefined && casas[27] != undefined && casas[29] != undefined) {
                                                            contador = 0;
                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");

                                                        } else {

                                                            if (casas[26] != undefined && casas[27] != undefined && contador == 1) {

                                                                $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                                contador++;
                                                            } else {
                                                                if (casas[26] != undefined && contador == 0) {

                                                                    $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar")
                                                                    contador++;
                                                                }

                                                            }
                                                        }

                                                    }

                                                }
                                                break;
                                            case "green":
                                                {
                                                    if ((propiedadesXcolor[Jugadoractivo - 1])[6] == 3) {
                                                        $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");

                                                        if (casas[31] != undefined && casas[32] != undefined && casas[34] != undefined) {
                                                            contador = 0;
                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");

                                                        } else {

                                                            if (casas[31] != undefined && casas[32] != undefined && contador == 1) {

                                                                $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                                contador++;
                                                            } else {
                                                                if (casas[31] != undefined && contador == 0) {

                                                                    $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar")
                                                                    contador++;
                                                                }

                                                            }
                                                        }

                                                    }

                                                }
                                                break;
                                            case "blue":
                                            {
                                                if ((propiedadesXcolor[Jugadoractivo - 1])[7] == 2) {
                                                    $("#fila<?php echo ($i + 1); ?> #comprarCasa").removeClass("ocultar");

                                                    if (casas[37] != undefined && casas[39] != undefined) {

                                                        $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");

                                                    } else {

                                                        if (casas[37] != undefined && contador == 0) {

                                                            $("#fila<?php echo ($i + 1); ?> #venderInmueble").removeClass("ocultar");
                                                            contador++;
                                                        } else {
                                                            contador = 0;
                                                        }
                                                    }

                                                }

                                            }

                                        }


                                    }



                                </script>


                                <?php
                            }
                            ?> 
                            <script>
                                for (var i = 0; i < quitar.length; i++) {
                                    $("#SeleccionInmueble" + (quitar[i] + 1)).css("visibility", "hidden");
                                    $("#coste" + (quitar[i] + 1)).css("visibility", "hidden");
                                }

                            </script>



                            </tbody>
                        </table>
                        <script>
                            //Funcion que modifica el valor del coste segun la opcion que se seleccione



                            function Seleccion(id, nuId) {


                                switch ($(id).val()) {
                                    case "0":
                                        {
                                            $("#coste" + nuId).replaceWith("<span id='coste" + nuId + "'> $ 0 </span>");
                                        }
                                        break;


                                    case "1":
                                        {


                                            $("#coste" + nuId).replaceWith("<span id='coste" + nuId + "'>Coste: " + (rentaXinmueble[nuId - 1])[0] + "</span>");
                                        }
                                        break;
                                    case "2":
                                        {
                                            $("#coste" + nuId).replaceWith("<span id='coste" + nuId + "'>Coste: " + rentaXinmueble[nuId - 1][1] + "</span>");
                                        }
                                        break;
                                    case "3":
                                        {
                                            $("#coste" + nuId).replaceWith("<span id='coste" + nuId + "'>Coste: " + rentaXinmueble[nuId - 1][2] + "</span>");
                                        }
                                        break;
                                    case "4":
                                        {
                                            $("#coste" + nuId).replaceWith("<span id='coste" + nuId + "'>Coste: " + rentaXinmueble[nuId - 1][3] + "</span>")
                                        }
                                        break;
                                    case "5":
                                    {
                                        $("#coste" + nuId).replaceWith("<span id='coste" + nuId + "'>Coste: " + rentaXinmueble[nuId - 1][4] + "</span>")
                                    }




                                }
                            }







                        </script>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>

            <h3 style="color: red;text-align: center">Usted no posee propiedades</h3>  
            <?php
        }
        ?>
    </body>
</html>

