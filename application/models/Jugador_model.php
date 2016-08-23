<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function guardarPokemon($pokemon)
  {
    $id = $pokemon["codigo"];
    if($id + 0 > 0){
      //Update
      unset($pokemon["codigo"]);
      $this->db->set($pokemon);
      $this->db->where("id",$id);
      $this->db->update("pokemon",$pokemon);
    }else{
      //Insert
      unset($pokemon["codigo"]);
      $this->db->set($pokemon);
      $this->db->insert($this->db->dbprefix . 'pokemon');
    }

  }

  function listarPokemon()
  {
      $query = $this->db->get('pokemon')->result();  // Produces: SELECT * FROM mytable
      return $query;
  }

  function cargarPokemon($id)
  {
    $jugador = new stdClass();
    $jugador->id = "";
    $jugador->nombre = "";
    $jugador->peso = "";
    $jugador->ganados = "";

    $query  = $this->db->where("id",$id);
    $query  = $this->db->get("pokemon");


    $rs = $query->result();
    if(count($rs) >0){
        $jugador = $rs[0];
    }
    return $jugador;
  }

  function eliminarJugador($datos){
    $this->db->where("id", $_GET["id"]);
    $this->db->delete('pokemon');
  }
}
