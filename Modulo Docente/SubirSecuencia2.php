<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doguito Petshop | Cadastro de cliente</title>
    <link rel="icon" href="../assets/img/doguitoadm.svg" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"/>
    <!-- Archivos CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Archivos JS de Bootstrap (junto con las dependencias de Popper.js y jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="../assets/css/base/base.css">
    <!-- <link rel="stylesheet" href="../assets/css/base/base.css" /> -->
    <link rel="stylesheet" href="../assets/css/componentes/header.css" />
    <link rel="stylesheet" href="../assets/css/componentes/card.css" />
    <link rel="stylesheet" href="../assets/css/register_client.css" />
    <link rel="stylesheet" href="../assets/css/componentes/inputs.css" />
    <link rel="stylesheet" href="../assets/css/componentes/button.css" />
  </head>
  <body>
  <?php
include("nav2.html");
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivosSecuencia/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $db=new Conect_MySql();
            $sql = "INSERT INTO tbl_documentos_Secuencia(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";
            $query = $db->execute($sql);
            if($query){
              ?> 
                <h3 class="ok">¡Se ha registrado correctamente!</h3>
               <?php
            } else {
                ?> 
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                <?php
            }
        } else {
        ?> 
        <h3 class="bad">¡Por favor complete los campos!</h3>
        <?php
    }     
}
}
?>

    <main class="container flex flex--center flex--column">
      <section class="card cadastro">
        <h1 class="card__title">SECUENCIA PDF</h1>

        <!-- pongo LO DE POST -->
        <form method="POST" class="flex flex--column" data-form enctype="multipart/form-data">
   
     
          <div class="input-container">
            <input name="titulo" id="titulo" class="input" type="text" placeholder="Titulo" required data-email/>
            <label for="exampleFormControlFile1" class="input-label" >Titulo</label>
            <span class="input-menssage-error">Este campo es requerido</span>
          </div>


          <div class="input-container">
            <input name="descripcion" id="descripcion" class="input" type="text" placeholder="Descripción" required data-email/>
            <label for="exampleFormControlFile1"  class="input-label">Descripción</label>
            <span class="input-menssage-error">Este campo es requerido</span>
          </div>

          <div class="input-container">
            <input name="archivo" id="archivo" class="input" type="file" placeholder="archivo" required data-email/>
            <!-- <label class="input-label" for="archivo">Nombre Cuatrimestre</label>
            <span class="input-menssage-error">Este campo es requerido</span> -->
          </div>
          <button type="submit" name="subir" class="button">Registrar</button>
          <button type="submit"  class="button"><a href="ConsultalistaSecuencia.php" >Consultar</button>
    
        </form>
      </section>
    </main>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"
      integrity="sha512-UNM1njAgOFUa74Z0bADwAq8gbTcqZC8Ej4xPSzpnh0l6KMevwvkBvbldF9uR++qKeJ+MOZHRjV1HZjoRvjDfNQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script type="module" src="../controllers/registro.controller.js"></script>
  </body>
</html>
