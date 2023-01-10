<head>
  <link rel="stylesheet" href="../css/menu.css">
</head>



<header class="main-header">
  <!-- Logo -->
  <a href="indexuser.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Chiná</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Chiná</b>TecNM</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <div class="container_nav">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              $caracter_a_buscar = ".";
              $buscar = strpos($id_foto_perfil, $caracter_a_buscar);
              if ($buscar == true) {
                // echo "existe foto de perfil";
              ?>
                <img src="../usuarios/update_usuarios/<?php echo $sesion_usuario['foto_perfil']; ?>" class="user-image" alt="User Image">
                <?php
              } else {
                if ($id_sexo  == "Hombre") {
                ?>

                  <img src="../public/images/avatar_hombre.png" class="user-image" alt="User Image">

                <?php
                } else {
                ?>

                  <img src="../public/images/avatar_mujer.png" class="user-image" alt="User Image">

              <?php
                }
              }
              ?>
              <span class="hidden-xs"><?php echo $id_nombres . " " . $id_ap_paterno . " " . $id_ap_materno; ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php
                $caracter_a_buscar = ".";
                $buscar = strpos($id_foto_perfil, $caracter_a_buscar);
                if ($buscar == true) {
                  // echo "existe foto de perfil";
                ?>
                  <img src="../usuarios/update_usuarios/<?php echo $sesion_usuario['foto_perfil']; ?>" class="user-image" alt="User Image">
                  <?php
                } else {
                  if ($id_sexo  == "Hombre") {
                  ?>

                    <img src="../public/images/avatar_hombre.png" class="user-image" alt="User Image">

                  <?php
                  } else {
                  ?>

                    <img src="../public/images/avatar_mujer.png" class="user-image" alt="User Image">

                <?php
                  }
                }
                ?>

                <p>
                  <?php echo $id_nombres . " " . $id_ap_paterno . " " . $id_ap_materno; ?> - <?php echo $id_carrera; ?>
                  <small><?php echo $id_numero_control; ?></small>
                </p>
              </li>

              <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="../usuarios/perfil.php" class="btn btn-default btn-flat">Perfil</a>
            </div>
            <div class="pull-right">
              <a href="../login/controller_cerrar_sesion.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
            </div>
          </li>
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar sidebar-menu">
    <!-- Sidebar user panel -->
    <!-- <div class="user-panel">
      <div class="pull-left image">
        <?php
        $caracter_a_buscar = ".";
        $buscar = strpos($id_foto_perfil, $caracter_a_buscar);
        if ($buscar == true) {
          // echo "existe foto de perfil";
        ?>
          <img src="<?php echo $URL; ?>/usuarios/update_usuarios/<?php echo $sesion_usuario['foto_perfil']; ?>" class="user-image" alt="User Image">
          <?php
        } else {
          if ($id_sexo  == "HOMBRE") {
          ?>

            <img src="<?php echo $URL; ?>/public/images/avatar_hombre.png" class="user-image" alt="User Image">

          <?php
          } else {
          ?>

            <img src="<?php echo $URL; ?>/public/images/avatar_mujer.png" class="user-image" alt="User Image">

        <?php
          }
        }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $id_nombres . " " . $id_ap_paterno . " " . $id_ap_materno; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div><br> -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>ACTIVIDADES ACADÉMICAS</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="sidebar-menu treeview-menu">









        <li class="header">Calendario de Actividades</li>
        <li><a href="calendariovista.php"><i class="glyphicon glyphicon-calendar"></i> <span>Elegir Actividad Académica</span></a></li>


        <li class="header">Evidencias de créditos</li>

        <li><a href="agregar-credito-user.php"><i class="glyphicon glyphicon-folder-open"></i> <span>Cargar Documento</span></a></li>

        <li class="header">Evaluacion</li>

        <li><a href="generarconstancia_alumno.php"><i class="fa fa-book"></i> <span><b>Constancia</b></span></a></li>

        <li class="header">Extraescolar</li>

        <li><a href="generarconstancia_alumno.php"><i class="fa fa-book"></i> <span><b>Actividades</b></span></a></li>

      </ul>
    </li>


    <!-- creditos -->
    <li class="treeview">
      <a href="#">
        <span>DESARROLLADORES</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class=" sidebar-menu treeview-menu">

        <li class="treeview">
          <a href="#">
            <span>Versión 1.0</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>


          <ul class="treeview-menu">
            <br>
            <div class="row">
              <img src="../public/desarrolladores/daniel.PNG" class="imagen">
              <div class="col-12 version">
                <b>ING. DANIEL JESÚS PÉREZ M.</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 16830180 <br></b>
              </div>

            </div>
            <br>
            <div class="row">
              <img src="../public/desarrolladores/emmanuel.PNG" class="imagen">
              <div class="col-12 version">
                <b>ING. JOSÉ ESCAMILLA MORENO</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 16830183 <br></b>
              </div>

            </div>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <span>Versión 2.0</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <br>

            <div class="row">
              <img src="../public/desarrolladores/diana.jpeg" class="imagen">
              <div class="col-12 version">
                <b>DIANA L. MADRIGAL BENITEZ</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 19830012 <br></b>
              </div>

              <br>
              <img src="../public/desarrolladores/chan.jpeg" class="imagen">
              <div class="col-12 version">
                <b>JÓSE RICARDO CHAN MARIN</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 19830002 <br></b>
              </div>

              <br>
              <img src="../public/desarrolladores/cuca.jpeg" class="imagen">
              <div class="col-12 version">
                <b>JUAN ANTONIO CU CAHUICH</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 19830001 <br></b>
              </div>

              <br>
              <img src="../public/desarrolladores/farfan.jpeg" class="imagen">
              <div class="col-12 version">
                <b class="tres">DANIEL FARFÁN CAHUICH</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 19830027 <br></b>
              </div>

              <br>
              <img src="../public/desarrolladores/boton.jpeg" class="imagen">
              <div class="col-12 version">
                <b>CARLOS FRANCISCO BOTON</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 19830248 <br></b>
              </div>

              <br>
              <img src="../public/desarrolladores/kevin.jfif" class="imagen">
              <div class="col-12 version">
                <b>KEVIN BONIFAZ HERNÁNDEZ</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 19830014 <br></b>
              </div>

              <br>
              <img src="../public/desarrolladores/felipe.jpeg" class="imagen">
              <div class="col-12 version">
                <b class="dos">FELIPE GIL MAYOR</b>
                <br>
                <b>INGENIERÍA EN INFORMÁTICA <br></b>
                <b class="uno">MATRÍCULA 19830007 <br></b>
              </div>



            </div>

          </ul>






  </section>
  <!-- /.sidebar -->
</aside>