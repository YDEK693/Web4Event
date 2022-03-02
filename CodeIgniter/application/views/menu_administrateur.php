<?php
if($_SESSION['statut']!= 'A'){
redirect(base_url()."index.php/compte/connecter");
}



?>



 <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
    
          <li class="mt">
            <a class="active" href="<?php echo $this->config->base_url(); ?>index.php/admin/profil_admin">
              <i class="fa fa-dashboard"></i>
              <span>profil</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="<?php echo $this->config->base_url(); ?>index.php/programmation/programmation_arriere">
              <i class="fa fa-desktop"></i>
              <span>PROGRAMMATION</span>
              </a>
           </li>
        <!-- sidebar menu end-->
     </div>
    </aside>