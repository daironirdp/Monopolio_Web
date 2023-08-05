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
// $propiedad = $objeto->obtenerPropiedadDadoID($id);
$propiedad_jugador1 = $objeto->obtenerPropiedadesDunjugador($id1);
$propiedad_jugador2 = $objeto->obtenerPropiedadesDunjugador($id2);
$limit = array($limit1, $limit2);
$propiedades = array($propiedad_jugador1, $propiedad_jugador2);
?>
<div style="display: flex;justify-content: space-between;">


                  


        <?php
        for ($i = 1; $i < 3; $i++) {
            ?>
            <div id="bloque_jugador<?php echo $i; ?>" style="display: flex;flex-direction:column;">


                <div class="ventana_negociar"id="jugador<?php echo $i; ?>"style="text-align: center;"></div>

                <table class=" ventana_negociar table table-hover table-condensed" id="tabla<?php echo $i; ?>" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">
                                Color
                            </th>
                            <th style="text-align: center">
                                Propiedad
                            </th>
                            <th style="text-align: center">
                                Precio
                            </th>
                            <th style="text-align: center">
                                Elegir
                            </th>




                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        if ($propiedades[$i - 1] != false)
                            foreach ($propiedades[$i - 1] as $value) {
                                ?>

                                <tr>

                                    <td>
                                        <i class="fa fa-square" id="colorJugador1" style="color:<?php echo $value["color"]; ?> "></i>
                                    </td>

                                    <td>

                                        <?php echo $value["nombre"]; ?>
                                    </td> 



                                    <td>
                                        <?php echo $value["precio"]; ?>
                                    </td>

                                    <td class="jugador<?php echo $i;?>">
                                        <input type="checkbox" value="<?php echo $value["id"]; ?>" id="<?php echo $value["id"];?>">
                                    </td>

                                </tr>        


                                <?php
                            }
                        ?>
                    </tbody>

                </table> 

                <div>
                    <label class="ventana_negociar"for="dinero<?php echo $i ?>">Dinero</label>
                    <input type="number" value="0" id="d<?php echo $i; ?>" min="0" max="<?php echo $limit[$i]; ?>"class="form-control ventana_negociar" style="width: 45%;text-align: center">

                </div>


            </div>

            <?php
        }
        ?>

        <div id="bloque_accion " style="display: flex;justify-content: center;flex-direction: column;order: 2;">

            <input type="button" style=" margin-top: 25px;margin-bottom: 10px"class="ventana_negociar btn btn-sm btn-success botonAccion" onclick="ConfirmarOfertaNegocio()" value="Negociar">
            <?php
            if($valor=="indirecto"){
            ?>
            <input type="button" style=""class="ventana_negociar btn btn-sm btn-danger botonAccion" onclick="Atras()" value="Cancelar">
   <?php
            }else{
            ?>
            <input type="button" style=""class="ventana_negociar btn btn-sm btn-danger botonAccion" onclick="Negociar('directo')" value="Cancelar">
            
            <?php 
            }
            
            ?>
        </div>





  </div>
