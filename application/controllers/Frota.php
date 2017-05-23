<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frota extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('frota_model');
	}
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
	public function delete($id){
		$this->frota_model->deleteCar($id);
		$this->index();
	}
}
?>