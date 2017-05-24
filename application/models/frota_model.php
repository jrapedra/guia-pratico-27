<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * { Class to manage the cars in the database }
 */
class Frota_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}


	/**
	 * Gets the cars from database acoording to the search paramaters.
	 *
	 * @param      array   $search  Associative array with the column name and the serach value
	 *
	 * @return     array  The frota list in a array of objects.
	 */
	public function getCarList($search = array(), $offset = 0, $pg_size = PG_ITEMS_PER_PAGE):array{
		$this->db->select("a.id id, f.nome marca, m.nome modelo, matricula, c.nome cor, disponibilidade")
				->from("automoveis a")
				->from("fabricantes f")
				->from("modelos m")
				->from("cores c")
				->where("a.modelo_id=m.id")
				->where("a.cor_id=c.id")
				->where("m.fabricante-id=f.id");
				
				if($search['search_value'] ?? false){
					$this->db->like("m.nome",$search['modelo']);
					$this->db->like("matricula",$search['matricula']);
					$this->db->like("f.nome",$search['fabricante']);
				}
				$this->db->limit($pg_size,$offset);
		return $this->db->get()->result();
	}

	/**
	 * Gets the number of cars from database acoording to the search paramaters.
	 *
	 * @param      array   $search  Associative array with the column name and the serach value
	 *
	 * @return     <type>  The frota list count.
	 */
	public function getCarListCount($search = array()):int{
		$this->db->from("automoveis a")
				->from("fabricantes f")
				->from("modelos m")
				->from("cores c")
				->where("a.modelo_id=m.id")
				->where("a.cor_id=c.id")
				->where("m.fabricante-id=f.id");
		if($search['modelo'] ?? false){
			$this->db->like("m.nome",$search['modelo']);
		}
		if($search['matricula'] ?? false){
			$this->db->like("matricula",$search['matricula']);
		}
		if($search['fabricante'] ?? false){
			$this->db->like("f.nome",$search['fabricante']);
		}
		return $this->db->count_all_results();
	}


	/**
	 * { delete the car from database }
	 *
	 * @param      <type>  $id     The identifier of the car to be deleted
	 */
	public function deleteCar($id){
		$this->db->where('id', $id);
		$this->db->delete('automoveis');
	}

	/**
	 * Gets the car information.
	 *
	 * @param      <type>  $id     The identifier of the car
	 *
	 * @return     <type>  The car information.
	 */
	public function getCarInfo($id){
		$this->db->from("automoveis")->where("id",$id);
		return $this->db->get()->row();
	}
}
?>