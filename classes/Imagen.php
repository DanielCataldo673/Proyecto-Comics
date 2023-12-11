<?php
class Imagen{
    public function subirImagen($directorio, $datosArchivo) : string {
        if (!empty($datosArchivo['tmp_name'])) {
            //le damos un nuevo nombre
            $og_name = (explode("." , $datosArchivo['name']));
            $extension = end($og_name);
            $filename = time() . ".$extension";


            $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");

            if (!$fileUpload) {
                throw new Exception("No se puede subir la imagen");
                
            }else {
                return $filename;
            }
        }
    }

    /* Borrar imagen */

    public function borrarImagen($archivo){
        if (file_exists($archivo)) {
            $fileDelete = unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se puede borrar la imagen");
                
            }else {
                return TRUE;
            }
        }else {
            return FALSE;
        }
    }


}


?>