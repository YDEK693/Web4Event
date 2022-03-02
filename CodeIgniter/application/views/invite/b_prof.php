 


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

                <?php

                echo '<img class=""src="'.$invite->inv_image.'"width="400" heigh="200"></br>';
                echo '</br>pseudo : '.$invite->cpt_pseudo.'</br>';
                echo 'nom : '.$invite->inv_nom.'</br>';
                echo 'discipline : '.$invite->inv_discipline.'</br>';
                echo 'description : '.$invite->inv_description.'</br>';



                if($rsx != NULL) {

                  foreach($rsx as $reseaux){
                    echo '<a href="'.$reseaux['rsx_lien'].'">'.$reseaux['rsx_nom'].'</a></br>';
                  }
                }



                ?>
                <form action="<?php echo $this->config->base_url(); ?>index.php/invite/modifiermdp" method="post"><input type="submit" value="modifier le mot de passe"></form>
              </div>
            </div>
          </div>
          <!-- /row -->
        </section>
      </section>