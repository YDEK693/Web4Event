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



        if($passeport != NULL) {
         echo ('<table class="table table-bordered"> <tr><th>psp_id</th><th>ode</th><th>mot de passe</th><th>post:texte/date/etat</th></tr>');               
                foreach($passeport as $pass){                    
                  if (!isset($traite[$pass["psp_id"]])){
                    $psp_id=$pass["psp_id"];



                    echo ('<tr><td>'.$pass['psp_id'].'</td><td>'.$pass['psp_code'].'</td><td>'.$pass['psp_mdp'].'</td><td>');
                    echo ('<table class="table table-bordered"> <tr><th>texte</th><th>date</th><th>etat</th></tr>');
                    foreach($passeport as $pos){



                      if($psp_id==$pos['psp_id']){

                        if(is_null($pos["pos_date"])){echo 'Aucun post';}else{echo '<tr><td>'.$pos["pos_texte"].'</td><td>'.$pos["pos_date"].'</td><th>'.$pos["pos_etat"].'</td></tr>';}

                      }


                    }
                    echo '</table>';
                    echo('</td>');



                    $traite[$pass["psp_id"]]=1;
                    echo "</tr>";
                  }

                }
                echo "</table> ";

              }
              else {echo "<br />";
              echo "Aucune passeport";
            }


            ?>




          </div>
        </div>
        <!-- /row -->
      </section>
    </section>