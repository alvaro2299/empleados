<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>ALTA PRODUCTOS - Nombre del alumno</h1>
<?php
include "conexion.php";


/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">Datos Producto</div>
<div class="card-body">
		<div class="form-group">
        ID PRODUCTO <input type="text" name="id" placeholder="idproducto" class="form-control">
        </div>
		<div class="form-group">
        NOMBRE PRODUCTO <input type="text" name="nombre" placeholder="nombre" class="form-control">
        </div>
		<div class="form-group">
        PRECIO PRODUCTO <input type="text" name="precio" placeholder="precio" class="form-control">
        </div>
	<div class="form-group">
	<label for="categoria">Categorías:</label>
    <?php
$arraycategoria=vercategoria($db);
     echo ("<select name='categoria'><br>");
       foreach ($arraycategoria as $categoria) {
           echo("<option> $categoria </option>");
       } 
  echo("</select>");
        ?>
	</div>
	</BR>
<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 

	// Aquí va el código al pulsar submit
    $id_producto=$_POST["id"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $nombre_categoria=$_POST["categoria"];
    
    $buscar_codigo="SELECT ID_CATEGORIA from CATEGORIA where nombre='$nombre_categoria'";
   
    $idk=mysqli_query($db,$buscar_codigo);
    $fila=mysqli_fetch_assoc($idk);
    $codigo_departamento=$fila['ID_CATEGORIA'];
    
    $insertar="INSERT INTO PRODUCTO (ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA) values('$id_producto','$nombre','$precio','$codigo_departamento')";
    
    if(mysqli_query($db,$insertar)){
 echo ('<script language="javascript">alert("Creado correctamente")</script>');
    }
    else{
         echo ('<script language="javascript">alert("error")</script>');
    }
}
?>

<?php
// Funciones utilizadas en el programa

function vercategoria($db){
    $categoria=array();
    $sql = "SELECT NOMBRE FROM CATEGORIA";
    $resultado=mysqli_query($db,$sql);
    if($resultado){
        while($fila=mysqli_fetch_assoc($resultado)){

        $categoria[]=$fila['NOMBRE'];
            }
    }
    return $categoria;
}
	




?>



</body>

</html>
