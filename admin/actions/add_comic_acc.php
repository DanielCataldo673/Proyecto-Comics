<?php
require_once "../../functions/autoload.php";


$postData = $_POST;
$fileData = $_FILES['portada'];



try {
    $comic = new Comic();

    $imagen = (new Imagen())->subirImagen(__DIR__."/../../img/covers",$fileData);

    $idComic = $comic->insert(
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
        $imagen,
        $postData['precio'],

    );
 
    (new Alerta())->add_alerta("success", "El comics se cargo correctamente");


    header('Location: ../index.php?sec=admin_comics');
} catch (\Exception $e) {
    die("No se pudo cargar el Personaje");
}





?>