<?php
$id = $_GET['id'] ?? false;

$personaje = (new Personaje())->get_x_id($id);


?><div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold text-decoration-underline fst-italic">¿Está seguro que desea eliminar el personaje?</h1>


    <div class="col-12 col-md-6">
        <img class="img-fluid rounred shadow-md d-block mx-auto mb-3" src="../img/personajes/<?= $personaje->getImagen()?>" alt="">
    </div>

    <div class="col-12 col-md-6">
        <h2 class="fs-6 text-decoration-underline fst-italic">Nombre</h2>
        <p><?= $personaje->getNombre()?></p>

        <h2 class="fs-6 text-decoration-underline fst-italic">Alias</h2>
        <p><?= $personaje->getAlias()?></p>

        <h2 class="fs-6 text-decoration-underline fst-italic">Creador</h2>
        <p><?= $personaje->getCreador()?></p>

        <h2 class="fs-6 text-decoration-underline fst-italic">Biografia</h2>
        <p><?= $personaje->getBiografia()?></p>

        <h2 class="fs-6 text-decoration-underline fst-italic">Primera Aparicion</h2>
        <p><?= $personaje->getPrimera_aparicion()?></p>

        <a class="btn btn-outline-danger d-block mt-4" href="actions/delete_personaje_acc.php?id=<?= $personaje->getId() ?>">Eliminar</a>

    </div>

</div>