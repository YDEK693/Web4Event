

<section class="page-section bg-light" id="portfolio">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase"><?php if(strcmp($titre->pla_nom,'')==0){echo 'pas de lieu';}else{echo $titre->pla_nom;} ?></h2>

    </div>
    <div class="row">

      <div class="col-lg-4 col-sm-6 mb-4">
        <!-- Portfolio item 1-->
        <div class="portfolio-item">

          <div class="portfolio-caption">
            <div class="portfolio-caption-heading">description</div>
            <div class="portfolio-subheading text-muted"><?php  echo $titre->pla_descriptif; ?></div>

          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <!-- Portfolio item 2-->
        <div class="portfolio-item">

          <div class="portfolio-caption">
            <div class="portfolio-caption-heading">service</div>
            <div class="portfolio-subheading text-muted">
             <?php 


             
             if(!is_null($titre->pla_nom)) {
              echo ('<ul>');
                foreach($lieu as $serv){                    //affichage animation passé,en cour a venir
                  if(is_null($serv['ser_nom'])){echo "pas de service";break;}else{

                    echo('<li>'.$serv['ser_nom'].'</li>');
                  }
                }

                  echo ('</ul>');


            }
            else {echo "<br />";
            echo "Aucun lieu";
           }


          ?>

        </div>

      </div>
    </div>
  </div>



</div>
</div>
</section>