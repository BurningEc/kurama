<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>
<?php
    require_once ("../../Sistema/bd/db.php");
    require_once ("../../Sistema/bd/conexion.php");
	   
    if($_POST['ver']=="crear"){ 
    	$detail = $_POST["item"];
		$parroquia = $_POST["parroquia"];

    	for ($i = 0; $i < sizeof($detail['tipo']); $i++) {

    		$nombreimg=$_FILES['image']['name'][$i];
		    $tem=$_FILES['image']['tmp_name'][$i];
		    $ruta=file_get_contents($tem);
		    $ruta=base64_encode($ruta);
			$sentencia="INSERT INTO tradicion (TipoTradicion_idTipoTradicion,nombre_T,descripcion_T,imagen_T) VALUES (".$detail['tipo'][$i].", '".$detail['nombre'][$i]."', '".$detail['descripcion'][$i]."', '".$ruta."')";
			echo "".$sentencia;
			if(mysqli_query($con,$sentencia)){

				$id_tra = mysqli_insert_id($con);
				$sentencia1="INSERT INTO parroquia_detalle (Parroquia_idParroquia,Tradicion_idTradicion) VALUES (".$parroquia.", '".$id_tra."')";
				echo "".$sentencia1;
				if(mysqli_query($con,$sentencia1)){
			        header("Location:lista.php");	
				}
				
		    }
        }	
	}

	if($_POST['ver']=="modificar"){ 
		    $nombreimg=$_FILES['foto']['name'];
		    $tem=$_FILES['foto']['tmp_name'];
		    $ruta=file_get_contents($tem);
		    $ruta=base64_encode($ruta);
			$sentencia="UPDATE tradicion  SET TipoTradicion_idTipoTradicion='".$_POST['tipo']."', nombre_T='".$_POST['nombre']."',descripcion_T='".$_POST['descripcion']."',imagen_T='".$ruta."' WHERE idTradicion=".$_POST['id']."";
			if(mysqli_query($con,$sentencia)){
				$sentencia1="UPDATE parroquia_detalle SET Parroquia_idParroquia='".$_POST["parroquia"]."' where Tradicion_idTradicion=".$_POST['id']."";
				if(mysqli_query($con,$sentencia1)){
			        header("Location:lista.php");	
			    }	
		    }
	}

	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM parroquia_detalle WHERE Tradicion_idTradicion=".$_GET['id']."";
		mysqli_query($con,$sentencia);
		$sentencia1="DELETE  FROM tradicion WHERE idTradicion=".$_GET['id']."";
		mysqli_query($con,$sentencia1); 
		header("Location:lista.php");	
	}

	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM parroquia WHERE idParroquia=".$_GET['id']."";
		mysqli_query($con,$sentencia); 
		header("Location:lista.php");	
	}
?>