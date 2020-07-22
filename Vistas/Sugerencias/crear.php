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
            <li class="breadcrumb-item active">Sugerencias</li>
          </ol>
<form action="controlador.php" method="POST" name="form">
      
      <input class="form-control" type="hidden" name="ver" value="crear">

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Asunto:</label>
        <div class="col-sm-10">
          <input type="text" name="asunto" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Correo:</label>
        <div class="col-sm-10">
          <input type="email"  name="correo" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mensaje:</label>
        <div class="col-sm-10">
          <input type="text"  name="mensaje" required>
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