<?php
require_once "../../functions/autoload.php";


$postData = $_POST;
$fileData = $_FILES['portada'] ?? FALSE;

$id = $_GET['id'] ?? false;

try {
     $comic = new Comic();

     if (!empty($fileData['tmp_name'])) {
        if (!empty($postData['portada_og'])) {
            (new Imagen())->borrarImagen(__DIR__."/../../img/covers/".$postData['portada_og'] );
        }
        $imagen = (new Imagen())->subirImagen(__DIR__."/../../img/covers",$fileData);

        $comic->reemplazar_imagen($imagen, $id);
     }
    




    $comic->edit(
        $postData['titulo'],
        $postData['personaje_principal_id'],
        $postData['serie_id'], 
        $postData['guionista_id'],
        $postData['artista_id'],
        $postData['volumen'],
        $postData['numero'],
        $postData['publicacion'], 
        $postData['origen'],
        $postData['editorial'],
        $postData['bajada'],
        $postData['precio'],
        $id );

        (new Alerta())->add_alerta("warning", "El comics se editó correctamente");    

    header('Location: ../index.php?sec=admin_comics');
} catch (\Exception $e) {

    echo $e->getMessage();
    die("No se pudo editar el Personaje");
}





?>