<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ITVotantes | www.InfoVotantes.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="icon" href="../public/img/icon.jpg">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/css/bootstrap-select.min.css" rel="stylesheet"/>

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>IT</b>Votaciones</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ITVotaciones</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../public/img/icon.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Info Inscritos</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/img/icon.jpg" class="img-circle" alt="User Image">
                    <p>
                      www.Info_Inscritos.com - Desarrollando Software
                      <small>www.youtube.com/Info_Inscritos</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li>
              <a href="#">
                <i class="fa fa-tasks"></i> <span>Escritorio</span>
              </a>
            </li>            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Votaciones 2023</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="Departamentos.php"><i class="fa fa-circle-o"></i> Departamentos</a></li>
                <li><a href="Escuelas.php"><i class="fa fa-circle-o"></i> Escuelas</a></li>
                <li><a href="municipios.php"><i class="fa fa-circle-o"></i> Municipios</a></li>
                <li><a href="paises.php"><i class="fa fa-circle-o"></i> Paises</a></li>
                <li><a href="Lideres.php"><i class="fa fa-circle-o"></i> Lideres</a></li>
                <li><a href="predivotos.php"><i class="fa fa-circle-o"></i> Votantes</a></li>                               
              </ul>
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Consultas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ConsultaVotantesLiderEscuela.php"><i class="fa fa-circle-o"></i>Consulta Votantes</a></li>
                <li><a href="escritorio.php"><i class="fa fa-circle-o"></i> Grafico Top Lideres</a></li>             
              </ul>
            </li>                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
