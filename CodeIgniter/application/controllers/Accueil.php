<?php
class Accueil extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('url_helper');
	}



	public function afficher()
	{

		
		
         //Chargement de la view haut.php
		$this->load->view('templates/haut');
        //Chargement de la view du milieu : page_accueil.php
		$this->load->view('menu_visiteur');
        //Chargement de la view bas.php
		$this->load->view('templates/bas');
	}

}
?>