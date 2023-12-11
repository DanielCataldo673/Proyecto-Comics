<?php
session_start();

function autoloadClases($nombreClase){

/* Ruta absoluta, variable Magica DIR -> carpeta base donde estoy ejecutando */

$archivoClase = __DIR__ . "/../classes/" . $nombreClase . ".php";


if(file_exists($archivoClase)){
    require_once $archivoClase;
}



}



spl_autoload_register('autoloadClases')




?>