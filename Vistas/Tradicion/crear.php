<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>
<?php include("../Home/Inicio.php");?>
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../Home/Home.php">Administración</a>
    </li>
    <li class="breadcrumb-item active">Historial</li>
    </ol>
    </br>
    <form method="post" action="controlador.php" enctype="multipart/form-data">
         <input class="form-control" type="hidden" name="ver" value="crear">
        <table class="table">
            <tr>
                <td width="20"  style=" font-size: 25px;margin: auto;">Paciente:</td><td> 
                <select name="parroquia" class="form-control">
                    <?php
                      require_once ("../../Sistema/bd/db.php");
                      require_once ("../../Sistema/bd/conexion.php");
                      $sql = "SELECT * FROM parroquia";
                      $query = mysqli_query($con,$sql);  
                      while ($row=mysqli_fetch_array($query))
                        {
                        ?>
                        <option value="<?php echo $row['idParroquia'];?>"><?php echo $row['nombre_P'];?></option>
                    <?php
                        }?>
                </select>
                </td>
            </tr>
        </table>
          <hr>
        <table class="table">
            <tr>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Observación</th>
            </tr>
            <tr>
                <th>
                    <select id="itemtipo" name="itemtipo" class="form-control">
                    <?php
                      $sql = "SELECT * FROM tipotradicion";
                      $query = mysqli_query($con,$sql);  
                      while ($row=mysqli_fetch_array($query))
                        {
                        ?>
                        <option value="<?php echo $row['idTipo_T'];?>"><?php echo $row['nombre_T'];?></option>
                    <?php
                        }?>
                    </select>
                </th>
                <th><input placeholder="Fecha" type="text" name="itemnombre"
                        id="itemnombre" class="form-control"  /></th>
                <th><input placeholder="Observación" type="text" name="itemdescripcion" id="itemdescripcion" class="form-control" /></th>               
                <th><input class="btn btn-info" type="button" id="anadir" name="anadir" value="Añadir"></th>
            </tr>
        </table>
          <hr>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Observación</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="itemlist"></tbody>
        </table>
        <input type="submit" style="float: right;margin-right: 60px;" class="btn btn-warning" value="Guardar">
</form>

<script type="text/javascript"
  src="https://code.jquery.com/jquery-2.0.2.min.js"
 ></script>
	<script type="text/javascript">
	$("tbody#itemlist").on("click","#borrar",function(){
	    $(this).parent().parent().remove();
	});

    function clear (){
        $("#itemnombre").val("");
        $("#itemdescripcion").val("");
    }

    $('#anadir').on('click', function(e) {
	    e.preventDefault();
    var itemtipo = $("#itemtipo").val();
    var itemnombre=$("#itemnombre").val();
    var itemdescripcion=$("#itemdescripcion").val();
    var nombreTipo;
    if(itemnombre==""){
        alert('Ingrese un Nombre');
    }else{
      if(itemdescripcion==""){
        alert('Ingrese una Descripción');
      }else{
        <?php
            $sql = "SELECT * FROM tipotradicion";
            $query = mysqli_query($con,$sql);  
            while ($row=mysqli_fetch_array($query))
            {?>   
        var idTipo='<?php echo $row['idTipo_T'];?>';
        if(idTipo==itemtipo){
            nombreTipo='<?php echo $row['nombre_T'];?>';
        }                
        <?php
        }?>
        var items = "";
        items += "<tr>";
        items += "<td><input type='hidden' name='item[tipo][]' value='"+ itemtipo +"'>"+nombreTipo+"</td>";
        items += "<td><input type='hidden' name='item[nombre][]' value='"+ itemnombre +"'>"+itemnombre +"</td>";
        items += "<td><input type='hidden' name='item[descripcion][]' value='"+ itemdescripcion +"'>"+itemdescripcion +"</td>";
        items += "<td width='20'><input class='form-control' type='file' name='image[]'></td>";
        items += "<td width='20'><input type='button' id='borrar' name='borrar' value='Eliminar' class='btn btn-dark'></td>";
        items += "</tr>";

        if ($("tbody#itemlist tr").length == 0)
        {
            $("#itemlist").append(items);
            clear();
        }else{
                $("#itemlist").append(items);
                clear();
                return false;
        }

      }  
    }
	});
</script>
<?php include("../Home/Fin.php");?>