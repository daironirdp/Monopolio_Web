<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partida
 *
 * @author Dairon
 */
include_once './Conexion.php';

class partida {

    //put your code here
    private $id;
    private $nombre;
    private $fecha;
    private $numeroJugadores;

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if ($i > 0) {
            call_user_func_array(array($this, '__constructArg'), $a);
        } else {
            call_user_func_array(array($this, '__constructEmpty'), $a);
        }
    }

    function __constructArg($id, $nombre, $fecha, $numeroJugadores) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->numeroJugadores = $numeroJugadores;
    }

    function __constructEmpty() {
        
    }

    public function obtenerPartidas() {
        $sql = "select * from partidas";
        $conexion = new Conexion();
        $partidas = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $partidas;
    }

    public function obtenerJugadores_dadoIDpartida($id) {
        $sql = "select * from jugadores where partidaId=$id";
        $conexion = new Conexion();
        $jugadores = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $jugadores;
    }

    public function eliminarPartida($id) {
        $sql = "delete  from partidas where id=$id";
        $conexion = new Conexion();
        $partidas = $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    public function insertarPartida($id, $nombre, $fecha, $numeroJugadores, $array) {
        $sql = "insert into partidas (id_partida,nombre,fecha,numerojugadores)values('$id','$nombre','$fecha','$numeroJugadores')";

        $conexion = new Conexion();
        $conexion->ejecutarConsulta($sql);
$arrayID= new ArrayObject();
        for ($i = 0; $i < $numeroJugadores; $i++) {
            $sql2 = "insert into jugadores(id_jugador,nombre,color,figura,id_partida,pos_actual,turno,dinero,espera_carcel) "
                    . "values('$array[$i]['id_jugador']','$array[$i]['nombre'],'$array[$i]['color']','$array[$i]['figura']','$this->id','$array[$i]['pos_actual']',"
                    . "$array[$i]['turno'],'$array[$i]['dinero']','$array[$i]['espera_carcel']'";
             $conexion->ejecutarConsulta($sql2);
             
        }
        $conexion->CerrarConexion();
    }

}
