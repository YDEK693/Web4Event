<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">NOS INVITES</h2>

        </div>
        <div class="row">

         <?php 

         echo ('<table class="table table-bordered"> <tr><th>nom</th><th>début</th><th>fin</th><th>lieu</th><th>invite(S)</th><th></th></tr>');
         if($invite != NULL) {

            foreach($invite as $inv){


                if (!isset($traite[$inv["cpt_pseudo"]])){
                    $inv_id=$inv["cpt_pseudo"];
                    echo ' <div class="col-lg-4"> <div class="team-member">';

                        echo '<img class="mx-auto rounded-circle" src="'.$inv['inv_image'].'" alt="..." />'; //affichage image
                        echo '<h4>'.$inv['inv_nom'].'</h4>';                                                  //non
                        echo '<p>discipline:'.$inv['inv_discipline'].'</p>';          
                        echo '<p>biographie:'.$inv['inv_description'].'</p>';   





                        foreach($invite as $invi){                                  //sert à gerer les réseaux sociaux

                            if($inv_id==$invi['cpt_pseudo']){

                                if(is_null($invi["rsx_nom"])){echo ' <p class="text-muted">Pas de réseau social pour cet invité</p>';}
                                else if($invi['rsx_nom']=="twitter"&&!isset($rsx[$invi["rsx_nom"]])){//isset pbas Idea
                                    $rsx[$invi["rsx_nom"]]=1;
                                    echo  '<a class="btn btn-dark btn-social mx-2" href="'.$invi["rsx_lien"].'"><i class="fab fa-twitter"></i></a>';
                                     //raj
                                } else if($invi['rsx_nom']=="facebook"&&!isset($rsx[$invi["rsx_nom"]])){//isset pbas Idea
                                    $rsx[$invi["rsx_nom"]]=1;
                                    echo  '<a class="btn btn-dark btn-social mx-2" href="'.$invi["rsx_lien"].'"><i class="fab fa-facebook"></i></a>';
                                }else if(!isset($rsx[$invi["rsx_nom"]])){
                                    $rsx[$invi["rsx_nom"]]=1;
                                    echo '<a href="'.$invi["rsx_lien"].'">'.$invi["rsx_nom"].'</a>';
                                }



                            }





                        }

                   
                    
                      unset($rsx);
                        $bol=0;
                        $n=0;
						foreach($invite as $pos){    //GESTION DES POSTS
							
                            if(strcmp($inv_id,$pos['cpt_pseudo'])==0 &&!is_null($pos['pos_texte']) &&!isset($post[$inv["pos_id"]])&& $pos['pos_etat']=='V'&& $n<3){//&&   $pos['pos_etat']!='D'
                            echo  ('<p class="text-muted">'.$pos['pos_date'].'/'.$pos['pos_texte'].'</p>');
                            $bol=1;
                            $n=$n+1;
                        }
                            else if(strcmp($inv_id,$pos['cpt_pseudo'])==0 &&!$bol){   //test cpt_pseudo
                                echo ('<p class="text-muted"> pas de post pour cet invité !</p>');
                                break;

                            }

					

						}
						

                        echo '</div></div>';

                    }
                    $traite[$inv["cpt_pseudo"]]=1;
                    $post[$inv["pos_id"]]=1;


                }
            }else{echo 'Aucun invité pour l\'instant !';}

            ?>




        </div>
        
    </div>
</section>
