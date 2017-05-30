<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * { Class to manage the cars in the database }
 */
class Frota_model extends CI_Model{

	private $automoveis_tbl = "automoveis";
	
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
				
				if(($search['search_value'] ?? false) && $search['search_value'] != ''){
					$search_column = "f.nome";
					if($search['search_field'] == 'modelo'){
						$search_column = "m.nome";
					}
					if($search['search_field'] == 'matricula'){
						$search_column = "matricula";
					}
					$this->db->like($search_column,$search['search_value']);
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
		if(($search['search_value'] ?? false) && $search['search_value'] != ''){
			$search_column = "f.nome";
			if($search['search_field'] == 'modelo'){
				$search_column = "m.nome";
			}
			if($search['search_field'] == 'matricula'){
				$search_column = "matricula";
			}
			$this->db->like($search_column,$search['search_value']);
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
		$this->db->delete($this->automoveis_tbl);
	}

	/**
	 * Gets the car information.
	 *
	 * @param      <type>  $id     The identifier of the car
	 *
	 * @return     <type>  The car information.
	 */
	public function getCarInfo($id){
		if($id == -1){
			$result = new stdClass();
			$result->matricula = "";
			$result->fabricante_id = -1;
			$result->modelo_id = -1;
			$result->cor_id = -1;
			$result->disponibilidade = 1;

			return $result;
		}
		$this->db->select("m.id modelo_id,f.id fabricante_id,c.id cor_id, matricula, disponibilidade")
				->from("automoveis a")
				->from("fabricantes f")
				->from("modelos m")
				->from("cores c")
				->where("a.modelo_id=m.id")
				->where("a.cor_id=c.id")
				->where("m.fabricante-id=f.id")
				->where("a.id",$id);
		return $this->db->get()->row();
	}

	/**
	 * [updateCarInfo description]
	 * @param  [type] $id       [description]
	 * @param  [type] $car_info [description]
	 * @return [type]           [description]
	 */
	public function updateCarInfo($id,$car_info){
		$update_data = [
					'modelo_id' => $car_info['modelo'],
					'cor_id' => $car_info['cor'],
					'disponibilidade' => $car_info['disponibilidade'],
					'matricula' => $car_info['matricula']
					];
		$this->db->where('id',$id)->update($this->automoveis_tbl,$update_data);
		return $this->db->affected_rows() == 1;
	}

	public function insertCar($car_info){
		$insert_data = [
					'modelo_id' => $car_info['modelo'],
					'cor_id' => $car_info['cor'],
					'disponibilidade' => $car_info['disponibilidade'],
					'matricula' => $car_info['matricula']
					];
		return $this->db->insert($this->automoveis_tbl,$insert_data);
	}
}
?>