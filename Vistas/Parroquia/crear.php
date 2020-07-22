<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>
<?php include("../Home/Inicio.php");?>
<div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../Home/Home.php">Administración</a>
            </li>
            <li class="breadcrumb-item active">Pacientes</li>
          </ol>
<form method="post" action="controlador.php" enctype="multipart/form-data">
      
      <input class="form-control" type="hidden" name="ver" value="crear">

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" required>
        </div>
      </div>
       <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Cédula:</label>
        <div class="col-sm-10">
          <input type="text" name="cedula" required>
        </div>
      </div>

 <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Dirección:</label>
        <div class="col-sm-10">
          <input type="text" name="direccion" required>
        </div>
      </div>
       <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Edad:</label>
        <div class="col-sm-10">
          <input type="text" name="edad" required>
        </div>
      </div>
       <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Correo:</label>
        <div class="col-sm-10">
          <input type="text" name="correo" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Foto:</label>
        <div class="col-sm-10">
          <input type="file"  name="foto" required>
        </div>
      </div>
      <div class="form-group row" align="center">
        <div class="col-sm-10">
        <input  class="btn btn-warning" type="submit" name="submit" value="Registrar"/>
        </div>
      </div>

</form>
</div>
<?php include("../Home/Fin.php");?>