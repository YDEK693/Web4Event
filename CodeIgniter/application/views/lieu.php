  <h1><?php echo $titre;?></h1>
  <?php 

  echo ('<table class="table table-bordered"> <tr><th>NOM</th><th>descriptif</th><th>SERVICES</th></tr>');
  if($lieu != NULL) {

    foreach($lieu as $pla){         


      if (!isset($traite[$pla["pla_id"]])){
        $pla_id=$pla["pla_id"];




        echo ('<tr><td>'.$pla['pla_nom'].'</td><td>'.$pla['pla_descriptif'].'</td><td>');

        foreach($lieu as $ser){
          echo "<ul>";
          if($pla_id==$ser['pla_id']){
            if(!is_null($ser['ser_nom'])){
              echo "<li>";
              echo $ser["ser_nom"];
              echo "</li>";
            }else{
              echo 'Pas de service dans ce lieu !';
           //   beak();
            }
          }
          echo "</ul>";
        }
        echo('</td>');

      }


      $traite[$pla["pla_id"]]=1;
      echo "</tr>";

      





    }
    echo "</table> ";



  }else {
    echo "<br />";
    echo "Aucune lieu l'instant !";
  }


  ?>