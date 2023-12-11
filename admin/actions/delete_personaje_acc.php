<?php
require_once "../../functions/autoload.php";
 $id = $_GET['id'] ?? FALSE;

 $personaje = (new Personaje())->get_x_id($id);

 try {
    if (!empty($personaje->getImagen())) {
        (new Imagen())->borrarImagen(__DIR__."/../../img/peronajes/".$personaje->getImagen() );
    }

    $personaje->delete();

    (new Alerta())->add_alerta("danger", "El personaje se elimino correctamente");


    header('Location: ../index.php?sec=admin_personajes');


 } catch (\Exception $e) {
    die("No se pudo eliminar el personaje");
 }


 
?>