<?php
include("../db.php");
$consulta = "SELECT*FROM tbl_documentos_Secuencia";
?>
<!doctype html>
<html lang="en">
  <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Archivos CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Archivos JS de Bootstrap (junto con las dependencias de Popper.js y jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    
        <meta charset="utf-8">
        <title>Consulta de PDF</title>
        <link rel="stylesheet" href="../style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcute icon" type="image/x-icon" href="../img/logo2.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- CSS INTERNO -->
    <style>
    .body{
    margin:0;
    padding:0;
    font-family: Arial;
    
    }

    .navbar{
    background-color: #fff;
    padding: 20px 0px;
    }

    .navbar-nav li:hover>ul.dropdown-menu{
    display: block;
    }

    .dropdown-submenu{
    position: relative;
    }

    .dropdown-submenu>.dropdown-menu{
    top:0;
    margin-top:-5px;
    left:100%;
    }
    </style>
</head>
<body> 
<?php
include("nav2.html");
?>


    <!-- Consultar Secuencia PDF-->

    <div class="table-responsive">
    <table class="table table-bordered">
<thead>
  
<table class="table table-striped">
  <thead>
  <tr   class="bg-primary">
      <th scope="col">Titulo</th>
      <th scope="col">Descripción</th>
      
      <th scope="col">Nombre del archivo</th>
  
  
  </thead>
<tbody>
<?php
$resultado = mysqli_query($conexion,$consulta);
while($datos=mysqli_fetch_assoc($resultado)) {
  ?>
    <tr class="table-active">
        <td><?php echo $datos["titulo"];?></td> 
        <td><?php echo $datos["descripcion"];?></td>
      
        
        <td><a href="archivoSecuencia.php?id=<?php echo $datos['id_documento_Secuencia']?>"><?php echo $datos['nombre_archivo']; ?></a></td>
       
    </tr>

  <?php 
} mysqli_free_result($resultado);
  ?>
</tbody>

</table>
    <form action="SubirSecuencia.php">
        <input type="submit" value="Volver" />
</form> 