<?php


//incluir las clases

require_once "functions/autoload.php";


$secciones_validas = [
    "home"=> [
        "titulo" => "Bienvenidos"
    ],
    "envios" =>   [
        "titulo" => "Politica de envios"
    ],
    "quienes_somos" =>   [
        "titulo" => "¿Quienes Somos?"
    ],
    "comics" =>   [
        "titulo" => "Nuestro Catalogo"
    ],
    "producto" => [
        "titulo" => "Detalle de producto"
    ],
    "todos" =>  [
        "titulo" => "Detalle de producto"
    ]

];


$seccion = $_GET['sec'] ?? "home";


/* buscar si existe el  Indice del array ahora   */
if(!array_key_exists($seccion, $secciones_validas)){
    $vista = "404";
    $titulo = "404 - Pagina no encontrada";
}else {
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
}




?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tiendita de Comics ::  <?= $titulo ?> </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tienda Comic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=quienes_somos">¿Quienes somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=comics&pj=1">Ms. Marvel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=comics&pj=2">Hawkeye</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=comics&pj=3">She-Hulk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=envios">envios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=todos">Todos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">

  

    <?php 

    require file_exists("views/$vista.php") ? "views/$vista.php" : "views/404.php";
      

    ?>

        
    </main>
    <footer class="bg-secondary text-light text-center">
        Derechos Reservados - 2022
    </footer>
</body>

</html>