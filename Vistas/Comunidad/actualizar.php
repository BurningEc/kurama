<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>

<?php
  $consulta=Consultar($_GET['id']);
  function Consultar($id)
  {
    require_once ("../../Sistema/bd/db.php");
    require_once ("../../Sistema/bd/conexion.php");
    $sentencia="SELECT * FROM comunidad WHERE idComunidad='".$id."' ";
    $resultado=mysqli_query($con,$sentencia);
    $filas=mysqli_fetch_assoc($resultado);
    return [
      $filas['Parroquia_idParroquia'],
      $filas['nombre_C'],
      $filas['descripcion_C']
    ];
  }
?>
<?php include("../Home/Inicio.php");?>
<div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../Home/Home.php">Administración</a>
            </li>
            <li class="breadcrumb-item active">Comunidades</li>
          </ol>
<form action="controlador.php" method="POST" name="form" enctype="multipart/form-data" >
      
      <input class="form-control" type="hidden" name="ver" value="modificar">
      <input class="form-control" type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <div class="form-group row" >
        <legend  style="font-size: 18pt"><b>Registro</b></legend>
        <label for="inputEmail3" class="col-sm-2 col-form-label">Parroquia</label>
        <select name="parroquia" required>
            <?php
              include '../../Sistema/bd/db.php';
              include '../../Sistema/bd/conexion.php';
              $sql = "SELECT * FROM parroquia";
              $query = mysqli_query($con,$sql);  
              while ($row=mysqli_fetch_array($query))
                {
                ?>
                <?php if($row['idParroquia']==$consulta[0]){?>
              <option value="<?php echo $row['idParroquia'];?>" selected><?php echo $row['nombre_P'];?></option>
                <?php
                  }else{?>
              <option value="<?php echo $row['idParroquia'];?>"><?php echo $row['nombre_P'];?></option>
                <?php
                  }?>
            <?php
                }?>
        </select>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" value="<?php echo $consulta[1]?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Descripcion:</label>
        <div class="col-sm-10">
          <input type="text" name="descripcion" value="<?php echo $consulta[2]?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Imagen:</label>
        <div class="col-sm-10">
          <input type="file" name="foto" required>
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