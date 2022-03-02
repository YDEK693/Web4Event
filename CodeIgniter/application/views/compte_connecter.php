  <!-- Masthead-->
  <header class="masthead">
  	<div class="container">
  		<div class="masthead-subheading">connexion</div>
  		<div class="masthead-heading text-uppercase">invité/organisateur</div>
  	
  		<?php echo validation_errors(); ?>
  		<?php echo form_open('compte/connecter'); ?>
  		<label>Saisissez vos identifiants ici :</label><br>
     <?php if(isset($erreur)) {echo $erreur.'</br>';} ?>


  	identifiant:	<input type="text" name="pseudo" /> <br>
  	mot de passe:	<input type="password" name="mdp" />
  		<input type="submit" value="Connexion"/>
  	</form>

  </div>
</header>
