<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../modelo/Conexion.php';
include_once '../modelo/Propiedad.php';
extract($_REQUEST);

if (isset($accion)) {


    switch ($accion) {



        case "cargarPartida": {
                
            }
            break;

        case "guardarPartida": {
                
            }
            break;
        case "eliminarPartida": {
                
            }
            break;
        case "cerrarPartida": {
                
            }break;
        case "comprarPropiedad": {
               
                $objeto = new Propiedad();
                $objeto->ComprarPropiedad($id, $idPropiedad);
            }break;
        case "Reiniciar": {
                $objeto = new Propiedad();
                $objeto->ReiniciarComprarPropiedad($id);
                $objeto->ReiniciarHipotecaPropiedad();
                
            }break;
        case "hipotecar": {
            echo "entro";
                $objeto = new Propiedad();
                $objeto->Hipotecar($idPropiedad); 
            }break;
        case "deshipotecar": {
                 $objeto = new Propiedad();
                $objeto->desHipotecar($idPropiedad); 
            }

            break;
        case "ganar":{
            
                header("location:../vista/paginas/victoria.php?nombre=$nombre");
            
        }
        default : {

                echo 'error';
            }
    }
}
