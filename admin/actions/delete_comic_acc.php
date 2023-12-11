<?php
require_once "../../functions/autoload.php";
 $id = $_GET['id'] ?? FALSE;

 $comic = (new Comic())->producto_x_id($id);

 try {
    if (!empty($comic->getPortada())) {
        (new Imagen())->borrarImagen(__DIR__."/../../img/covers/".$comic->getPortada() );
    }

    $comic->delete();

    (new Alerta())->add_alerta("danger", "El comics se elimino correctamente");

    header('Location: ../index.php?sec=admin_comics');


 } catch (\Exception $e) {
    die("No se pudo eliminar el personaje");
 }


 
?>