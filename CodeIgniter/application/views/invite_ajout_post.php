<div class="container">
 
  <div class="masthead-heading text-uppercase">ajout de post pour un invité</div>


  <?php echo form_open('invite/ajout_post'); ?>
  </br>
</br>
</br>
  <?php if(isset($erreur)) {echo $erreur.'</br>';} ?>


  code:	<input type="text" name="code" /> <br>
  mot de passe:	<input type="password" name="mdp" /><br>
  post(max 140 car): 
 <textarea  name="post"></textarea><br />
  <input type="submit" value="valider"/>
    <?php echo validation_errors(); 
    	if(isset($erreur)){echo '</br>'.$erreur;}

    ?>

</form>

</div>