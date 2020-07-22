<?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
$id = $_POST['tradicion'];
$rating = $_POST['rating'];
$hit =0;
$rat=0;
$sumar = 0;
$newhits=0;
 $sql = "SELECT * FROM tradicion WHERE idTradicion = '$id'";
 $query = mysqli_query($con,$sql);  
              while ($row=mysqli_fetch_array($query))
                {
$hit = $row['hits'];
$rat = $row['rating'];
$sumar = $row['suma'];

               }
$newhits=0;

               $newhits=$hit+1;
$sentencia="UPDATE tradicion SET hits ='$newhits' WHERE idTradicion = '$id'";
		if(mysqli_query($con,$sentencia)){	
		}   
               $prerating = $rat + $rating;
               $newrating = $prerating / $newhits;



               $sentencia2="UPDATE tradicion SET rating ='$newrating' WHERE idTradicion = '$id'";
		if(mysqli_query($con,$sentencia2)){
			header("Location:tradicion.php");	
		}

 ?> 