<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>ALTA CATEGORÍAS - Nombre del alumno</h1>
<?php
include "conexion.php";


/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	
	
    /* Se inicializa la lista valores*/
	echo '<form action="comaltacat.php" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">Datos Categoría</div>
<div class="card-body">
		<div class="form-group">
        ID CATEGORIA <input type="text" name="id" placeholder="idcategoria" class="form-control">
        </div>
		<div class="form-group">
        NOMBRE CATEGORIA <input type="text" name="nombre" placeholder="nombre" class="form-control">
        </div>

		</BR>
<?php
	echo '<div><input type="submit" value="Alta Categoría"></div>
	</form>';
} else { 
    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
	// Aquí va el código al pulsar submit
    $crear_categoria="INSERT into categoria (ID_CATEGORIA,NOMBRE) values('$id','$nombre')";
    
    if(mysqli_query($db,$crear_categoria)){
        echo ('<script language="javascript">alert("Creado correctamente")</script>');
    }
    else{
        echo mysqli_error();
    }
}
?>

<?php
// Funciones utilizadas en el programa



	




?>



</body>

</html>
