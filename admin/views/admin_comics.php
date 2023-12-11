<?php
$comics = (new Comic())->catalogo_completo();







?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <header>
        <h1 class="mt-5 ms-3 text-decoration-underline fst-italic text-center">Administración de Comics</h1>
    </header>
    <div class="container">

        <div class="row mt-3">

        <div>
        <?= (new Alerta())->get_alertas() ?>
        </div>
             

            <table class="table table-info table-striped">
                <tr>
                    <th scope="col" width="15%">Portada</th>
                    <th scope="col" width="15%">Nombre</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Bajada</th>
                    <th scope="col">Guion</th>
                    <th scope="col">Arte</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                    
                </tr>
                <?php foreach ($comics as $C) {  ?>
                    <tr>
                        <td><img src="../img/covers/<?= $C->getPortada(); ?>" alt="" class="img-fluid rounred shadow-sm"></td>
                        <th scope="row"><?= $C->nombre_completo() ?></th>
                        <td><?= $C->getTitulo(); ?></td>
                        <td><?= $C->getBajada(); ?></td>
                        <td><?= $C->getGuion(); ?></td>
                        <td><?= $C->getArte(); ?></td>
                        <td><?= $C->getPrecio(); ?></td>
                        <td>
                            <a class="btn btn-outline-info btn-sm" href="index.php?sec=edit_comic&id=<?= $C->getId() ?>">Editar</a>

                            <a class="btn btn-outline-danger btn-sm mt-2" href="index.php?sec=delete_comic&id=<?= $C->getId() ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <a class="btn btn-info mt-5 mb-3" href="index.php?sec=add_comic">Cargar Nuevo Comics</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>