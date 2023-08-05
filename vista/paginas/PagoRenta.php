<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
$numeroTrenes = $objeto->verificarCantTrenes($jugador);
?>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>




    </body>
</html>
<script>


    var valor = <?php echo $propiedad[0]["player"]; ?> - 1;
    //valor recoge el jugador que es duenno de la propiedad

    var jugador = jugadores[valor];//toma el nombre de dicho jugador
    var valorRenta = [
<?php echo $propiedad[0]["renta"]; ?>,
<?php echo $propiedad[0]["casa1"]; ?>,
<?php echo $propiedad[0]["casa2"]; ?>,
<?php echo $propiedad[0]["casa3"]; ?>,
<?php echo $propiedad[0]["casa4"]; ?>,
<?php echo $propiedad[0]["hotel"]; ?>
    ];//recoge en un array los valores de las rentas de la propiedad


    $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' ><span style='" + Color(Jugadoractivo - 1) + "'>" + jugadores[Jugadoractivo - 1] + "</span> debe pagar<span id='rentapagar'></span> a <span id='jugadorduenno'style='" + Color(valor) + "'>" + jugador + "</span></h4>");
    //mostrar el texto 

    if (casas[posActual[Jugadoractivo - 1]] == 0 || casas[posActual[Jugadoractivo - 1]] == undefined) {
        //si no hay casas en la propiedad


        if (posActual[Jugadoractivo - 1] == 5 || posActual[Jugadoractivo - 1] == 15 || posActual[Jugadoractivo - 1] == 25 || posActual[Jugadoractivo - 1] == 35) {
            if (<?php echo $numeroTrenes[0]['numero']; ?> == 1) {
                $("#rentapagar").append("  $" + 25);
                dinero[Jugadoractivo - 1] -= 25;
                dinero[valor] += 25;

            } else if (<?php echo $numeroTrenes[0]['numero']; ?> == 2) {
                $("#rentapagar").append("  $" + 50);
                dinero[Jugadoractivo - 1] -= 50;
                dinero[valor] += 50;

            } else if (<?php echo $numeroTrenes[0]['numero']; ?> == 3) {
                $("#rentapagar").append("  $" + 100);
                dinero[Jugadoractivo - 1] -= 100;
                dinero[valor] += 100;
            } else if (<?php echo $numeroTrenes[0]['numero']; ?> == 4) {
                $("#rentapagar").append("  $" + 200);
                dinero[Jugadoractivo - 1] -= 200;
                dinero[valor] += 200;
            }


        } else {
            $("#rentapagar").append("  $" + valorRenta[0]);
            dinero[Jugadoractivo - 1] -= valorRenta[0];
            dinero[valor] += valorRenta[0];

        }

        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        $("#dineroValor" + (valor + 1)).replaceWith("<span id='dineroValor" + (valor + 1) + "'>" + dinero[valor] + "<span>");
        Toogledeuda();
    } else if (casas[posActual[Jugadoractivo - 1]] == 1) {
        //si hay 1 casa en la propiedad
        $("#rentapagar").append("  $" + valorRenta[1]);
        dinero[Jugadoractivo - 1] -= valorRenta[1];
        dinero[valor] += valorRenta[1];
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        $("#dineroValor" + (valor + 1)).replaceWith("<span id='dineroValor" + (valor + 1) + "'>" + dinero[valor] + "<span>");
         Toogledeuda();
    } else if (casas[posActual[Jugadoractivo - 1]] == 2) {
        //si hay 2 casa en la propiedad
        $("#rentapagar").append("  $" + valorRenta[2]);
        dinero[Jugadoractivo - 1] -= valorRenta[2];
        dinero[valor] += valorRenta[2];
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        $("#dineroValor" + (valor + 1)).replaceWith("<span id='dineroValor" + (valor + 1) + "'>" + dinero[valor] + "<span>");
        Toogledeuda();
    } else if (casas[posActual[Jugadoractivo - 1]] == 3) {
        //si hay 3 casa en la propiedad
        $("#rentapagar").append("  $" + valorRenta[3]);
        dinero[Jugadoractivo - 1] -= valorRenta[3];
        dinero[valor] += valorRenta[3];
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        $("#dineroValor" + (valor + 1)).replaceWith("<span id='dineroValor" + (valor + 1) + "'>" + dinero[valor] + "<span>");
        Toogledeuda();
    } else if (casas[posActual[Jugadoractivo - 1]] == 4) {
        //si hay 4 casa en la propiedad
        $("#rentapagar").append("  $" + valorRenta[4]);
        dinero[Jugadoractivo - 1] -= valorRenta[4];
        dinero[valor] += valorRenta[4];
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        $("#dineroValor" + (valor + 1)).replaceWith("<span id='dineroValor" + (valor + 1) + "'>" + dinero[valor] + "<span>");
        Toogledeuda()
    } else if (casas[posActual[Jugadoractivo - 1]] == 5) {
        //si hay 5 casa en la propiedad

        $("#rentapagar").append("  $" + valorRenta[5]);
        dinero[Jugadoractivo - 1] -= valorRenta[5];
        dinero[valor] += valorRenta[5];
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        $("#dineroValor" + (valor + 1)).replaceWith("<span id='dineroValor" + (valor + 1) + "'>" + dinero[valor] + "<span>");
        Toogledeuda();


    }



</script>
