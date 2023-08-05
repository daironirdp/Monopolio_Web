/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//inicializando variables del juego
var dinero = new Array();
var tarjeta_carcel = new Array();
var posActual = new Array();
var posAnterior = new Array();
var propiedades = new Array();
var casas = new Array();
var carcel = new Array();
var Jugadoractivo = 1;
var propiedadesXcolor = new Array();
var doble = 0;
var contador2 = 0;
var personas_subasta = numeroJugadores - 1;
var jugador_negocio = -1;
var jugadores_arruinados = new Array();
var auxx = new Array();
/* auxx.push(2);
 auxx.push(2);
 auxx.push(2);
 auxx.push(2);
 auxx.push(2);
 auxx.push(2);
 auxx.push(1);
 auxx.push(2);
 var y = 0;*/
for (var i = 0; i < numeroJugadores; i++) {
    //Matriz de dinero de jugadores
    dinero.push(1500);
    //Matriz de posicion Actual de jugadores
    posActual.push(0);
    //matriz bidimensional de propiedades por jugador
    propiedades.push(new Array());
    //Establecimiento de colores
    $("#colorJugador" + (i + 1)).attr("style", Color(i));
    //Matriz que guarda la posicion anterior del jugador
    posAnterior.push(-1);
    //Matriz que indica cuanto tiempo ha estado en la carcel
    carcel.push(0);
    //Matriz que indica el numero de tarjetas para salir de la carcel
    tarjeta_carcel.push(0);
    //propiedades jugador por color index 0 jugador1 y inex 0 carmelia
    propiedadesXcolor.push(new Array());
}

for (var j = 0; j < numeroJugadores; j++) {


    for (i = 0; i < 8; i++) {
        (propiedadesXcolor[j]).push(0);//este array indica la cantidad de propiedades por color de cada jugador
    }

}

IndicadorTurnos();//Funcion permite indicar al usuario el jugador que le toca jugar

//Funcion que se ejecuta al cargar la pagina y establece:
//*figura por personaje en informacion
//*figura por personaje en el tablero
//*asocia a cada figura el color correspondiente
//Reinicia los valores de la base de datos que son usados en el juego a su estado inicial
window.addEventListener("load", function (event) {

    $.ajax({
        type: "POST",
        url: "../../controlador/cc_partidas.php?id=0&accion=Reiniciar",
        success: function (response) {

        }

    });


    for (var i = 1; i <= numeroJugadores; i++) {
        if (personajes[i - 1] == 1) {
            $("#personaje" + i).append("<i class='fa fa-ambulance'id='p" + i + "'</i>");
            $("#Caja_personaje" + i).append("<i class='fa fa-ambulance'</i>");
            $("#personaje" + i + "  i").css('background', '' + Color(i - 1).substring(6, 12) + '');
        } else if (personajes[i - 1] == 2) {
            $("#personaje" + i).append("<i class='fa fa-fighter-jet'id='p" + i + "'</i>");
            $("#Caja_personaje" + i).append("<i class='fa fa-fighter-jet'</i>");
            $("#personaje" + i + "  i").css('background', '' + Color(i - 1).substring(6, 12) + '');
        } else if (personajes[i - 1] == 3) {
            $("#personaje" + i).append("<i class='fa fa-bicycle'id='p" + i + "'</i>");
            $("#Caja_personaje" + i).append("<i class='fa fa-bicycle'</i>");
            $("#personaje" + i + "  i").css('background', '' + Color(i - 1).substring(6, 12) + '');
        } else if (personajes[i - 1] == 4) {
            $("#personaje" + i).append("<i class='fa fa-car'id='p" + i + "'</i>");
            $("#Caja_personaje" + i).append("<i class='fa fa-car'</i>");
            $("#personaje" + i + "  i").css('background', '' + Color(i - 1).substring(6, 12) + '');
        } else if (personajes[i - 1] == 5) {
            $("#personaje" + i).append("<i class='fa fa-motorcycle'id='p" + i + "'</i>");
            $("#Caja_personaje" + i).append("<i class='fa fa-motorcycle'</i>");
            $("#personaje" + i + "  i").css('background', '' + Color(i - 1).substring(6, 12) + '');
        } else if (personajes[i - 1] == 6) {
            $("#personaje" + i).append("<i class='fa fa-futbol-o'id='p" + i + "'</i>");
            $("#Caja_personaje" + i).append("<i class='fa fa-futbol-o'</i>");
            $("#personaje" + i + "  i").css('background', '' + Color(i - 1).substring(6, 12) + '');
        }
    }


});




function Color(jugador) //Funcion para elegir el color de cada jugador.Se le pasa por parametro el jugador
{

    switch (colores[jugador]) {
        case "1":
            {
                return "color:blue";
            }
            break;
        case "2":
            {
                return "color:red";
            }
            break;
        case "3":
            {
                return "color:green";
            }
            break;
        case "4":
            {
                return "color:purple";
            }
            break;
        case "5":
            {
                return "color:brown"
            }
            break;
        case "6":
        {
            return "color:yellow";
        }

    }
}
function tirarDados() //Funcion para tirar los dados
{
    //actualiza posicion anterior del jugador
    posAnterior[Jugadoractivo - 1] = posActual[Jugadoractivo - 1];

    var superior = 5;//limite superior
    var inferior = 1;//limite inferior
    var resultado1 = NumAleatorio(inferior, superior);//*/0//numero aleatorio1
    var resultado2 = NumAleatorio(inferior, superior);//*/1//numero aleatorio2
    var cadena = "<p id='info'style='color:green;font-size:35px'></p>";//variable que guarda o no el doble
    var resultado = resultado1 + resultado2;
    var bandera_doble = false;
    //y++;
    posActual[ Jugadoractivo - 1] += resultado;//posicion el la que se encuentra el jugador luego de tirar los dados

    if (EsDoble(resultado1, resultado2)) {
        //Hay un doble
        bandera_doble = true;
        cadena = " <p style='color:green;font-size:35px' id='info'>(Doble!!!)</p>";
        if (carcel[Jugadoractivo - 1] == 1) {
            //si estas en la carcel
            cadena = "<p id='info'style='color:green;font-size:35px'>(Doble!!!) Estas en libertad!!!</p>";
            $(".liberar").hide();

        }
        doble++;
        carcel[Jugadoractivo - 1] = 0;
        if (doble == 3) {
            //si sacastes 3 dobles seguidos
            cadena = "  <p style='color:red;font-size:35px'id='info'> A la carcel!!!</p>";
            $("#pagar").show();
            if (tarjeta_carcel[Jugadoractivo - 1] != 0) {
                $("#tarjeta").show();
            }
            $("#botonTirar").show();
            $("#botonTirar").replaceWith("<li id='terminarTurno' class='botonSpecial' style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");

        }

        Ubicar(resultado, bandera_doble);//Ubicar permite reflejar la posicion del personaje dentro del tablero
        //Funcion que se va a ejecutar luego de 1s por cada valor del dado y permite:
//Mostrar el modal correcto en dependencia de la posicion en la que caiga el jugador
        Acccion_Modal(resultado, bandera_doble);//
        $("#botonTirar").css("display", "none");
    } else {
        if (carcel[Jugadoractivo - 1] < 4 && carcel[Jugadoractivo - 1] > 0) {
            doble = 3;
            cadena = "  <p style='color:red;font-size:35px'id='info'>En la carcel!!!</p>";
            $("#botonTirar").replaceWith("<li id='terminarTurno' class='botonSpecial' style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");
            carcel[Jugadoractivo - 1]++;

            posActual[Jugadoractivo - 1] = 10;
            posAnterior[Jugadoractivo - 1] = 10;

            $("#pagar").show();
            if (tarjeta_carcel[Jugadoractivo - 1] != 0) {
                $("#tarjeta").show();
            }

        } else {
            if (carcel[Jugadoractivo - 1] == 4) {
                cadena = "  <p style='color:green;font-size:35px'id='info'>En libertad!!!</p>";
            }
            doble = 0;
            carcel[Jugadoractivo - 1] = 0;
            Ubicar(resultado, bandera_doble);//Ubicar permite reflejar la posicion del personaje dentro del tablero

            //Funcion que se va a ejecutar luego de 1s por cada valor del dado y permite:
//Mostrar el modal correcto en dependencia de la posicion en la que caiga el jugador
            Acccion_Modal(resultado, bandera_doble);
        }


        $("#botonTirar").css("display", "none");

    }
    $("#valorDados").replaceWith("<p id='valorDados'style='font-size:45px'>" + resultado + "</p>");
    $("#info").replaceWith(cadena);






}

function terminarTurno() //Funcion para pasar de turno al siguiente jugador
{
    let i = 0;
    let cont = 0;

    doble = 0;
    $("#terminarTurno").replaceWith("<li id='botonTirar' class='botonSpecial' style='list-style: none;text-align: center;'onclick='tirarDados()'><a class='btn btn-primary'>Tirar dados</a></li>");
    Jugadoractivo = Jugadoractivo + 1;

    while (i < jugadores_arruinados.length) {
        if (jugadores_arruinados[i] == Jugadoractivo) {
            cont += 1;
            Jugadoractivo += 1;
        }

    }
    if (Jugadoractivo > numeroJugadores) {
        Jugadoractivo = 1 + cont;
    }
    $("#valorDados").replaceWith("<p id='valorDados'style='font-size:45px'></p>");
    $("#info").replaceWith("<p id='info'style='font-size:35px'></p>");

    if (carcel[Jugadoractivo - 1] == 0) {
        $(".liberar").hide();
    } else {
        if (tarjeta_carcel[Jugadoractivo - 1] != 0) {
            $("#tarjeta").show();
        }
        $("#pagar").show();

    }
    IndicadorTurnos();

}

function IndicadorTurnos()//Muestra de forma dinamica el turno del jugador
{
//ensenna y oculta el cuadrado de color verde segun el jugador activo
    if (Jugadoractivo == 1) {
        $(".activo").hide();
        $(".activo").removeClass("activo");
        $("#turnoJugador1 i").removeClass("desactivo");
        $("#turnoJugador1 i").addClass("activo");
        $("#turnoJugador1 i").show();

    } else if (Jugadoractivo == 2) {
        $(".activo").hide();
        $(".activo").removeClass("activo");
        $("#turnoJugador2 i").removeClass("desactivo");
        $("#turnoJugador2 i").addClass("activo");
        $("#turnoJugador2 i").show();

    } else if (Jugadoractivo == 3) {
        $(".activo").hide();
        $(".activo").removeClass("activo");
        $("#turnoJugador3 i").removeClass("desactivo");
        $("#turnoJugador3 i").addClass("activo");
        $("#turnoJugador3 i").show();

    } else if (Jugadoractivo == 4) {
        $(".activo").hide();
        $(".activo").removeClass("activo");
        $("#turnoJugador4 i").removeClass("desactivo");
        $("#turnoJugador4 i").addClass("activo");
        $("#turnoJugador4 i").show();

    } else if (Jugadoractivo == 5) {
        $(".activo").hide();
        $(".activo").removeClass("activo");
        $("#turnoJugador5 i").removeClass("desactivo");
        $("#turnoJugador5 i").addClass("activo");
        $("#turnoJugador5 i").show();

    } else if (Jugadoractivo == 6) {
        $(".activo").hide();
        $(".activo").removeClass("activo");
        $("#turnoJugador6 i").removeClass("desactivo");
        $("#turnoJugador6 i").addClass("activo");
        $("#turnoJugador6 i").show();

    }

}
function Ubicar(resultado, bandera_doble) {
//elige movimiento segun la posicion en el tablero

    if (doble != 3) {
        if (posActual[Jugadoractivo - 1] < 10)//Movimiento a la izquierda etapa inicial
        {
            MovIzquierda(resultado);
        } else if (posActual[Jugadoractivo - 1] >= 10 && posActual[Jugadoractivo - 1] < 20)//movimiento hacia arriba etapa 2
        {

            if (posActual[Jugadoractivo - 1] == 10) //si se queda en la pos 10
            {

                var movIz = 10 - posAnterior[Jugadoractivo - 1];

                MovIzquierda(movIz);//ojo aki

            } else//si se pasa de la posicion 10
            {
                var movIz = 10 - posAnterior[Jugadoractivo - 1];
                if (movIz < 0) {
                    movIz = 0;
                }
                MovIzquierda(movIz);

                MovArriba(resultado - movIz);
            }


        } else if (posActual[Jugadoractivo - 1] >= 20 && posActual[Jugadoractivo - 1] < 30)//Movimiento a la derecha etapa 3
        {
            if (posAnterior[Jugadoractivo - 1] < 10) {
                var movIz = 10 - posAnterior[Jugadoractivo - 1];
                if (movIz < 0) {
                    movIz = 0;
                }
                MovIzquierda(movIz);
                posAnterior[Jugadoractivo - 1] = posAnterior[Jugadoractivo - 1] + movIz;
            } else {
                var movIz = 0;
            }


            if (posActual[Jugadoractivo - 1] == 20) {

                var movArr = 20 - posAnterior[Jugadoractivo - 1];
                if (movArr < 0) {
                    movArr = 0;
                }
                MovArriba(movArr);

            } else {
                var movArr = 20 - posAnterior[Jugadoractivo - 1];
                if (movArr < 0) {
                    movArr = 0;
                }
                MovArriba(movArr);

                MovDerecha(resultado - movArr - movIz);//-movIzq
            }


        } else if (posActual[Jugadoractivo - 1] >= 30 && posActual[Jugadoractivo - 1] < 40) {

            var movDer = 0;
            var movIz = 0;
            var movArr = 0;
            var movAbj = 0;

            if (10 - posAnterior[Jugadoractivo - 1] > 0) {
                movIz = 10 - posAnterior[Jugadoractivo - 1];
                MovIzquierda(movIz);
                posAnterior[Jugadoractivo - 1] += movIz;
                movArr = 20 - posAnterior[Jugadoractivo - 1];
                MovArriba(movArr);
                posAnterior[Jugadoractivo - 1] += movArr;

            } else if (20 - posAnterior[Jugadoractivo - 1] > 0) {
                movArr = 20 - posAnterior[Jugadoractivo - 1];
                MovArriba(movArr);
                posAnterior[Jugadoractivo - 1] += movArr;


            }

            if (30 - posAnterior[Jugadoractivo - 1] > 0) {
                movDer = 30 - posAnterior[Jugadoractivo - 1];
                MovDerecha(movDer);
                posAnterior[Jugadoractivo - 1] += movDer;

            }

            //errror
            if (posActual[Jugadoractivo - 1] != 30) {
                movAbj = posActual[Jugadoractivo - 1] - posAnterior[Jugadoractivo - 1];
                MovAbajo(movAbj);

            }



        } else {


            var movDer = 0;
            var movIz = 0;
            var movArr = 0;
            var movAbj = 0;
            if (10 - posAnterior[Jugadoractivo - 1] > 0) {
                movIz = 10 - posAnterior[Jugadoractivo - 1];
                MovIzquierda(movIz);
                posAnterior[Jugadoractivo - 1] += movIz;
                movArr = 20 - posAnterior[Jugadoractivo - 1];
                MovArriba(movArr);
                posAnterior[Jugadoractivo - 1] += movArr;

            } else if (20 - posAnterior[Jugadoractivo - 1] > 0) {
                movArr = 20 - posAnterior[Jugadoractivo - 1];
                MovArriba(movArr);
                posAnterior[Jugadoractivo - 1] += movArr;


            }

            if (30 - posAnterior[Jugadoractivo - 1] > 0) {
                movDer = 30 - posAnterior[Jugadoractivo - 1];
                MovDerecha(movDer);
                posAnterior[Jugadoractivo - 1] += movDer;

            }





            if (posActual[Jugadoractivo - 1] == 40) {
                posActual[Jugadoractivo - 1] = 0;
                movAbj = 40 - posAnterior[Jugadoractivo - 1];
                MovAbajo(movAbj);

            } else {
                movAbj = 40 - posAnterior[Jugadoractivo - 1];
                if (movAbj < 0) {
                    movAbj = 0;
                }
                MovAbajo(movAbj);
                posAnterior[Jugadoractivo - 1] = 0;
                posActual[Jugadoractivo - 1] = posActual[Jugadoractivo - 1] - 40;

                Ubicar(posActual[Jugadoractivo - 1]);
                if (posAnterior[Jugadoractivo - 1] == 0) {
                    cobrarGO(bandera_doble);
                }

            }

        }
    } else {




        IrAlaCarcel(0);





    }
}
function MovIzquierda(resultado) {


    for (var i = 0; i < resultado; i++) {
        $("#personaje" + Jugadoractivo).animate({right: "+=86px"}, 1000);
    }




}
function MovDerecha(resultado) {

    for (var i = 0; i < resultado; i++) {
        $("#personaje" + Jugadoractivo).animate({right: "-=86px"}, 1000);
    }






}
function MovArriba(resultado) {

    for (var i = 0; i < resultado; i++) {

        $("#personaje" + Jugadoractivo).animate({bottom: "+=50px"}, 1000);
    }



}
function MovAbajo(resultado) {


    for (var i = 0; i < resultado; i++) {
        $("#personaje" + Jugadoractivo).animate({bottom: "-=50px"}, 1000);
    }






}
//funcion ubica a la carcel
function IrAlaCarcel(valor) {

    if (valor != 1) {

        $("#personaje" + Jugadoractivo).attr("style", "right:920px;bottom:10px");
    }
    $("#valorDados").replaceWith("<p id='valorDados' style='color:green;font-size:45px'></p>");
    $('#info').replaceWith("<p id='info'style='color:red;font-size:35px'>A la carcel!!!</p>")
    posActual[Jugadoractivo - 1] = 10;
    posAnterior[Jugadoractivo - 1] = 10;
    doble = 0;
    carcel[Jugadoractivo - 1] = 1;



}
//Verifica si es doble o no los dados
function EsDoble(resultado1, resultado2) {
    if (resultado1 == resultado2) {
        //Hay un doble
        return true;
    } else {
        return false;
    }
}
//Funcion para comprar la propiedad
//PARAMETROS:
//precio=>Valor de la propiedad
//color=>Color de la propiedad directo de la base de datos
function ComprarPropiedad(precio, color, jugador) {
//compra de propiedad
    $(".botonSpecial").show();
    //$("#botonTirar").show();
    var id = posActual[Jugadoractivo - 1];
    dinero[jugador - 1] -= precio;
    propiedades[jugador - 1].push(id);
    switch (color) {
        case "brown":
            {
                (propiedadesXcolor[jugador - 1])[0] += 1;

            }
            break;
        case "azure":
            {
                (propiedadesXcolor[jugador - 1])[1] += 1
            }
            break;
        case "purple":
            {
                (propiedadesXcolor[jugador - 1])[2] += 1
            }
            break;
        case "orange":
            {
                (propiedadesXcolor[jugador - 1])[3] += 1
            }
            break;
        case "red":
            {
                (propiedadesXcolor[jugador - 1])[4] += 1
            }
            break;
        case "yellow":
            {
                (propiedadesXcolor[jugador - 1])[5] += 1
            }
            break;
        case "green":
            {
                (propiedadesXcolor[jugador - 1])[6] += 1
            }
            break;
        case "blue":
        {
            (propiedadesXcolor[jugador - 1])[7] += 1
        }
    }

    $(".botonAccion").remove();
    $("#compraExitosa").show();
    ActualizarDinero(dinero[jugador - 1], jugador);
    $.ajax({
        type: "POST",
        url: "../../controlador/cc_partidas.php?id=" + jugador + "&accion=comprarPropiedad&idPropiedad=" + id,

    });

}



//funcion que permite elegir la accion segun la posicion en la que se encuentre la figura
//puede ser comprar , ir a la carcel, tener un chance o un comunity chest,pago de impuesto,nada
//PARAMETROS:
//resultado=>Valor total a avanzar
//dado1=>Valor del primer dado
//dado2=>Valor del segundo dado
function Acccion_Modal(resultado, bandera_doble) {
    setTimeout(
            function () {

                var valor = posActual[Jugadoractivo - 1];

                if (valor == 2 || valor == 7 || valor == 17 || valor == 22 || valor == 33 || valor == 36 || valor == 38)
                {
                    //si se encuentra en alguna de esas posiciones es un evento aleatorio
                    PeticionAjax_Sucesos();
                    $("#ventanaComprar").click();
                    $("#ventanaComprar").hide();


                    //si no es un doble colocar el boton de terminar turno
                    if (!bandera_doble)
                        $("#botonTirar").replaceWith("<li id='terminarTurno' class='botonSpecial' style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");
                    else
                        $(".botonSpecial").show();
                } else if (valor == 30) {
//si cayo con el policia
//muevete a la izquierda 
                    $("#ventanaComprar").hide();
                    for (var i = 0; i < 10; i++) {
                        $("#personaje" + Jugadoractivo).animate({right: "+=86px"}, 1);

                    }
                    //muevete a bajo           
                    for (var i = 0; i < 10; i++) {
                        $("#personaje" + Jugadoractivo).animate({bottom: "-=50px"}, 1);
                    }
                    $("#botonTirar").replaceWith("<li id='terminarTurno' class='botonSpecial' style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");
                    IrAlaCarcel(1);//ir a la carcel


                } else if (valor == 10 || valor == 20) {
                    $("#ventanaComprar").hide();
                    $("#botonTirar").show();
                    if (!bandera_doble)
                        $("#botonTirar").replaceWith("<li id='terminarTurno' class='botonSpecial' style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");
                } else if (valor == 4) {
                    $("#ventanaComprar").hide();

                    PeticionAjax_PagoImpuestos();
                    $("#ventanaComprar").click();
                    if (!bandera_doble)
                        $("#botonTirar").replaceWith("<li id='terminarTurno' class='botonSpecial'style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");

                } else if (valor == 0) {
                    //colect 200
                    $("#ventanaComprar").hide();
                    cobrarGO(bandera_doble);

                } else {
                    var vf = 1;
//propiedaddes 
                    if (!EstaComprada(valor)) {
                        PeticionAjax_CompraPropiedades();
                        $("#ventanaComprar").click();//mostrar ventana
                        $("#ventanaComprar").show();


                    } else {
                        $("#ventanaComprar").hide();
                        vf = 0;
                        if (!EstaCompradaXelJugador()) {
                            PeticionAjax_PagoRenta();
                            $("#ventanaComprar").click();//mostrar ventana
                        }

                        $("#botonTirar").show();
                    }



                    if (!bandera_doble)
                        $("#botonTirar").replaceWith("<li id='terminarTurno' class='botonSpecial'style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");
                    if (vf == 1) {
                        $("#terminarTurno").hide();
                    }

                }



            }, (resultado * 1000));


}
//funcion que determina si esta o no comprada una propiedad x
function EstaComprada(id) {
    var encontrado = false;
    for (var i = 0; i < numeroJugadores; i++) {
        for (var j = 0; j < propiedades[i].length; j++) {
            if (propiedades[i][j] == id) {
                encontrado = true;
            }
        }
    }
    return encontrado;
}
//funcion para comprar los inmuebles 
//PARAMETROS:
// color=>color de la propiedad
//fila=>fila en la que se encuentra la propiedad en la tabla
//coste=>coste de construir 1 inmueble en la propiedad
function ComprarInmueble(color, fila, coste) {



    if (dinero[Jugadoractivo - 1] >= coste) {
        switch (color) {
            case "brown":
                {

                    var array = [1, 3];//array de las posiciones o ids de las propiedades en cuestion
                    Aux("carmelita", 2, coste, array);//metodo auxilir que realiza la compra
                    AuxMostrarBoton(2, array, 'brown', fila, "compra");


                }
                break;
            case "azure":
                {
                    var array = [6, 8, 9];
                    Aux("azulclaro", 3, coste, array);
                    AuxMostrarBoton(3, array, 'azure', fila);
                }
                break;
            case "purple":
                {
                    var array = [11, 13, 14];
                    Aux("morado", 3, coste, array);
                    AuxMostrarBoton(3, array, 'purple', fila);
                }
                break;
            case "orange":
                {
                    var array = [16, 18, 19];
                    Aux("naranja", 3, coste, array);
                    AuxMostrarBoton(3, array, 'orange', fila);
                }
                break;
            case "red":
                {
                    var array = [21, 23, 24];
                    Aux("rojo", 3, coste, array);
                    AuxMostrarBoton(3, array, 'red', fila);
                }
                break;
            case "yellow":
                {
                    var array = [26, 27, 29];
                    Aux("amarillo", 3, coste, array);
                    AuxMostrarBoton(3, array, 'yellow', fila);
                }
                break;
            case "green":
                {
                    var array = [31, 32, 34];
                    Aux("verde", 3, coste, array);
                    AuxMostrarBoton(3, array, 'green', fila);
                }
                break;
            case "blue":
            {
                var array = [37, 39];
                Aux("azul", 2, coste, array);
                AuxMostrarBoton(2, array, 'blue', fila);
            }
        }

    } else {
//no tiene dinero suficiente

    }
}
function VenderInmueble(color, fila, coste) {
    switch (color) {
        case "brown":
            {

                var array = [1, 3];//array de las posiciones o ids de las propiedades en cuestion
                AuxVenta("carmelita", 2, coste, array);//metodo auxilir que realiza la compra
                AuxMostrarBoton(2, array, 'brown', fila, "venta");


            }
            break;
        case "azure":
            {
                var array = [6, 8, 9];
                AuxVenta("azulclaro", 3, coste, array);
                AuxMostrarBoton(3, array, 'azure', fila);
            }
            break;
        case "purple":
            {
                var array = [11, 13, 14];
                AuxVenta("morado", 3, coste, array);
                AuxMostrarBoton(3, array, 'purple', fila);
            }
            break;
        case "orange":
            {
                var array = [16, 18, 19];
                AuxVenta("naranja", 3, coste, array);
                AuxMostrarBoton(3, array, 'orange', fila);
            }
            break;
        case "red":
            {
                var array = [21, 23, 24];
                AuxVenta("rojo", 3, coste, array);
                AuxMostrarBoton(3, array, 'red', fila);
            }
            break;
        case "yellow":
            {
                var array = [26, 27, 29];
                AuxVenta("amarillo", 3, coste, array);
                AuxMostrarBoton(3, array, 'yellow', fila);
            }
            break;
        case "green":
            {
                var array = [31, 32, 34];
                AuxVenta("verde", 3, coste, array);
                AuxMostrarBoton(3, array, 'green', fila);
            }
            break;
        case "blue":
        {
            var array = [37, 39];
            AuxVenta("azul", 2, coste, array);
            AuxMostrarBoton(2, array, 'blue', fila);
        }
    }

}

function Subastar() {

    $("#Tpropiedades").hide();
    $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' >Subasta</h4>");
    $(".subasta").show();

//permite llenar la tabla de subasta con los jugadores que participen
    for (var i = 0; i < numeroJugadores; i++) {
        if (i != (Jugadoractivo - 1)) {
            $("#tabla_subasta tbody ").append("<tr id='per" + (i + 1) + "'><td>" + jugadores[i] + "</td><td><input id='v" + (i + 1) + "'  type='number' class='form-control valor_puja' min='1'></td><td class='fila_puja'> <a href='#'class='btn btn-sm btn-danger'onclick='Retirarse(" + (i + 1) + ")'>Retirarse</a>  <a href='#'class='btn btn-sm btn-success' id='pujar" + (i + 1) + "'onclick='Pujar(" + (i + 1) + ")'>Pujar</a> </td>");
        }
    }
}

function Negociar(valor) {

    $.ajax({
        type: "POST",
        url: "Elegir_socio.php?valor=" + valor + "",
        success: function (response) {
            if (valor == "indirecto") {
                $("#tabla_posibles_negociantes").html(response);
                $("#Tpropiedades").hide();
                $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' >Selecione con quien desea negociar</h4>");

            } else if (valor == "directo") {
                $("#mostrarNegoceo").html(response);
                $("#tituloVentana").replaceWith("<h4 class='modal-title'id='tituloVentana' >Selecione con quien desea negociar</h4>");

            }


            $(".negociar").show();
            //permite llenar los jugadores con los que puede negociar 
            for (var i = 0; i < numeroJugadores; i++) {
                if (i != (Jugadoractivo - 1)) {
                    $(".negociar tbody ").append("<tr id='per" + (i + 1) + "'><td>" + jugadores[i] + "</td> <td><i class='fa fa-square' id='colorJugador1' style='" + Color(i) + "'></i></td> <td> " + dinero[i] + "</td><td>" + propiedades[i].length + "</td><td><input type='radio' name='negociante' value='" + (i + 1) + "'></td>");
                }
            }


        }

    });


}

function ConfirmarOfertaNegocio() //jugadorB es el jugador con el que se quiere negociar
{
    let bandera = false;
    for (let i = 0; i < propiedades[Jugadoractivo - 1].length; i++) {

        if ($(".jugador1 #" + propiedades[Jugadoractivo - 1][i]).prop('checked')) {
            let elemento = propiedades[Jugadoractivo - 1][i];
            bandera = true;
            propiedades[jugador_negocio - 1].push(elemento);
            propiedades[Jugadoractivo - 1].splice(propiedades[Jugadoractivo - 1].indexOf(elemento), 1);

            $.ajax({
                type: "POST",
                url: "../../controlador/cc_partidas.php?id=" + jugador_negocio + "&accion=comprarPropiedad&idPropiedad=" + elemento,

            });
        }
    }
    for (var i = 0; i < propiedades[jugador_negocio - 1].length; i++) {

        if ($(".jugador2 #" + propiedades[jugador_negocio - 1][i]).prop('checked')) {
            bandera = true;
            var elemento = propiedades[jugador_negocio - 1][i];
            propiedades[Jugadoractivo - 1].push(elemento);
            propiedades[jugador_negocio - 1].splice(propiedades[jugador_negocio - 1].indexOf(elemento), 1);

            $.ajax({
                type: "POST",
                url: "../../controlador/cc_partidas.php?id=" + Jugadoractivo + "&accion=comprarPropiedad&idPropiedad=" + elemento,

            });

        }
    }


    var valor1 = parseInt($("#d1").val());
    var valor2 = parseInt($("#d2").val());

    if (valor1 != 0) {
        bandera = true;
        dinero[Jugadoractivo - 1] -= valor1;
        dinero[jugador_negocio - 1] += valor1;
    }
    if (valor2 != 0) {
        dinero[jugador_negocio - 1] -= valor2;
        dinero[Jugadoractivo - 1] += valor2;
        bandera = true;
    }
    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
    ActualizarDinero(dinero[jugador_negocio - 1], jugador_negocio);
    if (bandera) {
        $("#mostrarNegoceo").replaceWith("<div class='col-md-12' id='mostrarNegoceo'><h3 style='color:green;text-align:center;'>Transaccion exitosa</h3></div>");


    }
    Toogledeuda();

}

function Confirmar(valor) {
    if ($("input[name='negociante']").is(':checked')) {
        jugador_negocio = $("input[name='negociante']:checked").val();
        $(".negociar").hide();


        $.ajax({
            type: "POST",
            url: "Ventana_negociar.php?id1=" + Jugadoractivo + "&id2=" + jugador_negocio + "&limit1=" + dinero[Jugadoractivo - 1] + "&limit2=" + dinero[jugador_negocio - 1] + "&valor=" + valor + "",
            success: function (response) {

                if (valor == "indirecto") {
                    $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' >Ventana de negociaciones</h4>");
                    $("#ventana_Negociar").html(response);

                } else if (valor == "directo") {
                    $("#tituloVentana").replaceWith("<h4 class='modal-title'id='tituloVentana' >Ventana de negociaciones</h4>");
                    $("#mostrarNegoceo ").html(response);

                }

                $(".ventana_negociar").show();
                $("#jugador1").replaceWith("<div id='jugador1'style='text-align: center;font-size:1.6rem;" + Color(Jugadoractivo - 1) + ";'>" + jugadores[Jugadoractivo - 1] + "</div>");
                $("#jugador2").replaceWith("<div id='jugador1'style='text-align: center;font-size:1.6rem;" + Color(jugador_negocio - 1) + ";'>" + jugadores[jugador_negocio - 1] + "</div>");

            }

        });

    }


}
function  Atras() {
    $("#Tpropiedades").show();
    $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' ><span style='" + Color(Jugadoractivo - 1) + "'>" + jugadores[Jugadoractivo - 1] + "</span> puede comprar la propiedad:</h4></h4>");
    $("table.negociar tbody").replaceWith("<tbody></tbody>");
    $(".negociar").hide();
    $(".ventana_negociar").hide();

}

function ActualizarDinero(valor, jugador) {
    $("#dineroValor" + jugador).replaceWith("<span id='dineroValor" + jugador + "'>" + valor + "<span>");
}
function Hipotecar(fila, valor, id, color) {

    $("#" + fila + "   #hipotecar").addClass("ocultar");
    $("#" + fila + "   #deshipotecar").removeClass("ocultar");
    $("." + color + "   #comprarCasa").addClass("ocultar");
    $("#" + fila).css("background", "#ab2e2ead");
    dinero[Jugadoractivo - 1] += valor
    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
    $.ajax({
        type: "POST",
        url: "../../controlador/cc_partidas.php?accion=hipotecar&idPropiedad=" + id,

    });
    Toogledeuda();
    ToogleCompra(precio);
}
function Deshipotecar(fila, valor, id, color) {

    $("#" + fila + "   #hipotecar").removeClass("ocultar");
    $("#" + fila + "   #deshipotecar").addClass("ocultar");
    $("." + color + "   #comprarCasa").removeClass("ocultar");
    $("#" + fila).css("background", "#cccccc");
    dinero[Jugadoractivo - 1] -= valor
    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
    $.ajax({
        type: "POST",
        url: "../../controlador/cc_partidas.php?id=" + Jugadoractivo + "&accion=deshipotecar&idPropiedad=" + id,
    });
}
function Retirarse(jugador) {
    // document.write(event.target);

    if (personas_subasta != 1) {

        if (jugador == 1) {
            $("#per1").hide();
        } else if (jugador == 2) {
            $("#per2").hide();
        } else if (jugador == 3) {
            $("#per3").hide();
        } else if (jugador == 4) {
            $("#per4").hide();
        } else if (jugador == 5) {
            $("#per5").hide();
        } else if (jugador == 6) {
            $("#per6").hide();
        }



    } else {
        var precio = parseInt($("#v" + jugador).val());

        $("#tabla_subasta").remove();
        $("#compraExitosa").show();
        $("#pprecio").replaceWith("<p id='pprecio'>Se le restaran  $ " + precio + " de su dinero</p>");
        ComprarPropiedad(precio, color, jugador);


    }

    if (personas_subasta == 1) {
        personas_subasta = numeroJugadores;
    }
    personas_subasta -= 1;

}

//Actualiza el valor minimo que puede tener la puja
function Pujar(jugador) {
    $(".botonPujar").removeClass("botonPujar");
    var min = parseInt($("#v" + jugador).val()) + 1;
    min = min.toString();
    $(".valor_puja").attr("min", min);
    $(".valor_puja").attr("value", min);
    $("#pujar" + jugador).addClass("botonPujar");


}
//
//funcion para saber el duenno de la propiedad segun su id
function quienEsDuenno() {
    var i = 0;
    var j = 0;
    var encontrado = false;
    var duenno = -1;
    while (i < propiedades.length && encontrado == false) {

        while (j < propiedades[i].length && encontrado == false) {

            if (propiedades[i][j] == posActual[Jugadoractivo - 1]) {
                encontrado = true;
                duenno = i + 1;
            }
            j++
        }
        i++
    }
    return duenno;

}
function  ToogleCompra(valor) {
    if (dinero[Jugadoractivo - 1] < valor) {
        $("#botonComprar").hide();
    } else {
        $("#botonComprar").show();

    }

}
function Toogledeuda() {

    if (dinero[Jugadoractivo - 1] < 0) {
        $("#botonTirar").hide();
        $("#terminarTurno").hide();
        $("#bancarrota").show();


    } else {
        if (EstaComprada(posActual[Jugadoractivo - 1])) {
            //$("#terminarTurno").show();
            //$("#botonTirar").show();
            $(".botonSpecial").show();

        }
        $("#bancarrota").hide();


    }


}
function bancarrota() {
    var duenno = quienEsDuenno();
    if (EstaComprada(posActual[Jugadoractivo - 1])) {


        for (let i = 0; i < propiedades[Jugadoractivo - 1].length; i++) {
            let elemento = propiedades[Jugadoractivo - 1][i];
            propiedades[duenno - 1].push(elemento);
            propiedades[Jugadoractivo - 1].splice(propiedades[Jugadoractivo - 1].indexOf(elemento), 1);

            $.ajax({
                type: "POST",
                url: "../../controlador/cc_partidas.php?id=" + duenno + "&accion=comprarPropiedad&idPropiedad=" + elemento,

            });

            $.ajax({
                type: "POST",
                url: "../../controlador/cc_partidas.php?id=" + duenno + "&accion=hipotecar&idPropiedad=" + elemento,

            });

        }

    }
    numeroJugadores -= 1;
    jugadores_arruinados.push(elemento);
    $("#personaje" + elemento).hide();
    $(".personaje" + elemento).hide();

    terminarTurno();
    if (numeroJugadores == 1) {

        $.ajax({
            type: "POST",
            url: "../../controlador/cc_partidas.php?nombre=" + jugadores[duenno - 1] + "&accion=ganar&color=" + Color(duenno - 1) + "",

        });
    }
}

//Genera un numero aleatorio que incluye los limites que son establecidos
function NumAleatorio(limiteI, limiteS) {
    var resultado = Math.floor(Math.random() * (limiteS - limiteI + 1) + limiteI);
    return resultado;
}

//Aux es una funcion que posibilita dibujar las casas en el tablero y descontar del dinero
//PARAMETROS:
//propiedad=>propiedad contiene parte variable del id de cada inmueble
//numero=>numero se refiere a la cantidad de propiedades que poseen el mismo color
//coste=>coste de construir inmuebles 
//posiciones=>contiene las posiciones o los ids de cada propiedad
function Aux(propiedad, numero, coste, posiciones) {

    if (casas[posiciones[0]] == undefined || casas[posiciones[0]] == 0) //si no se ha comprado casa en la primera propiedad carmelita
    {
        casas[posiciones[0]] = 1;
        dinero[Jugadoractivo - 1] -= coste;//reducele al dinero el valor 
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);//actualiza el dinero
        $("#" + propiedad + "1 .casa1").removeClass("ocultar");//mostrar casa1 de carmelita
    } else {
        //si al menos hay una casa en la primera propiedad carmelita
        if (casas[posiciones[0]] == 1) {
            if (casas[posiciones[1]] == undefined || casas[posiciones[1]] == 0)//si no se ha comprado casa en la segunda propiedad 
            {
                casas[posiciones[1]] = 1;
                $("#" + propiedad + "2 .casa1").removeClass("ocultar");//mostrar 1ra casa de la segunda propiedad
                dinero[Jugadoractivo - 1] -= coste;
                ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);


            } else {
                if (casas[posiciones[1]] == 1) {
                    if (numero == 3) //si son 3 propiedades
                    {
                        if (casas[posiciones[2]] == undefined || casas[posiciones[2]] == 0)//si la propiedad 3 no tiene casas 
                        {
                            casas[posiciones[2]] = 1;
                            $("#" + propiedad + "3 .casa1").removeClass("ocultar");
                            dinero[Jugadoractivo - 1] -= coste;
                            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                        } else {
                            //agregarle una casa a la primera propiedad
                            casas[posiciones[0]] += 1;
                            $("#" + propiedad + "1 .casa2").removeClass("ocultar");
                            dinero[Jugadoractivo - 1] -= coste;
                            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                        }
                    } else {//agregarle una casa a la primera propiedad
                        casas[posiciones[0]] += 1;
                        $("#" + propiedad + "1 .casa2").removeClass("ocultar")
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                    }

                }

            }

        } else if (casas[posiciones[0]] == 2) {
            if (casas[posiciones[1]] == 1) {
                casas[posiciones[1]] += 1;
                $("#" + propiedad + "2 .casa2").removeClass("ocultar");
                dinero[Jugadoractivo - 1] -= coste;
                ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
            } else {
                if (numero == 3) {

                    if (casas[posiciones[2]] == 1) {
                        casas[posiciones[2]] += 1;
                        $("#" + propiedad + "3 .casa2").removeClass("ocultar");
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
                    } else {
                        casas[posiciones[0]] += 1;
                        $("#" + propiedad + "1 .casa3").removeClass("ocultar");
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                    }

                } else {
                    casas[posiciones[0]] += 1;
                    $("#" + propiedad + "1 .casa3").removeClass("ocultar");
                    dinero[Jugadoractivo - 1] -= coste;
                    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                }

            }

        } else if (casas[posiciones[0]] == 3) {
            if (casas[posiciones[1]] == 2) {
                casas[posiciones[1]] += 1;
                $("#" + propiedad + "2 .casa3").removeClass("ocultar");
                dinero[Jugadoractivo - 1] -= coste;
                ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
            } else {

                if (numero == 3) {

                    if (casas[posiciones[2]] == 2) {
                        casas[posiciones[2]] += 1;
                        $("#" + propiedad + "3 .casa3").removeClass("ocultar");
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
                    } else {
                        casas[posiciones[0]] += 1;
                        $("#" + propiedad + "1 .casa4").removeClass("ocultar");
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                    }

                } else {
                    casas[posiciones[0]] += 1;
                    $("#" + propiedad + "1 .casa4").removeClass("ocultar");
                    dinero[Jugadoractivo - 1] -= coste;
                    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                }



            }

        } else if (casas[posiciones[0]] == 4) {
            if (casas[posiciones[1]] == 3) {
                casas[posiciones[1]] += 1;
                $("#" + propiedad + "2 .casa4").removeClass("ocultar");
                dinero[Jugadoractivo - 1] -= coste;
                ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
            } else {
                if (numero == 3) {

                    if (casas[posiciones[2]] == 3)//si en la 3ra propiedad hay espacio para una casa 
                    {
                        casas[posiciones[2]] += 1;
                        $("#" + propiedad + "3 .casa4").removeClass("ocultar");
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
                    } else {
                        //crear un hotel en la primera
                        casas[posiciones[0]] += 1;
                        $("#" + propiedad + "1 .casa1").addClass("ocultar");
                        $("#" + propiedad + "1 .casa2").addClass("ocultar");
                        $("#" + propiedad + "1 .casa3").addClass("ocultar");
                        $("#" + propiedad + "1 .casa4").addClass("ocultar");
                        $("#hotel" + propiedad + "1").removeClass("ocultar");
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                    }

                } else {
                    //crear un hotel en la primera
                    casas[posiciones[0]] += 1;
                    $("#" + propiedad + "1 .casa1").addClass("ocultar");
                    $("#" + propiedad + "1 .casa2").addClass("ocultar");
                    $("#" + propiedad + "1 .casa3").addClass("ocultar");
                    $("#" + propiedad + "1 .casa4").addClass("ocultar");
                    $("#hotel" + propiedad + "1").removeClass("ocultar");
                    dinero[Jugadoractivo - 1] -= coste;
                    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

                }


            }

        } else if (casas[posiciones[0]] == 5) {
            //
            if (casas[posiciones[1]] == 4) {
                casas[posiciones[1]] += 1;
                $("#" + propiedad + "2 .casa1").addClass("ocultar");
                $("#" + propiedad + "2 .casa2").addClass("ocultar");
                $("#" + propiedad + "2 .casa3").addClass("ocultar");
                $("#" + propiedad + "2 .casa4").addClass("ocultar");
                $("#hotel" + propiedad + "2").removeClass("ocultar");
                dinero[Jugadoractivo - 1] -= coste;
                ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
            } else {
//
                if (numero == 3) {
                    if (casas[posiciones[2]] == 4) {
                        casas[posiciones[2]] += 1;
                        $("#" + propiedad + "3 .casa1").addClass("ocultar");
                        $("#" + propiedad + "3 .casa2").addClass("ocultar");
                        $("#" + propiedad + "3 .casa3").addClass("ocultar");
                        $("#" + propiedad + "3 .casa4").addClass("ocultar");
                        $("#hotel" + propiedad + "3").removeClass("ocultar");
                        dinero[Jugadoractivo - 1] -= coste;
                        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);



                    }


                }


            }

        }

    }

}
//AuxVenta es una funcion que posibilita dibujar las casas en el tablero y sumar del dinero a medida que son vendidas las casas
//PARAMETROS:
//propiedad=>propiedad contiene parte variable del id de cada inmueble
//numero=>numero se refiere a la cantidad de propiedades que poseen el mismo color
//coste=>coste de construir inmuebles 
//posiciones=>contiene las posiciones o los ids de cada propiedad
function AuxVenta(propiedad, numero, coste, posiciones) {
//para 2 propiedades
    if (casas[posiciones[0]] == 5) {

        casas[posiciones[0]] -= 1;
        $("#hotel" + propiedad + "1").addClass("ocultar");
        $("#" + propiedad + "1 .casa1").removeClass("ocultar");
        $("#" + propiedad + "1 .casa2").removeClass("ocultar");
        $("#" + propiedad + "1 .casa3").removeClass("ocultar");
        $("#" + propiedad + "1 .casa4").removeClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);



    } else if (casas[posiciones[1]] == 5) {

        casas[posiciones[1]] -= 1;
        $("#hotel" + propiedad + "2").addClass("ocultar");
        $("#" + propiedad + "2 .casa1").removeClass("ocultar");
        $("#" + propiedad + "2 .casa2").removeClass("ocultar");
        $("#" + propiedad + "2 .casa3").removeClass("ocultar");
        $("#" + propiedad + "2 .casa4").removeClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    } else if (numero == 3) {
        //para 3 propiedades

        if (casas[posiciones[2]] == 5) {

            casas[posiciones[2]] -= 1;
            $("#hotel" + propiedad + "3").addClass("ocultar");
            $("#" + propiedad + "3 .casa1").removeClass("ocultar");
            $("#" + propiedad + "3 .casa2").removeClass("ocultar");
            $("#" + propiedad + "3 .casa3").removeClass("ocultar");
            $("#" + propiedad + "3 .casa4").removeClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[0]] == 4) {

            casas[posiciones[0]] -= 1;
            $("#" + propiedad + "1 .casa4").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[1]] == 4) {

            casas[posiciones[1]] -= 1;
            $("#" + propiedad + "2 .casa4").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[2]] == 4) {

            casas[posiciones[2]] -= 1;
            $("#" + propiedad + "3 .casa4").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[0]] == 3) {

            casas[posiciones[0]] -= 1;
            $("#" + propiedad + "1 .casa3").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);


        } else if (casas[posiciones[1]] == 3) {

            casas[posiciones[1]] -= 1;
            $("#" + propiedad + "2 .casa3").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[2]] == 3) {

            casas[posiciones[3]] -= 1;
            $("#" + propiedad + "3 .casa3").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
        } else if (casas[posiciones[0]] == 2) {

            casas[posiciones[0]] -= 1;
            $("#" + propiedad + "1 .casa2").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);


        } else if (casas[posiciones[1]] == 2) {

            casas[posiciones[1]] -= 1;
            $("#" + propiedad + "2 .casa2").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[2]] == 2) {

            casas[posiciones[3]] -= 1;
            $("#" + propiedad + "3 .casa2").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[0]] == 1) {

            casas[posiciones[0]] -= 1;
            $("#" + propiedad + "1 .casa1").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

        } else if (casas[posiciones[1]] == 1) {

            casas[posiciones[1]] -= 1;
            $("#" + propiedad + "2 .casa1").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);


        }
        if (casas[posiciones[2]] == 1) {

            casas[posiciones[2]] -= 1;
            $("#" + propiedad + "3 .casa1").addClass("ocultar");
            dinero[Jugadoractivo - 1] += coste;
            ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);


        }
    }

    //a partir de 4 casas
    else if (casas[posiciones[0]] == 4) {

        casas[posiciones[0]] -= 1;
        $("#" + propiedad + "1 .casa4").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    } else if (casas[posiciones[1]] == 4) {

        casas[posiciones[1]] -= 1;
        $("#" + propiedad + "2 .casa4").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    } else if (casas[posiciones[0]] == 3) {

        casas[posiciones[0]] -= 1;
        $("#" + propiedad + "1 .casa3").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1]), Jugadoractivo;


    } else if (casas[posiciones[1]] == 3) {

        casas[posiciones[1]] -= 1;
        $("#" + propiedad + "2 .casa3").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    } else if (casas[posiciones[0]] == 2) {

        casas[posiciones[0]] -= 1;
        $("#" + propiedad + "1 .casa2").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);


    } else if (casas[posiciones[1]] == 2) {

        casas[posiciones[1]] -= 1;
        $("#" + propiedad + "2 .casa2").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    } else if (casas[posiciones[0]] == 1) {

        casas[posiciones[0]] -= 1;
        $("#" + propiedad + "1 .casa1").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    } else if (casas[posiciones[1]] == 1) {

        casas[posiciones[1]] -= 1;
        $("#" + propiedad + "2 .casa1").addClass("ocultar");
        dinero[Jugadoractivo - 1] += coste;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);


    }

}
function AuxMostrarBoton(Numero, posiciones, color, fila, definicion) {

    if (casas[posiciones[0]] != undefined && casas[posiciones[0]] != 0 || casas[posiciones[1]] != undefined && casas[posiciones[1]] != 0) {

        if (contador2 == 0) {
            if (definicion == "compra") {
                $("." + color + "#fila" + (parseInt(fila) + 1) + " #comprarCasa").removeClass("ocultar");
            }
            $("." + color + "#fila" + fila + " #venderInmueble").removeClass("ocultar");
            $("." + color + " #hipotecar").addClass("ocultar");
            $("." + color + "#fila" + fila + " #comprarCasa").addClass("ocultar");
            if (casas[posiciones[0]] == 5) {
                $("." + color + "#fila" + fila + " #comprarCasa").addClass("ocultar");
            } else {
                if (definicion == "venta") {
                    $("." + color + "#fila" + fila + " #comprarCasa").removeClass("ocultar");
                    $("." + color + "#fila" + fila + " #venderInmueble").addClass("ocultar");
                    $("." + color + "#fila" + (parseInt(fila) + 1) + " #venderInmueble").removeClass("ocultar");
                }
            }

        }


        if (casas[posiciones[1]] != undefined && casas[posiciones[1]] != 0) {
            if (contador2 == 1) {
                $("." + color + "#fila" + fila + " #comprarCasa").addClass("ocultar");
                $("." + color + "#fila" + fila + " #venderInmueble").removeClass("ocultar");
                if (casas[posiciones[1]] == 5) {
                    $("." + color + "#fila" + " #comprarCasa").addClass("ocultar");
                } else {
                    if (definicion == "venta") {
                        $("." + color + "#fila" + fila + " #comprarCasa").removeClass("ocultar");
                        $("." + color + "#fila" + fila + " #venderInmueble").addClass("ocultar");
                    }

                }

                if (Numero == 2) {

                    contador2 = -1;
                    if (casas[posiciones[1]] != 5) {

                        $("." + color + "#fila" + (parseInt(fila) - 1) + " #comprarCasa").removeClass("ocultar");

                    }
                    if (definicion == "venta") {
                        $("." + color + "#fila" + (parseInt(fila) - 1) + " #venderInmueble").removeClass("ocultar");
                    }
                }
            }

            if (Numero == 3) {
                if (contador2 == 2) {
                    $("." + color + "#fila" + fila + " #comprarCasa").addClass("ocultar");
                    if (casas[posiciones[2]] != undefined && casas[posiciones[2]] != 0) {
                        $("." + color + "#fila" + " #venderInmueble").removeClass("ocultar");

                        if (casas[posiciones[2]] == 5) {
                            $("." + color + "#fila" + " #comprarCasa").addClass("ocultar");

                        }

                    }
                    contador2 = -1;
                }
            }



        }
        contador2++;

    } else {
        $("." + color + " #venderInmueble").addClass("ocultar");
        $("." + color + " #hipotecar").removeClass("ocultar");
        contador2 = 0;
    }



}

//en la carcel liberacion
function usarTarjeta() {
    tarjeta_carcel[Jugadoractivo - 1] -= 1;

    liberar();
}
function pagar() {
    dinero[Jugadoractivo - 1] -= 50;
    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);
    liberar();
}

function liberar() {
    carcel[Jugadoractivo - 1] = 0;
    doble = 0;
    $(".liberar").hide();

}

function cobrarGO(bandera_doble) {

    dinero[Jugadoractivo - 1] += 200;
    ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    $("#botonTirar").show();
    if (!bandera_doble) {
        $("#botonTirar").replaceWith("<li id='terminarTurno' style='list-style: none;text-align: center;' onclick='terminarTurno()'><a class='btn btn-primary btn-danger '>Terminar turno</a></li>");
    }

}


function EstaCompradaXelJugador() {
    let flag = false;
    let termino = false;
    var valor = propiedades[Jugadoractivo - 1].length;
    var i = 0;
    while (i < propiedades[Jugadoractivo - 1].length && !flag) {

        if (posActual[Jugadoractivo - 1] == propiedades[Jugadoractivo - 1][i]) {
            flag = true;
        }
        i++;

    }
    return flag;
}


//manejando Eventos

function PagarImpuestos(e) {
    if (e.target == diezX100) {
        dinero[Jugadoractivo - 1] -= Math.round(dinero[Jugadoractivo - 1] * 0.10);
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    } else {
        dinero[Jugadoractivo - 1] -= 200;
        ActualizarDinero(dinero[Jugadoractivo - 1], Jugadoractivo);

    }
    $("#diezX100").addClass("ocultar");
    $("#do100s").addClass("ocultar");
    //$("#botonTirar").show();
    $(".botonSpecial").show();
    Toogledeuda();
}

//usando ajax para las opciones


function peticionAjaxMostrarPropiedades() //Peticion ajax para el modal propiedades 
{
    $.ajax({
        type: "POST",
        url: "propiedadesJugador.php?id=" + Jugadoractivo + "",
        success: function (response) {
            $("#mostrarPropiedades").html(response);
            $("#identificadorP").replaceWith("<h4 class='modal-title'id='identificadorP' >Propiedades de <span style='" + Color(Jugadoractivo - 1) + "'>" + jugadores[Jugadoractivo - 1] + "</span></h4>");
        }

    });

}

function PeticionAjax_CompraPropiedades() {

    $.ajax({
        type: "POST",
        url: "CompraPropiedad.php?id=" + posActual[Jugadoractivo - 1] + "",
        success: function (response) {
            $("#Mostrarpropiedad").html(response);
            if (EstaComprada(posActual[Jugadoractivo - 1])) {
                $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' ><span style='" + Color(Jugadoractivo - 1) + "'>" + jugadores[Jugadoractivo - 1] + "</span> debe pagar<span id='dinero'></span> a </h4>");
            } else {
                $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' ><span style='" + Color(Jugadoractivo - 1) + "'>" + jugadores[Jugadoractivo - 1] + "</span> puede comprar la propiedad:</h4>");
            }

        }

    });



}

function PeticionAjax_PagoRenta() {
    var duenno = quienEsDuenno();

    $.ajax({
        type: "POST",
        url: "PagoRenta.php?id=" + posActual[Jugadoractivo - 1] + "&jugador=" + duenno + "",
        success: function (response) {
            $("#Mostrarpropiedad").html(response);
            if (EstaComprada(posActual[Jugadoractivo - 1])) {

            } else {
                $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' ><span style='" + Color(Jugadoractivo - 1) + "'>" + jugadores[Jugadoractivo - 1] + "</span> puede comprar la propiedad:</h4>");
            }

        }

    });



}
function PeticionAjax_PagoImpuestos() {
    $.ajax({
        type: "POST",
        url: "PagoImpuestos.php?id=" + posActual[Jugadoractivo - 1] + "",
        success: function (response) {
            $("#Mostrarpropiedad").html(response);


        }

    });
}


function   PeticionAjax_Sucesos() {

    $.ajax({
        type: "POST",
        url: "ComunityChest_Chances.php?id=" + posActual[Jugadoractivo - 1] + "",
        success: function (response) {
            $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp'></h4>");
            $("#Mostrarpropiedad").html(response);



        }

    });

}

