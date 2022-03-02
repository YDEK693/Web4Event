  <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php  echo $animation->ani_nom; ?></h2>
                  
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                          
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">description</div>
                                <div class="portfolio-subheading text-muted"><?php  echo $animation->ani_description; ?></div>
                         
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                       
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">date</div>
                                <div class="portfolio-subheading text-muted"><?php  echo $animation->ani_debut.'<br>'.$animation->ani_fin;?></div>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                          
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Lieu</div>
                                <div class="portfolio-caption-subheading text-muted"><?php  echo $animation->pla_nom; ?></div>
                            </div>
                        </div>
                    </div>
                 
                   
                </div>
            </div>
        </section>