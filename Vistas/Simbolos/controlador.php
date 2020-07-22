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
		$sentencia="INSERT INTO simbolos (Parroquia_idParroquia,nombre_S,descripcion_S,imagen_S) VALUES (".$_POST['parroquia'].", '".$_POST['nombre']."', '".$_POST['descripcion']."', '".$ruta."')";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if($_POST['ver']=="modificar"){
		$nombreimg=$_FILES['foto']['name'];
	    $tem=$_FILES['foto']['tmp_name'];
	    $ruta=file_get_contents($tem);
	    $ruta=base64_encode($ruta);
		$sentencia="UPDATE simbolos SET  Parroquia_idParroquia='".$_POST['parroquia']."', nombre_S='".$_POST['nombre']."', descripcion_S= '".$_POST['descripcion']."', imagen_S='".$ruta."' WHERE idSimbolos='".$_POST['id']."' ";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM simbolos WHERE idSimbolos=".$_GET['id']."";
		mysqli_query($con,$sentencia); 
		header("Location:lista.php");	
	}
?>