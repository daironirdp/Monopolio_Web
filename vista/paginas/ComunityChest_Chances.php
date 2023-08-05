<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
extract($_REQUEST);
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div style="display: flex;justify-content: space-between">
            <div id="texto">

                <P></P>
            </div>

            <div>
                <figure>
                    <img width="200px"src="../image/Asset 6.png">
                </figure>    
            </div>

        </div>
        <div style="display: flex; justify-content: center;">

            <input type="button" class="btn btn-success close"  data-dismiss="modal" value="Aceptar" id="desencadenante">


        </div>
    </body>
</html>



<script>
    var valor =<?php echo $id ?>;

    function  p_C_Acadajugador(accion, cantidad) {

        for (var i = 0; i < numeroJugadores; i++) {
            if (i != Jugadoractivo - 1) {
                if (accion == 'pague') {
                    dinero[Jugadoractivo - 1] -= cantidad;
                    dinero[i] += cantidad;
                } else {
                    dinero[Jugadoractivo - 1] += cantidad;
                    dinero[i] -= cantidad;
                }

                ActualizarDinero(dinero[i], i + 1);

            }
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        }

    }
    function pagueXreparaciones(precio1, precio2) {
        var houses = 0;
        var hotels = 0;


        for (var i = 0; i < propiedades[Jugadoractivo - 1].length; i++) {
            if (casas[propiedades[Jugadoractivo - 1][i]] != undefined) {
                if (casas[propiedades[Jugadoractivo - 1][i]] != 0) {
                    if (casas[propiedades[Jugadoractivo - 1][i]] < 5) {

                        houses += casas[propiedades[Jugadoractivo - 1][i]];

                    } else {
                        hotels += 1;

                    }

                }
            }
        }
        var precio = houses * precio1 + hotels * precio2;
        dinero[Jugadoractivo - 1] -= precio;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        $("#totalc").append("$" + precio);

    }
    function pague(valor) {
        dinero[Jugadoractivo - 1] -= valor;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
    }
    function cobre(valor) {
        dinero[Jugadoractivo - 1] += valor;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    }







    if (valor == 38) {
        //Luxury Tax 
        $("#identificadorProp").replaceWith("<h4 class='modal-title' id='identificadorProp'>Impuesto</h4>");
        $("#texto p").append("<p>Pague Impuesto de lujuria $75</p>");
        pague(75);
        Toogledeuda();


    } else {


        var opcion = NumAleatorio(1, 16);
        var resultado;

        if (valor == 2 || valor == 17 || valor == 33) {
            //Comuity Chest
            $("#identificadorProp").append("<p style='" + "color:green;font-size:x-large;'" + ">Cofre de la Comunidad</p>");

            switch (opcion) {
                case 1:
                    {
                        $("#texto p").append("Avance hasta el Go y reciba $200");

                        $("#desencadenante").click(function () {


                            posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];

                            resultado = 40 - posActual[Jugadoractivo - 1];
                            posActual[Jugadoractivo - 1] = 40;


                            Ubicar(resultado);
                            Acccion_Modal(resultado, 1, 2);



                        });



                    }
                    break;
                case 2:
                    {
                        $("#texto p").append("Error bancario a  tu favor reciba $200 ");
                        cobre(200);


                    }
                    break;
                case 3:
                    {
                        $("#texto p").append("Pague $50 por servicios medicos");
                        pague(50);
                        Toogledeuda();

                    }
                    break;
                case 4:
                    {
                        $("#texto p").append("Cobre $50 gracias a la venta de acciones ");
                        cobre(50);


                    }
                    break;
                case 5:
                    {
                        $("#texto p").append("Sal de la cárcel gratis acumulable");
                        tarjeta_carcel[Jugadoractivo - 1] += 1;

                    }
                    break;
                case 6:
                    {
                        $("#texto p").append("Vaya directo a la carcel y no cobre en el GO");

                        $("#desencadenante").click(function () {
                            doble = 3;
                            Ubicar(2);

                        });

                    }
                    break;
                case 7:
                    {
                        $("#texto p").append("Gran opera nocturna recoge $50 por cada jugador para abrir asientos nocturnos");
                        p_C_Acadajugador("cobre", 50);





                    }
                    break;
                case 8:
                    {
                        $("#texto p").append("El fondo de vacaciones vence reciba $100");
                        cobre(100);


                    }
                    break;
                case 9:
                    {
                        $("#texto p").append("Devolucion de impuestos reciba $20");
                        cobre(20);


                    }
                    break;
                case 10:
                    {
                        $("#texto p").append("Es tu cumpleannos y cada jugador te regala $10");

                        p_C_Acadajugador("cobre", 10);

                    }
                    break;
                case 11:
                    {
                        $("#texto p").append("Error en seguro de vida cobra $100");
                        cobre(100);


                    }
                    break;
                case 12:
                    {
                        $("#texto p").append("Horarios hospitalarios debe pagar $50");
                        pague(50);
                        Toogledeuda();

                    }
                    break;
                case 13:
                    {
                        $("#texto p").append("Paga $50 por servicios escolares");
                        pague(50);
                        Toogledeuda();

                    }
                    break;
                case 14:
                    {

                        $("#texto p").append("Reciba tarifa de consultoria por sus servicios $25");
                        cobre(25);

                    }
                    break;
                case 15:
                    {
                        $("#texto p").append("Se le evalua por las reparaciones de la calle pague 40 por casa y 115 por hotel de su propiedad");
                        pagueXreparaciones(40, 115);
                        Toogledeuda();
                    }
                    break;
                case 16:
                {

                    $("#texto p").append("Has ganado el segundo premio de un concurso de belleza recoge $10");
                    cobre(10);

                }


            }


        } else if (valor == 7 || valor == 22 || valor == 36) {
            //Chances
            $("#identificadorProp").append("<p style='" + "color:green;font-size:x-large;'" + ">Chances</p>");

            switch (opcion) {
                case 1:
                    {
                        $("#texto").append("Debe avanzar hasta Ilinois Ave y si pasa por el GO cobre $200");

                        $("#desencadenante").click(function () {
                            posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];

                            if (valor != 36) {
                                resultado = 24 - posActual[Jugadoractivo - 1];
                                posActual[Jugadoractivo - 1] = 24;



                            } else {
                                //collect 200 go
                                resultado = 28;
                                posActual[Jugadoractivo - 1] = 64;
                                cobrarGO();


                            }


                            Ubicar(resultado);
                            Acccion_Modal(resultado, 1, 2);


                        });



                    }

                    break;

                case 2:
                    {
                        $("#texto ").append("Avance hasta la utilidad mas cercana.Si no tiene duenno puede comprarlo, sino pague al propiedtario.");



                        $("#desencadenante").click(function () {
                            posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];

                            if (valor == 7) {
                                //utilidad electrica
                                resultado = 12 - posActual[Jugadoractivo - 1];
                                posActual[Jugadoractivo - 1] = 12;

                            } else if (valor == 36) {
                                resultado = 16;
                                posActual[Jugadoractivo - 1] = 52;
                                //collect 200 


                            } else {
                                //valor==22
                                //utilidad acueducto
                                resultado = 28 - posActual[Jugadoractivo - 1];
                                posActual[Jugadoractivo - 1] = 28;
                            }


                            Ubicar(resultado);
                            Acccion_Modal(resultado, 1, 2);
                        });

                    }
                    break;

                case 3:
                    {
                        $("#texto p").append("Avance al ferrocarril mas cercano  y pague al propietario el doble del alquiler  al que tiene derecho.Si no tiene duenno puede comprarlo");

                        $("#desencadenante").click(function () {

                            if (valor == 7) {
                                //utilidad electrica
                                resultado = 15 - posActual[Jugadoractivo - 1];
                                posActual[Jugadoractivo - 1] = 15;

                            } else if (valor == 36) {
                                resultado = 9;
                                posActual[Jugadoractivo - 1] = 45;
                                //collect 200


                            } else {
                                //valor==22
                                //utilidad acueducto
                                resultado = 25 - posActual[Jugadoractivo - 1];
                                posActual[Jugadoractivo - 1] = 25;
                            }


                            Ubicar(resultado);
                            Acccion_Modal(resultado, 1, 2);





                        });

                        posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];


                    }
                    break;


                case 4:
                    {
                        $("#texto p").append("Usted recibe $50 del banco");
                        cobre(50);


                    }
                    break;
                case 5:
                    {
                        $("#texto p").append("Reciba una tarjeta para salir de la carcel sin pagar(conservable)");
                        tarjeta_carcel[Jugadoractivo - 1] += 1;

                    }
                    break;
                case 6:
                    {
                        $("#texto p").append("Retroceda 3 pasos ");

                        $("#desencadenante").click(function () {
                            posActual[Jugadoractivo - 1] -= 3;
                            posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];
                            resultado = 3;

                            if (valor == 7) {
                                MovDerecha(resultado);
                            } else if (valor == 22) {
                                MovIzquierda(resultado - 1);
                                MovAbajo(resultado - 2);
                            } else {
                                MovArriba(resultado);
                            }

                            Acccion_Modal(resultado, 1, 2);
                        });

                    }
                    break;
                case 7:
                    {
                        $("#texto p").append("Ve a la cárcel no pase por el GO");
                        $("#desencadenante").click(function () {
                            doble = 3;
                            Ubicar(2);

                        });



                    }
                    break;
                case 8:
                    {
                        $("#texto p").append("Haga reparaciones generales en toda su propiedad: pague por cada casa $25, por cada hotel $100<br>Para un <span style='color:red'>total</span> de: <span id='totalc'></span>");
                        pagueXreparaciones(25, 100);
                        Toogledeuda();
                    }
                    break;
                case 9:
                    {
                        $("#texto p").append("Pague un impuesto pobre de $15");
                        pague(15);
                        Toogledeuda();



                    }
                    break;
                case 10:
                    {
                        $("#texto p").append("Haga un viaje a Reading Railroad si pasas por el Go recolecte 200");



                        $("#desencadenante").click(function () {

                            posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];

                            if (valor == 7) {

                                resultado = 45 - posActual[Jugadoractivo - 1];
                                posActual[Jugadoractivo - 1] = 45;

                            } else if (valor == 36) {
                                resultado = 9;
                                posActual[Jugadoractivo - 1] = 45;

                            } else {

                                resultado = 45 - posActual[Jugadoractivo - 1];
                                posActual[Jugadoractivo - 1] = 45;
                            }

                            Ubicar(resultado);
                            Acccion_Modal(resultado, 1, 2);

                        });

                    }
                    break;
                case 11:
                    {
                        $("#texto p").append("De un paseo marítimo avance a Boardwalk");

                        $("#desencadenante").click(function () {

                            posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];

                            resultado = 39 - posActual[Jugadoractivo - 1];
                            posActual[Jugadoractivo - 1] = 39;



                            Ubicar(resultado);
                            Acccion_Modal(resultado, 1, 2);
                        });



                    }
                    break;
                case 12:
                    {
                        $("#texto p").append("Ha sido elegido presidente de la junta paga 50 a cada jugador");
                        p_C_Acadajugador('pagar', 50);
                        Toogledeuda();

                    }
                    break;
                case 13:
                    {
                        $("#texto p").append("Su préstamo de construcción vence reciba $150 ");
                        cobre(150);


                    }
                    break;
                case 14:
                    {
                        $("#texto p").append("Has ganado un concurso de crucigramas recoge 100$");
                        cobre(100);

                    }
                    break;
                case 15:
                    {
                        $("#texto p").append("Has heredado $100 de un pariente");
                        cobre(100);

                    }
                    break;
                case 16:
                {
                    $("#texto p").append("No obtuviste ninguna chance");

                }


            }

        }
    }



    /*
     * 
     * 
     * 
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     *
     * 
     *  
     *    
     */


</script>



