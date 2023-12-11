<?php
$id = $_GET['id'] ?? false;

$comic = (new Comic())->producto_x_id($id);


?>
<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold text-decoration-underline fst-italic">¿Está seguro que desea eliminar el personaje?</h1>

        <a class="btn btn-outline-danger d-block mt-4" href="actions/delete_comic_acc.php?id=<?= $comic->getId() ?>">Eliminar</a>

    

</div>