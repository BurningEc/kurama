<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Centro Hilístico Kurama</title>
    <link href="../../Static/Inicio/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../Static/Inicio/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../Static/Inicio/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../Static/Inicio/css/sb-admin.css" rel="stylesheet">
   <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand mr-1" href="../Home/Home.php">Centro Hilístico Kurama</a>
      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
         <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <center>
            <b> <?php 
            require_once ("../../Sistema/bd/db.php");
            require_once ("../../Sistema/bd/conexion.php");
            $sql = "SELECT * FROM users WHERE user_id = '" .$_SESSION['user_id']. "'";
            $query = mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($query)){
                      echo $row['firstname'];
            }?>
            </center>
            </b>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../login.php?logout">Salir</a>
          </div>
        </li>
      </ul>
          </div>
      </form>
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i ></i>
            <span>Administración</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../Home/Home.php">
            <i class="fas fa-fw far fa-coffee"></i>
            <span>Inicio</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../Parroquia/lista.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Paciente</span></a>
        </li>

        <!--<li class="nav-item">
          <a class="nav-link" href="Administradores.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Administradores</span></a>
        </li>-->

        <li class="nav-item">
          <a class="nav-link" href="../Tipo_T/lista.php">
            <i class="fas fa-fw fas fa-briefcase"></i>
            <span>Tipo de Terapia</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../Tradicion/lista.php">
            <i class="fas fa-fw far fa-bullseye"></i>
            <span>Historial</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Sugerencias/lista.php">
            <i class="fas fa-fw far fa-calendar-alt"></i>
            <span>Sugerencias</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Videos/lista.php">
            <i class="fas fa-fw fas fa-edit"></i>
            <span>Videos</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../Foto/lista.php">
            <i class="fas fa-fw fas fa-edit"></i>
            <span>Galeria Fotográfica</span></a>
        </li>
      </ul>

      <div id="content-wrapper">