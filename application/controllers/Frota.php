<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frota extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('frota_model');
	}
	public function index(){
		$offset = $this->input->get('page') ?? 0;
		$filter = [];
		if($this->input->get('search_value')){
			$filter['search_value'] = $this->input->get('search_value');
			$filter['search_field'] = $this->input->get('search_field');
		}

		$frota = $this->frota_model->getFrotaList($filter);
		$data['content'] = 'frota/index';
		$this->load->view('init',$data);
	}

}
?>