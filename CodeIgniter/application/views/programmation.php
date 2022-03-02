
        <!--                               ACTUALITRE-->
       
         
            <h1><?php echo $titre;?></h1>
            <?php 

               echo ('<table class="table table-bordered"> <tr><th>NOM</th><th>DEBUT</th><th>FIN</th><th>LIEU</th><th>INVITES</th><th>plus information</th></tr>');
            if($animation != NULL) {
                $p=0;
                foreach($animation as $ani){                    //affichage animation passé,en cour a venir
                    if (!isset($traite[$ani["ani_id"]])){
                        $ani_id=$ani["ani_id"];
                        if($ani["phase"]==1&& $p<1){
                        echo ('<tr><td colspan="6" style="text-align:center;color:red;">ANIMATION PASSES</td></tr>');
                        $p=1;
                        }else if($ani["phase"]==2&& $p<2){
                        echo ('<tr><td colspan="6" style="text-align:center;color:blue;">ANIMATION EN COURS</td></tr>');
                        $p=2;
                        }else if($ani["phase"]==3&& $p<3){
                        echo ('<tr><td colspan="6" style="text-align:center;color:green;">ANIMATION A VENIR</td></tr>');
                        $p=3;
                        }



                     echo ('<tr><td>'.$ani['ani_nom'].'</td><td>'.$ani['ani_debut'].'</td><td>'.$ani['ani_fin'].'</td><td>');
                            if(strcmp($ani["pla_nom"],"")==0){echo 'Aucun lieu';}else{echo $ani["pla_nom"];}//teste lieu pour une animation

                       echo('</td><td>');
                    foreach($animation as $invite){
                        echo "<ul>";
                        if($ani_id==$invite['ani_id']){
                            echo "<li>";
                            if(is_null($invite["inv_nom"])){echo 'Aucun invité';}else{echo $invite["inv_nom"];}
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                  echo('</td><td> <a href="'.base_url().'index.php/programmation/detail_animation/'.$ani_id.'">détails</a>  <a href="'.base_url().'index.php/invite/detail_inv_animation/'.$ani_id.'">galerie</a> <a href="'.base_url().'index.php/lieu/lieu_detail_animation/'.$ani_id.'">lieu/service</a>  
																			   
					</td>');
              
                  $traite[$ani["ani_id"]]=1;
                  echo "</tr>";
                 
              }
               
            }
             echo "</table> ";
          }
          else {echo "<br />";
          echo "Aucune animation pour l'instant !";
        }
      
      ?>

 
<!-- Contact-->
