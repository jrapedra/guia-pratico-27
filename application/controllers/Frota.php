<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * { Class responsable for managing the operations over de cars }
 */
class Frota extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('fabricante_model');
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
		$this->form_validation->set_data($this->input->get());
		$this->form_validation->set_rules($validation_rules);
		$this->form_validation->run();
		$config['base_url'] = base_url("frota/index");
		$config['total_rows'] = $this->frota_model->getCarListCount($filter);
		$config['per_page'] = 20;
		$this->pagination->initialize($config);

		$data['search_value'] = $this->input->get('search_value');
		$data['search_field'] = $this->input->get('search_field');
		$data['content'] = 'frota/index';
		$data['cars'] = $this->frota_model->getCarList($filter, $offset);
		$data['active_menu'] = 'frota';
		$data['pagination'] = $this->pagination->create_links();
		$data['loginuser'] = $this->session->has_userdata('loginuser');
		$this->load->view('init',$data);
	}

	/**
	 * { function responsable for deleting a car form the database }
	 *
	 * @param      <int>  $id     The identifier of the car
	 */
	public function delete($id){
		if($this->session->has_userdata('loginuser')){
			$this->frota_model->deleteCar($id);
		}else{
			$this->session->set_flashdata('msg_type','alert-error');
			$this->session->set_flashdata('msg_error','Sessão inválida!');
		}
	}

	/**
	 * { load the edit car form with all data from the car }
	 *
	 * @param      <type>  $id     The identifier of the car
	 */
	public function edit($id = -1){
		if($this->session->has_userdata('loginuser')){
			$data['fabricantes'] = $this->fabricante_model->getFabricantes();
			$data['modelos'] = $this->fabricante_model->getModelos();
			$data['cores'] = $this->fabricante_model->getCores();
			$data['carInfo'] = $this->frota_model->getCarInfo($id);
			$data['form_title'] = $id == -1 ? "Novo carro" : "Editar carro";
			$data['active_menu'] = 'frota';
			$data['content'] = 'frota/car_form';
			$data['action_url'] = base_url('frota/save/'.$id);
			$this->load->view('init',$data);
		}else{
			$this->session->set_flashdata('msg_type','alert-error');
			$this->session->set_flashdata('msg_error','Sessão inválida!');
			redirect('frota/index');
		}
	}
	
	public function save($id = -1){
		$validation_rules = [
				['field'=>'modelo','label'=>'Modelo','rules'=>'callback_validate_option_exists[modelos.id]','errors'=>['required'=>'É obrigatório indicar %s']],
				['field'=>'cor','label'=>'Cor','rules'=>'callback_validate_option_exists[cores.id]','errors'=>['required'=>'É obrigatório indicar %s']],
				['field'=>'matricula','label'=>'Matricula','rules'=>'required|callback_validate_matricula','errors'=>['required'=>'É obrigatório indicar %s']]
			];
		$this->form_validation->set_rules($validation_rules);
		if ($this->form_validation->run() == FALSE){
			$this->edit($id);
		}else{
			if($id == -1){
				//new car
				if($this->frota_model->insertCar($this->input->post())){
					$this->session->set_flashdata('msg_type','alert-success');
					$this->session->set_flashdata('msg_error','Automóvel inserido com sucesso');
					redirect('frota/index');
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
					redirect('frota/index');
				}else{
					$this->session->set_flashdata('msg_type','alert-error');
					$this->session->set_flashdata('msg_error','Erro ao atualizar automóvel');
					redirect('frota/edit');
				}
			}
		}
	}

	function validate_matricula($matricula)
	{
		if(preg_match("/([0-9][0-9]|[A-Z][A-Z])-([0-9][0-9]|[A-Z][A-Z])-([0-9][0-9]|[A-Z][A-Z])/", $matricula) == 1){
			return TRUE;
		}
		$this->form_validation->set_message('validate_matricula', 'A {matricula} tem de respeitar o formato XX-XX-XX');
		return FALSE;
	}
	function validate_option_exists($field_value,$param){
		$params = explode('.',$param);
		$table = $params[0];
		$column = $params[1];
		return $this->fabricante_model->option_exists_in_database($table,$column,$field_value);
	}
}
?>