


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

              <h2>Espace d'administration
                <?php 
                    if($this->session->userdata('statut')=='A'){
                        echo 'ADMINISTRATEUR';
                    } else{
                        echo 'INVITE';
                    }
                ?>
                   
               </h2>
              <br />
              <h2>Bienvenue
                <?php
                echo $this->session->userdata('username');

                ?> !
            </div>
        </div>
        <!-- /row -->
    </section>
</section>