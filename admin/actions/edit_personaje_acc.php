<?php
require_once "../../functions/autoload.php";


$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;

$id = $_GET['id'] ?? false;

try {
     $personaje = new Personaje();

     if (!empty($fileData['tmp_name'])) {
        if (!empty($postData['imagen_og'])) {
            (new Imagen())->borrarImagen(__DIR__."/../../img/personjes/".$postData['imagen_og'] );
        }
        $imagen = (new Imagen())->subirImagen(__DIR__."/../../img/personajes",$fileData);

        $personaje->reemplazar_imagen($imagen, $id);
     }
    




    $personaje->edit($postData['nombre'],$postData['alias'],$postData['creador'], $postData['primera_aparicion'],$postData['bio'],$id);
    (new Alerta())->add_alerta("warning", "El personaje se editó correctamente");

    

    header('Location: ../index.php?sec=admin_personajes');
} catch (\Exception $e) {

    echo $e->getMessage();
    die("No se pudo editar el Personaje");
}





?>