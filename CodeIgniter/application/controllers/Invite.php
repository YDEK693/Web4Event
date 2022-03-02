<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invite extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}

	public function afficher()  
	{
		$data['titre'] = 'Liste des pseudos :';
        $data['invite'] = $this->db_model->get_invite_gallerie();//récupére tt les invités avec leurs réseaux et post
        
        $this->load->view('templates/haut');
        $this->load->view('galerie_inv',$data);  
        $this->load->view('templates/bas');
    }

    public function profil_inv()  
    {
    	$pseudo=$this->session->username;
        $data['invite'] = $this->db_model->get_data_user($pseudo);//récupére tt les invités avec leurs réseaux et post
        $data['rsx']=$this->db_model->get_invite_rsx($pseudo);
        $this->load->view('templates/back_haut');
        $this->load->view('menu_invite');
        $this->load->view('invite/b_prof',$data);  
        $this->load->view('templates/back_bas');
    }




    public function modifiermdp()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
  
        $this->form_validation->set_rules('mdp', 'mdp', 'required|min_length[5]',array('required' => 'mot de passe requis'));
        $this->form_validation->set_rules('mdpconf', 'mdpconf', 'required|min_length[5]',array('required' => 'mot de passe de confirmation requis'));

        $data['inv']=$this->db_model->get_data_user($_SESSION['username']);
        if ($this->form_validation->run() == FALSE)
        {



            $this->load->view('templates/back_haut');
            $this->load->view('menu_invite');
            $this->load->view('invite/invite_modifiermdp',$data);
            $this->load->view('templates/back_bas');
            


        }else{
            $r=$this->db_model->update_count();
            $d['invite']=$this->db_model->get_data_user($_SESSION['username']);
            
            if($r==true){
                $this->load->view('templates/back_haut');
                $this->load->view('menu_invite');

                $this->load->view('invite/b_prof',$d);
                $this->load->view('templates/back_bas');
            }else{

                $this->load->view('templates/back_haut');
                $data['erreur'] = 'Confirmation du mot de passe erronée, veuillez réessayer ! !';
                $this->load->view('menu_invite');

                $this->load->view('invite/invite_modifiermdp',$data);
                $this->load->view('templates/back_bas');


            }
            
        }
    }
    public function b_afficherpost(){

        $this->load->view('templates/back_haut');

        $this->load->view('menu_invite');


        $data['titre']="passeports/posts";
        $data['passeport']=$this->db_model->get_passpost_inv($this->session->username);
        $this->load->view('invite/b_post',$data);
        $this->load->view('templates/back_bas');



    }
    public function ajout_post(){

     $this->load->helper('form');
     $this->load->library('form_validation');
     $this->form_validation->set_rules('code', 'code', 'required',array('required' => 'code requis'));



     $this->form_validation->set_rules('mdp', 'mdp', 'required',array('required' => 'mot de passe requis'));// le \0

     $this->form_validation->set_rules('post', 'post', 'max_length[140]',array('max_length' => '140 caractère maximum'));
     if ($this->form_validation->run() == FALSE)
     {



        $this->load->view('templates/haut');

        $this->load->view('invite_ajout_post');
        
        $this->load->view('templates/bas');



    }else{
        $code=htmlspecialchars(addslashes($this->input->post('code')));
        $mdp=htmlspecialchars(addslashes($this->input->post('mdp')));


        $post=htmlspecialchars(addslashes($this->input->post('post')));

        $r=htmlspecialchars(addslashes($this->db_model->check_pass($code,$mdp)));

        if($r){
            $passeport=$this->db_model->get_pass_id($code);
            
            $ajouter=$this->db_model->set_post($post,$passeport->psp_id);
            redirect(base_url()) ;
        }else{
            $this->load->view('templates/haut');
          $data['erreur']="Code(s) erroné(s), aucun passeport trouvé !";  
            $this->load->view('invite_ajout_post',$data);
          
            $this->load->view('templates/bas');

        }





    }
}

public function detail_inv_animation($id)
{



    $data['invite'] = $this->db_model->get_invite_gallerie_ani($id);

    $this->load->view('templates/haut');

    $this->load->view('galerie_ani',$data);
    $this->load->view('templates/bas');

}

}