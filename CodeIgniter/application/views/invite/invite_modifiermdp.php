








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


                <?php echo form_open('invite_modifiermdp'); ?>

                <label for="nom">Nom</label>
                <input type="input" name="nom" value="<?php echo $inv->inv_nom; ?>"readonly/><br />
                <label for="bio">Biographie</label>
                <textarea  name="bio" rows="5" readonly/><?php echo $inv->inv_description; ?></textarea><br />

                <label for="mdp">Mot de passe </label>
                <input type="password" name="mdp" /><br />

                <label for="mdpconf">Mot de passe confirmation</label>
                <input type="password" name="mdpconf" /><br />

                <input type="submit" name="submit" value="modifier mot de passe" />

              </form>
                 <?php if(isset($erreur)) {echo $erreur.'</br>';} ?>

             
              <?php echo validation_errors(); ?>



              <form action="<?php echo $this->config->base_url(); ?>index.php/compte/accueil_derriere" method="post"><input type="submit" value="annuler"></form>
            </div>
          </div>
          <!-- /row -->
        </section>
      </section>