<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * { Class responsable for managing the operations over de cars }
 */
class Frota extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('frota_model');
	}

	/**
	 * { Show the list of cars with pagination }
	 * index method
	 */
	public function index(){
		$this->load->library('pagination');
		$offset = $this->input->get('page') ?? 0;
		$filter = [];
		if($this->input->get('search_value')){
			$filter['search_value'] = $this->input->get('search_value');
			$filter['search_field'] = $this->input->get('search_field');
		}
		$config['base_url'] = base_url("frota/index");
		$config['total_rows'] = $this->frota_model->getCarListCount($filter);
		$config['per_page'] = 20;
		$this->pagination->initialize($config);

		$data['content'] = 'frota/index';
		$data['cars'] = $this->frota_model->getCarList($filter, $offset);
		$data['active_menu'] = 'frota';
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('init',$data);
	}

	/**
	 * { function responsable for deleting a car form the database }
	 *
	 * @param      <int>  $id     The identifier of the car
	 */
	public function delete($id){
		$this->frota_model->deleteCar($id);
		$this->index();
	}

	/**
	 * { load the edit car form with all data from the car }
	 *
	 * @param      <type>  $id     The identifier of the car
	 */
	public function edit($id){
		$this->load->model('fabricante_model');
		$data['fabricantes'] = $this->fabricante_model->getFabricantes();
		$data['modelos'] = $this->fabricante_model->getModelos();
		$data['cores'] = $this->fabricante_model->getCores();
		$data['carInfo'] = $this->frota_model->getCarInfo($id);
		$data['form_title'] = "Editar carro";
		$data['active_menu'] = 'frota';
		$data['content'] = 'frota/car_form';
		$data['action_url'] = base_url('frota/save/'.$id);
		$this->load->view('init',$data);
	}

	public function save($id = -1){
		if($id == -1){
			//new car
		}else{
			//update car info
			if($this->frota_model->updateCarInfo($id,$this->input->post())){
				$this->session->set_flashdata('msg_','Automóvel alterado com sucesso');
				$this->session->set_flashdata('msg_','Automóvel alterado com sucesso');
			}
		}
	}
}
?>