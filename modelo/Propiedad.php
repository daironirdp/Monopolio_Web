<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Propiedad
 *
 * @author Dairon
 */
class Propiedad {

    //put your code here
    private $id;
    private $nombre;
    private $valor;
    private $costoCasa;
    private $color;

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if ($i > 0) {
            call_user_func_array(array($this, '__constructArg'), $a);
        } else {
            call_user_func_array(array($this, '__constructEmpty'), $a);
        }
    }

    function __constructArg($id, $nombre, $valor, $costoCasa, $color) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->costoCasa = $costoCasa;
        $this->color = $color;
    }

    function __constructEmpty() {
        
    }

    public function obtenerPropiedadesDunjugador($id) {
        $sql = "select * from propiedades_juego where player='$id';";
        $conexion = new Conexion();
        //$propiedades=  $array= array("nombre"=>"carolina","color"=>"rojo","renta"=>"4","hipoteca"=>50,"casa1"=>"10","casa2"=>"30","casa3"=>"40","casa4"=>"50","hotel"=>"140","precio"=>"80"); 
        $propiedades = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $propiedades;
    }

    public function eliminarPropiedad($id) {
        $sql = "delete  from propiedades where id_propiedad=$id";
        $conexion = new Conexion();
        $partidas = $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    public function insertarPropiedad($id, $nombre, $valor, $costocasa, $color) {
        $sql = "insert into partidas ()values('$id','$nombre','$valor','$costocasa','$color')";

        $conexion = new Conexion();
        $conexion->ejecutarConsulta($sql);


        $conexion->CerrarConexion();
    }

    public function obtenerPropiedadDadoID($id) {

        $sql = "Select * from propiedades_juego where id='" . $id . "'";

        $conexion = new Conexion();

        $resultado = $conexion->devolverResultados($sql);


        $conexion->CerrarConexion();
        return $resultado;
    }
    public function  verificarCantTrenes($id){
       $sql ="Select count(id)as numero from propiedades_juego where (id='5'or id='15'or id='25'or id='35')and player='".$id."'";
 //$sql="select count(id)from(Select * from propiedades_juego where (id='5'or id='15'or id='25'or id='35') )where player='".$id."";
       //$sql="Select count(player) as numero from propiedades_juego where player='".$id."'and id in (select player from propiedades_juego where(id='5'or id='15' or id='25' or id='35'))" ;
      // $sql="select * from propiedades_juego where player in (select player from propiedades_juego where(id='5'or id='15' or id='25' or id='35') and player='".$id."')";
//$sql="select * from propiedades_juego where(id='5'or id='15' or id='25' or id='35')";
        $conexion = new Conexion();
      

        $resultado = $conexion->devolverResultados($sql);
       

        $conexion->CerrarConexion();
        return $resultado;
        
    }

    public function ComprarPropiedad($id, $idPropiedad) {
        $conexion = new Conexion();
        $sql = "update  propiedades_juego set player=$id  where id=$idPropiedad";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    public function ReiniciarComprarPropiedad($id) {
        $conexion = new Conexion();
        $sql = "update propiedades_juego set player=$id ";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    public function Hipotecar($idPropiedad) {
        $conexion = new Conexion();
        $sql = "update  propiedades_juego set hipotecada=1  where id=$idPropiedad;";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    public function desHipotecar($idPropiedad) {
         $conexion = new Conexion();
        $sql = "update  propiedades_juego set hipotecada='0'  where id=$idPropiedad";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
        
    }
    
    public function ReiniciarHipotecaPropiedad(){
        $conexion = new Conexion();
        $sql = "update  propiedades_juego set hipotecada='0';";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
        
    }

}
