<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lieu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}
	public function afficher()
	{
		$data['titre'] = "Lieu/Service";
		$data['lieu'] = $this->db_model->get_all_place_free();

		$this->load->view('templates/haut');
		
		$this->load->view('lieu',$data);
		$this->load->view('templates/bas');
	}

	public function lieu_serv_animation()
	{
		$data['titre'] = "Lieu/Service";
		$data['lieu'] = $this->db_model->get_all_place_free();

		$this->load->view('templates/haut');
		
		$this->load->view('lieu',$data);
		$this->load->view('templates/bas');
	}
	public function lieu_detail_animation($ani)
	{
		
		$data['lieu'] = $this->db_model->gets_place_free($ani);
		$data['titre'] =$this->db_model->gets_animation($ani);
		$this->load->view('templates/haut');
		
		$this->load->view('lieuserv',$data);
		$this->load->view('templates/bas');
	}

}
?>