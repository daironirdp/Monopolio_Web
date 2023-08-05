<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<script>
 $("#identificadorProp").replaceWith("<h4 class='modal-title'id='identificadorProp' ><span style='" + Color(Jugadoractivo - 1) + "'>" + jugadores[Jugadoractivo - 1] + "</span> debe pagar<span id='rentapagar'></span> un impuesto a la comunidad</h4>");
    //mostrar el texto 


</script>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p> Usted para contribuir con la comunidad tiene que derogar cierta cantidad.Tiene la oportunidad de elegir si da el 10% de sus 
            riquezas o si entrega 200 $ </p>
    </body>
    <table  style="margin: auto" class="">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2"><input id="diezX100"type="button" class="btn  btn-danger" value="Pagar el 10%" style="margin-right: 30px" onclick="PagarImpuestos(event)"></td>
                <td colspan="2"><input id="do100s"type="button" class="btn  btn-danger" value="Pagar 200$" onclick="PagarImpuestos(event)"></td>
            </tr>
           
        </tbody>
    </table>

    
</html>