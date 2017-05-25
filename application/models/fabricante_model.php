<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * { Class to manage the cars in the database }
 */
class Fabricante_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getFabricantes(){

		return $this->db->from("fabricantes")->get()->result();
	}

	public function getModelos(){
		return $this->db->select("id,nome,fabricante-id fabricante_id")->from("modelos")->get()->result();
	}

	public function getCores(){
		return $this->db->from("cores")->get()->result();
	}
}
?>