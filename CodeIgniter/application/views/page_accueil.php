        <!-- Masthead-->
        <header class="masthead">
          <div class="container">






            <div class="masthead-heading text-uppercase">salon du jeu vidéo 2022!</div>
            <div class="masthead-subheading">22-24 septembre compris,au Los Angeles Convention Center</div>

          </div>
        </header>
        <!-- services                              ACTUALITRE-->
        <?php 
                 //    $test=file_get_contents(base_url());

                   //   echo 'sfdv';
                     // if($test==false){echo 'echec';}else{echo 'reussite';}


        ?> 

        <h1><?php echo $titre;?></h1>
        <?php 

        echo ('<table class="table table-bordered"> <tr><th>TITRE</th><th>TEXTE</th><th>DATE</th><th>AUTEUR</th></tr>');
        if($actu != NULL) {
          foreach($actu as $login){ //affichage des actus s'il en existe au moins une
            echo ('<tr><td>'.$login['act_titre'].'</td><td>'.$login['act_texte'].'</td><td>'.$login['act_date'].'</td><td>'.$login['cpt_pseudo'].'</td></tr>');




          }
          echo "</table> ";
        }
        else {echo "<br />";
        echo "Aucune actualité pour l'instant!";
      }
      ?>


    </section>
    <center><form action="<?php echo $this->config->base_url(); ?>index.php/invite/ajout_post" method="post"><input type="submit" value="+"></form></center>
