<?php
/*==============================================
db model--Interface avec la bd
================================================*/
class Db_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
/*==============================================
fct de gestion crud des comptes
================================================*/
public function get_all_compte()//fonction qui répurère l'ensemble des comptes
{
	$query = $this->db->query("SELECT cpt_pseudo FROM T_Compte_cpt;");
	return $query->result_array();
}
public function get_type_user($pseudo)//fonction qui répurère une jointure externe entre compte,invité,organisateur pour un pseudo il faut tester sur le résultat si une entrée de la ligne est null pour avoir le type du compte A/I

{
	$query=$this->db->query("SELECT * FROM T_Compte_cpt left outer join T_Organisateur_org USING(cpt_pseudo)
		left outer join T_Invite_inv using (cpt_pseudo) where cpt_pseudo='".$pseudo."';");
	return $query->row();

}
public function member()	//fonction qui compte le nombre de compte dans la bdd
{
	$query=$this->db->query("SELECT count(*) as n from T_Compte_cpt;");
	return $query->row();

}
public function set_compte() //fonction qui insère un compte dans la bdd à partir d'un formulaire 
{
	$this->load->helper('url');
	$id=$this->input->post('id');
	$mdp=$this->input->post('mdp');

	$req="INSERT INTO T_Compte_cpt VALUES ('".$id."',sha2(concat(\"".$mdp."\",\"selhash\"),256),'D');";
	$query = $this->db->query($req);
	return ($query);
}
	public function connect_compte($username, $password)//fonction qui test si un compte activée et de couple mot de passe ,pseudo est dans la bdd 
	{
		$query =$this->db->query("SELECT cpt_pseudo,cpt_mdp
			FROM T_Compte_cpt
			WHERE cpt_pseudo='".$username."'
			AND cpt_mdp=sha2(concat(\"".$password."\",\"selhash\"),256) and cpt_etat='A';");
		if($query->num_rows() > 0)  
		{  
			return true;  
		}  
		else  
		{  
			return false;
		}  
	}

	public function update_count(){ //fonction qui met à jour le mot de passe d'un compte avec les informations reçus d'un formulaire

		$pseudo=$this->session->username;
		$password=htmlspecialchars(addslashes($this->input->post('mdp')));
		$passwordv=htmlspecialchars(addslashes($this->input->post('mdpconf')));

		if(strcmp($password,$passwordv)==0){
			$query =$this->db->query("UPDATE T_Compte_cpt set cpt_mdp=sha2(concat(\"".$password."\",\"selhash\"),256) where cpt_pseudo='".$pseudo."';");

			return ($query);
		}else{
			return false;
		}
		
	}


 /*==============================================
fct de gestion crud des actualites
================================================*/
public function get_actualite($numero)//fonction qui renvoie les informations d'une actualité en particulier
{
	$query = $this->db->query("SELECT act_id,act_titre FROM T_Actualite_act WHERE
		act_id=".$numero.";");
	return $query->row(); 
}
public function get_all_actualite()//fonction qui renvoie les 5 dernières actualités visibles trié par date décroissante
{
	$query = $this->db->query("SELECT cpt_pseudo,act_id,act_titre,act_texte,act_date FROM T_Actualite_act WHERE
		act_etat='V' order by act_date desc LIMIT 5;");
	return $query->result_array(); 
}
 /*==============================================
fct de gestion crud des animations
================================================*/
public function get_all_animation()//fonction qui renvoie toute les animation avec leurs invités s'il y en a, trié par récente/en_cour/a_venir puis par date de début
{
	$query=$this->db->query("SELECT ani_id,ani_nom,ani_debut,ani_fin,pla_nom,inv_nom,animation_recente(ani_id) as phase from T_Animation_ani left outer join T_anime_invite using(ani_id) left outer join T_Invite_inv using(cpt_pseudo) left outer join T_Localisation_pla using(pla_id) order by(phase),ani_debut;");
	return $query->result_array();

}

public function gets_animation($ani)//fonction qui récupère une animation et sont lieu en fonction d'un id  
{
	$query=$this->db->query("SELECT * from T_Animation_ani join T_Localisation_pla using (pla_id) where ani_id='".$ani."';");
	return $query->row();

}
public function delete_animation($ani)//fonction qui appele une procèdure sql qui supprime une animation en fonction d'un id d'animation déclenche trigger de suppression des actualités en lien avec l'animation et la programmation de cette animation
{
	
	$query=$this->db->query("call suppanim(".$ani.");");
	return ($query);

}
	 /*==============================================
fct de gestion crud des invités
================================================*/
public function get_invite_gallerie()//fonctions qui récupère tout les invités de l'évènement ainsi que leurs posts s'il y en a et leurs réseaux 
{
	$query=$this->db->query("SELECT * FROM T_Invite_inv left outer join T_Passeport_psp using (cpt_pseudo) left outer join T_Post_pos using (psp_id) left outer join T_lien_rsx USING(cpt_pseudo) left outer join T_Reseau_sociaux_rsx USING (rsx_id) order by (pos_date) desc;");
	return $query->result_array();

}
public function get_data_user($pseudo)//fonction qui récupère les informations d'iun comptes qu'il soit organisateur ou invité
{
	$query=$this->db->query("SELECT * from T_Compte_cpt left outer JOIN T_Invite_inv USING(cpt_pseudo) LEFT OUTER join T_Organisateur_org USING(cpt_pseudo) where cpt_pseudo='".$pseudo."';");
	return $query->row();

}



public function get_invite_gallerie_ani($ani)//fonctions qui récupère les invités ainsi que leurs posts s'il y en a et leurs réseaux s'il y en a participant à une animation
{
	$query=$this->db->query("SELECT * FROM T_anime_invite join T_Invite_inv using(cpt_pseudo) left outer join T_Passeport_psp using (cpt_pseudo) left join T_Post_pos using (psp_id) 
left outer join T_lien_rsx USING(cpt_pseudo) left outer join T_Reseau_sociaux_rsx USING (rsx_id) where ani_id='".$ani."' order by (pos_date) desc;");
	return $query->result_array();

}


public function get_invite_rsx($pseudo)//fonction qui récupère les réseaux sociaux d'un invité
{
	$query=$this->db->query("SELECT * from T_Reseau_sociaux_rsx join T_lien_rsx using(rsx_id) where cpt_pseudo='".$pseudo."';");
	return $query->result_array();

}


 /*==============================================
fct de gestion crud des lieux/services
================================================*/
public function get_all_place_free()//fonctions qui récupère tout les lieux et leurs services s'il y en a
{
	$query=$this->db->query("SELECT * from T_Localisation_pla left OUTer JOIN T_Service_ser using(pla_id)where pla_nom !='';");
	return $query->result_array();

}
public function gets_place_free($ani_id)//fonctions qui récupère les lieux et les services d'une animation s'il y en a
{
	$query=$this->db->query("SELECT * from T_Animation_ani left outer join T_Localisation_pla using(pla_id) left outer join T_Service_ser using (pla_id) where ani_id='".$ani_id."';");
	return $query->result_array();

}


 /*==============================================
fct de gestion crud des passeports/posts
================================================*/
public function get_passpost_inv($pseudo)//fonction qui récupère les passeports d'un invité et leurs posts s'il y en a d'un 
{
	$query=$this->db->query("SELECT * from T_Passeport_psp left outer join T_Post_pos using (psp_id) where cpt_pseudo='".$pseudo."';");
	return $query->result_array();

}

public function set_post($texte,$passeport){//fonction qui ajoute un post pour un passeports visible immédiatement
	$this->load->helper('url');
	$query=$this->db->query("INSERT INTO T_Post_pos VALUES (null,'".$texte."',now(),'".$passeport."','V');");
	return ($query);

}

public function check_pass($code,$mdp){//fonction qui test si un passeport est valide
	$code=htmlspecialchars(addslashes($code));
	$passwordv=htmlspecialchars(addslashes($code));
	$query=$this->db->query("SELECT * from T_Passeport_psp where psp_code='".$code."' and psp_mdp='".$mdp."';");
	if($query->num_rows() > 0)  
	{  
		return true;  
	}  
	else  
	{  
		return false;
	} 

}

public function get_pass_id($code){// fonction qui recupere l'id passe en fct d'un code pour un passeport
	$code=htmlspecialchars(addslashes($code));

	$query=$this->db->query(" SELECT * from T_Passeport_psp where psp_code='".$code."';");
	return $query->row();

}

}



