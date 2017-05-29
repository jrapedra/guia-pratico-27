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

	/**
	 * [devolve todas as cores disponíveis em base de dados]
	 * @return [type] [description]
	 */
	public function getCores(){
		return $this->db->from("cores")->get()->result();
	}
	/**
	 * verifica se uma determinada opção existe na base de dados
	 * @param  [string] $table  [nome da tabela que queremos verificar]
	 * @param  [string] $column [noma da coluna que vamos comparar]
	 * @param  [type] $value  [valor que procuramos na tabela]
	 * @return [bool]         [Verdadeiro se existe, falso caso contrário]
	 */
	public function option_exists_in_database($table,$column,$value):bool{
		return $this->db->where($column,$value)->count_all_results($table) > 0;
	}
}
?>