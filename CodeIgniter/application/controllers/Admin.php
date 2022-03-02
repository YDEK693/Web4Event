<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
        
        
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

        public function profil_admin()  
        {
        $pseudo=$this->session->username;
        $data['invite'] = $this->db_model->get_data_user($pseudo);//récupére tt les invités avec leurs réseaux et post
        
        $this->load->view('templates/back_haut');
        $this->load->view('menu_administrateur');
        $this->load->view('admin/b_prof',$data);  
        $this->load->view('templates/back_bas');
        }

    public function modifiermdp()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'nom', 'required',array('required' => ''));
        $data['inv']=$this->db_model->get_data_user($_SESSION['username']);
    
        $this->form_validation->set_rules('prenom', 'prenom', 'required',array('required' => ''));
        $this->form_validation->set_rules('mail', 'mail', 'required',array('required' => ''));

        
        $this->form_validation->set_rules('mdp', 'mdp', 'required|min_length[5]',array('required' => 'mot de passe manquant'));
        $this->form_validation->set_rules('mdpconf', 'mdpconf|min_length[5]', 'required',array('required' => 'mot de passe confirmé manquant'));
        if ($this->form_validation->run() == FALSE)
        {



                $this->load->view('templates/back_haut');
             
                $this->load->view('menu_administrateur');

                
                $this->load->view('admin/admin_modifiermdp',$data);
                $this->load->view('templates/back_bas');
                


        }else{
                $r=$this->db_model->update_count();
                        $d['invite']=$this->db_model->get_data_user($_SESSION['username']);
                
                if($r==true){
                        $this->load->view('templates/back_haut');
                   
                         $this->load->view('menu_administrateur');

                        
                        $this->load->view('admin/b_prof',$d);
                        $this->load->view('templates/back_bas');
                }else{

                        $this->load->view('templates/back_haut');
                         $data['erreur'] = 'Confirmation du mot de passe erronée, veuillez réessayer ! !';
                      
                        $this->load->view('menu_administrateur');

                        
                        $this->load->view('admin/admin_modifiermdp',$data);
                        $this->load->view('templates/back_bas');

                
                }
                        
        }
    }



        
}