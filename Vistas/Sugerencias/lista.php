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
  
  <br>
  <br>
    <section>
      <table class="table">      
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Asunto</th>
            <th>Correo</th>
            <th>Mensaje</th>
            
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            require_once ("../../Sistema/bd/db.php");
            require_once ("../../Sistema/bd/conexion.php");
            $sql = "SELECT * FROM sugerencia";
            $query = mysqli_query($con,$sql);  
            while ($row=mysqli_fetch_array($query))
              {?>
              <tr>
                <td><?php echo $row['idSugerencia'];?></td>
                <td><?php echo $row['nombre_S'];?></td>
                <td><?php echo $row['asunto_S'];?></td>
                <td><?php echo $row['correo_S'];?></td>
                <td><?php echo $row['mensaje_S'];?></td>
            
                <td>
                  <a class="btn btn-dark" href="controlador.php?eliminar=true&id=<?php echo $row['idSugerencia'];?>"><i class="fas fa-trash-alt"> Eliminar</i></a>
                </td>
              </tr>
          <?php
            }?>
        </tbody>
      </table>
    </section>
</div>
<br>
<?php include("../Home/Fin.php");?>