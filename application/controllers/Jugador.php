<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper("url");
    $this->load->model('Jugador_model');
  }
  function index()
  {
    $data = array();
    $id = (isset($_GET['id'])) ? $_GET['id'] + 0 : 0;
    $data["jugador"] = $this->Jugador_model->cargarPokemon($id);
    $data["jugadores"] = $this->Jugador_model->listarPokemon();;
    $this->load->view('jugador/index', $data);
  }

  function guardar()
  {
    if(isset($_POST))
    {
        $this->Jugador_model->guardarPokemon($_POST);
    }
    $this->load->view('jugador/mensaje');
  }

  function delete()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] + 0 : 0;
    $this->Jugador_model->eliminarJugador($_POST);
    $this->load->view("jugador/mensaje");
  }


}
