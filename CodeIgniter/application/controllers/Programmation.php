<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Programmation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}
	public function afficher()
	{

		
		$data['titre'] = 'animation :';
		$data['animation'] = $this->db_model->get_all_animation();
		
		$this->load->view('templates/haut');
		$this->load->view('programmation',$data);
		$this->load->view('templates/bas');
		
	}
	public function programmation_arriere()
	{

		
		$data['titre'] = 'animation :';
		$data['animation'] = $this->db_model->get_all_animation();
		
		$this->load->view('templates/back_haut');
		$this->load->view('menu_administrateur');
		$this->load->view('admin/back_programmation',$data);
		$this->load->view('templates/back_bas');
		
	}
	public function detail_animation($id)
	{

		
		
		$data['animation'] = $this->db_model->gets_animation($id);
		
		$this->load->view('templates/haut');
		
		$this->load->view('info_animation',$data);
		$this->load->view('templates/bas');
		
	}
	public function supprimer_anim($ani){
		if($_SESSION['statut']!= 'A'){
			redirect(base_url()."index.php/compte/connecter");
		}

		$this->db_model->delete_animation($ani);
		redirect(base_url()."index.php/programmation/programmation_arriere");

	}


}
?>