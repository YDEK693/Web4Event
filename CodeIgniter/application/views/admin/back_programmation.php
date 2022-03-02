

  <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col-lg-9 main-chart">
                <!--CUSTOM CHART START -->
                <div class="border-head">
                  <!--<h3>USER VISITS</h3> -->
                </div>
                <h1><?php echo $titre;?></h1>
                <?php 

                echo ('<table class="table table-bordered"> <tr><th>NOM</th><th>DEBUT</th><th>FIN</th><th>LIEU</th><th>INVITE(S)</th><th>GESTION</th></tr>');
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
                            echo('</td>');
                            echo('</td><td><a href="'.base_url().'index.php/programmation/supprimer_anim/'.$ani_id.'">supprimer</a>
                                <a href="'.base_url().'index.php/programmation/supprimer_anim/'.$ani_id.'">modifier</a>  
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
                    echo('<form action="menu_visiteur.php"method="post"><input type="submit" value="AJOUTER"></form>');

                    ?>




                  </div>
                </div>
                <!-- /row -->
              </section>
            </section>