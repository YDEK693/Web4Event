<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lieuservice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}
	public function afficher()
	{

		
		$data['titre'] = 'Lieux/Services';
		$data['animation'] = $this->db_model->get_place_free();
		
		$this->load->view('templates/haut');
	//	$this->load->view('lieu_service',$data);
		$this->load->view('templates/bas');
		
	}
	

}
?>