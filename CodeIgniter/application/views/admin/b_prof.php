
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

                echo '</br>nom : '.$invite->org_nom.'</br>';
                echo 'prenom : '.$invite->org_prenom.'</br>';
                echo 'mail : '.$invite->org_mail.'</br>';
                echo 'pseudo : '.$invite->cpt_pseudo.'</br>';










                ?>
                <form action="<?php echo $this->config->base_url(); ?>index.php/admin/modifiermdp" method="post"><input type="submit" value="modifier le mot de passe"></form>
              </div>
            </div>
            <!-- /row -->
          </section>
        </section>