<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compte extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}

	public function lister()
	{
		$data['titre'] = 'Liste des pseudos :';
		$data['pseudos'] = $this->db_model->get_all_compte(); //récupère la liste des pseudos

		$this->load->view('templates/haut');
		$this->load->view('compte_liste',$data);
		$this->load->view('templates/bas');
	}
	public function creer()//crée un formulaire avec id et mot de passe insertion dans la base de donnees
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('mdp', 'mdp', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/haut');
			$this->load->view('compte_creer');
			$this->load->view('templates/bas');
		}
		else //formulaire valide
		{
			$this->db_model->set_compte();
			$this->load->view('templates/haut');
			$this->load->view('compte_succes'); 
			$this->load->view('templates/bas');
		}
	}
	public function connecter()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pseudo', 'pseudo', 'required', array('required' => 'Veuillez remplir tous les champs')
	);
		$this->form_validation->set_rules('mdp', 'mdp', 'required',array('required' => 'Veuillez remplir tous les champs'));

		if ($this->form_validation->run() == FALSE) //echec de connection
		{
			$this->load->view('templates/haut');
			$this->load->view('compte_connecter');  //remplissage du formulaire
			$this->load->view('templates/bas');
		}
		else   //réussite
		{
			$username =htmlspecialchars(addslashes($this->input->post('pseudo')));  
			$password = htmlspecialchars(addslashes($this->input->post('mdp'))); 
			


			if($this->db_model->connect_compte($username,$password)) //teste valide
			{
				$type = $this->db_model->get_type_user($username);
				if(is_null($type->inv_nom)){
					$this->session->set_userdata('statut', 'A');
				}else{
					$this->session->set_userdata('statut', 'I');
				}

				$session_data = array('username'  => $username ); //création des valeurs pour la session
				$this->session->set_userdata($session_data); 
				redirect(base_url()."index.php/compte/accueil_derriere");
						//redirect
			
				
			}
			else     //echec 
			{
				$data['erreur'] = 'Identifiants erronés ou inexistants !';
				$this->load->view('templates/haut');
				$this->load->view('compte_connecter',$data);
				$this->load->view('templates/bas');
			}
		}
	}

	public function accueil_derriere(){
		$this->load->view('templates/back_haut');
		if($_SESSION['statut']=='A'){
			$this->load->view('menu_administrateur');

		}else{
			$this->load->view('menu_invite');

		}
		$data['info']=$this->db_model->get_data_user($this->session->username);
		$this->load->view('compte_menu',$data);
		$this->load->view('templates/back_bas');

	}
	public function deconnecter()
	{
		session_destroy();
		redirect(base_url()."index.php/actualite/afficher");

	}


	public function modifmdp()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'nom', 'required',array('required' => ''));
		$data['inv']=$this->db_model->get_data_user($_SESSION['username']);
		if($_SESSION['statut']=='I'){

			$this->form_validation->set_rules('bio', 'bio', 'required',array('required' => ''));
		}else{
			$this->form_validation->set_rules('prenom', 'prenom', 'required',array('required' => ''));
			$this->form_validation->set_rules('mail', 'mail', 'required',array('required' => ''));

		}
		$this->form_validation->set_rules('mdp', 'mdp', 'required',array('required' => ''));
		$this->form_validation->set_rules('mdpconf', 'mdpconf', 'required',array('required' => ''));
		if ($this->form_validation->run() == FALSE)
		{



			$this->load->view('templates/back_haut');
			if($_SESSION['statut']=='I'){

				$this->load->view('menu_invite');
			}else{
				$this->load->view('menu_administrateur');

			}
			$this->load->view('compte_modifmdp',$data);
			$this->load->view('templates/back_bas');



		}else{
			$r=$this->db_model->update_count();
			$d['invite']=$this->db_model->get_data_user($_SESSION['username']);

			if($r==true){
				$this->load->view('templates/back_haut');
				if($_SESSION['statut']=='I'){

					$this->load->view('menu_invite');
				}else{
					$this->load->view('menu_administrateur');

				}
				$this->load->view('b_prof_inv',$d);
				$this->load->view('templates/back_bas');
			}else{

				$this->load->view('templates/back_haut');
				echo('mdp et mdpconf différent');
				if($_SESSION['statut']=='I'){

					$this->load->view('menu_invite');
				}else{
					$this->load->view('menu_administrateur');

				}
				$this->load->view('compte_modifmdp',$data);
				$this->load->view('templates/back_bas');


			}
			
		}
	}

	public function annulermodifi(){

		$this->load->view('templates/back_haut');
		if($_SESSION['statut']=='I'){
			$this->load->view('menu_invite');

		}else{

			$this->load->view('menu_administrateur');

		}
		$username=$this->session->username;
		$data['info']=$this->db_model->get_data_user($username);
		$this->load->view('compte_menu',$data);
		$this->load->view('templates/back_bas');



	}









}








?>