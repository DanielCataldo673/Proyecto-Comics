<?php
$personajes = (new Personaje())->lista_completa();




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
        <h1 class="mt-5 ms-3 text-decoration-underline fst-italic text-center">Listado de Personajes</h1>
    </header>
    <div class="container">



        <div class="row mt-3">
        <div>
        <?= (new Alerta())->get_alertas() ?>
        </div>

            <table class="table table-info table-striped">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Creador</th>
                    <th scope="col">Biografia</th>
                    <th scope="col">Acciones</th>
                    
                </tr>
                <?php foreach ($personajes as $personaje) {  ?>
                    <tr>
                        <td><img src="../img/personajes/<?= $personaje->getImagen(); ?>" alt="" class="img-fluid rounred shadow-sm"></td>
                        <th scope="row"><?= $personaje->getId() ?></th>
                        <td><?= $personaje->getNombre(); ?></td>
                        <td><?= $personaje->getAlias(); ?></td>
                        <td><?= $personaje->getCreador(); ?></td>
                        <td><?= $personaje->getBiografia(); ?></td>
                        <td>
                            <a class="btn btn-outline-info btn-sm" href="index.php?sec=edit_personaje&id=<?= $personaje->getId() ?>">Editar</a>

                            <a class="btn btn-outline-danger btn-sm mt-2" href="index.php?sec=delete_personaje&id=<?= $personaje->getId() ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <a class="btn btn-info mt-5 mb-3" href="index.php?sec=add_personaje">Cargar Nuevo Personaje</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>