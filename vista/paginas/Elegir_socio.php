<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
extract($_REQUEST);
?>




                    

<table class="negociar table table-hover table-condensed" id="tabla_jugador_negociar" style="text-align: center">
    <thead>
        <tr>
            <th style="text-align: center">
                Jugador
            </th>
            <th style="text-align: center">
                Color
            </th>
            <th style="text-align: center">
                Dinero
            </th>

            <th style="text-align: center">
                # Propiedades
            </th>

            <th style="text-align: center">
                Elegir
            </th>


        </tr>
    </thead>   
    <tbody>



    </tbody>

</table> 
<?php
if ($valor == "directo") {
    ?>
<div style="display: flex;justify-content: space-between;" class="negociar">
        <input type="button" value="Cancelar" class="negociar btn btn-sm btn-danger botonAccion close" data-dismiss="modal" id="desencadenante"> 
        <input type="button" value="Confirmar" class="negociar btn btn-sm btn-success botonAccion" onclick="Confirmar('directo')"> 
    </div>
    <?php
}
?>
