<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actualite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
		$this->load->helper('file');
	}
	public function afficher()
	{

		
			$data['titre'] = 'Actualité :';
			$data['actu'] = $this->db_model->get_all_actualite();//récupère toute les actualités
			$data['nb_compte']= $this->db_model->member();
			$this->load->view('templates/haut');
			$this->load->view('page_accueil',$data);
			$this->load->view('templates/bas');
		
	}
}
?>