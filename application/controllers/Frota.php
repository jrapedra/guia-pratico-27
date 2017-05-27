<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * { Class responsable for managing the operations over de cars }
 */
class Frota extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('frota_model');
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->helper(array('form', 'url'));
	}

	/**
	 * { Show the list of cars with pagination }
	 * index method
	 */
	public function index(){
		$this->load->library('pagination');
		$offset = $this->input->get('page') ?? 0;
		$filter = [];
		if($this->input->get('search_value') ?? false){
			$filter['search_value'] = $this->input->get('search_value');
			$filter['search_field'] = $this->input->get('search_field');
		}
		$validation_rules = [['field'=>'search_field','label'=>'Campo','rules'=>'required'],['field'=>'search_value','label'=>'Pesquisa','rules'=>'required']];
		$this->form_validation->set_rules($validation_rules);
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
		$validation_rules = [
				['field'=>'matricula','label'=>'Matricula','rules'=>'required|is_unique[automoveis.matricula]|regex_match[[0-9A-Z]{2}-[0-9A-Z]{2}-[0-9A-Z]{2}]','errors'=>['required'=>'É obrigatório indicar %s'],['is_unique'=>'a matricula %s já existe na base de dados'],['regex_match'=>'A matrícula 
				%s tem de respeitar o formato XX-XX-XX']],
				['field'=>'modelo','label'=>'Modelo','rules'=>'callback_validate_option_exists[modelos,id]','errors'=>['required'=>'É obrigatório indicar %s']],
				['field'=>'cor','label'=>'Cor','rules'=>'callback_validate_option_exists[cores,id]','errors'=>['required'=>'É obrigatório indicar %s']],
			];
		$this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('myform');
		}else{
			if($id == -1){
				//new car
				if($this->frota_model->insertCar($this->input->post())){
					$this->session->set_flashdata('msg_type','alert-success');
					$this->session->set_flashdata('msg_error','Automóvel inserido com sucesso');
					$this->index();
				}else{
					$this->session->set_flashdata('msg_type','alert-error');
					$this->session->set_flashdata('msg_error','Erro ao inserir automóvel');
					$this->edit();
				}
			}else{
				//update car info
				if($this->frota_model->updateCarInfo($id,$this->input->post())){
					$this->session->set_flashdata('msg_type','alert-success');
					$this->session->set_flashdata('msg_error','Automóvel atualizado com sucesso');
					$this->index();
				}else{
					$this->session->set_flashdata('msg_type','alert-error');
					$this->session->set_flashdata('msg_error','Erro ao atualizar automóvel');
					$this->edit();
				}
			}
		}
	}

	function validate_matricula($matricula)
	{
		$field_value = $str; //this is redundant, but it's to show you how
		//the content of the fields gets automatically passed to the method

		if($this->members_model->validate_member($field_value)){
			return TRUE;
		}else{
			 $this->form_validation->set_message('validate_matricula', 'A {matricula} tem de respeitar o formato XX-XX-XX');
			return FALSE;
		}
	}
	function validate_option_exists($field_value,$table_name,$table_column){

	}
}
?>