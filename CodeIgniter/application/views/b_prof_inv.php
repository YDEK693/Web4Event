  <header class="masthead">
    <div class="container">
      <div class="masthead-subheading">Welcome To Our Studio!</div>
      <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
      <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>


      <?php
      if($_SESSION['statut']=='I'){
       echo '<img class=""src="'.$invite->inv_image.'"width="400" heigh="200"></br>';
           echo '</br>pseudo : '.$invite->cpt_pseudo.'</br>';
            echo 'nom : '.$invite->inv_nom.'</br>';
            echo 'discipline : '.$invite->inv_discipline.'</br>';
            echo 'inv_description : '.$invite->inv_description.'</br>';
      }else{
         echo '</br>nom : '.$invite->org_nom.'</br>';
         echo 'prenom : '.$invite->org_prenom.'</br>';
         echo 'mail : '.$invite->org_mail.'</br>';
         echo 'pseudo : '.$invite->cpt_pseudo.'</br>';
      }
            








       ?>
         <form action="<?php echo $this->config->base_url(); ?>index.php/compte/modifmdp" method="post"><input type="submit" value="modifier le mot de passe"></form>
    </div>
  </header>