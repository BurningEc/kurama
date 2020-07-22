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
	    $nombreimg=$_FILES['foto']['name'];
	    $tem=$_FILES['foto']['tmp_name'];
	    $ruta=file_get_contents($tem);
	    $ruta=base64_encode($ruta);
		$sentencia="INSERT INTO foto (Parroquia_idParroquia,nombre_F,descripcion_F,imagen_F) VALUES (".$_POST['parroquia'].", '".$_POST['nombre']."', '".$_POST['descripcion']."', '".$ruta."')";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if($_POST['ver']=="modificar"){
		$nombreimg=$_FILES['foto']['name'];
	    $tem=$_FILES['foto']['tmp_name'];
	    $ruta=file_get_contents($tem);
	    $ruta=base64_encode($ruta);
		$sentencia="UPDATE foto SET  Parroquia_idParroquia='".$_POST['parroquia']."', nombre_F='".$_POST['nombre']."', descripcion_F= '".$_POST['descripcion']."', imagen_F='".$ruta."' WHERE idFoto='".$_POST['id']."' ";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}else{
			echo 'Error';
		}	
	}
	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM foto WHERE idFoto=".$_GET['id']."";
		mysqli_query($con,$sentencia); 
		header("Location:lista.php");	
	}
?>