<?php
$id= $_GET['id'] ?? FALSE;

$comic = (new Comic())->producto_x_id($id);

$personajes = (new Personaje())->lista_completa();
$series = (new Serie())->lista_completa();
$guionistas = (new Guionista())->lista_completa();
$artistas = (new Artista())->lista_completa();



?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-decoration-underline fst-italic text-center mb-5 fw-bold">Edición de datos de :
            <span class="danger"><?= $comic->nombre_completo()?></span>
        </h1>

        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_comic_acc.php?id=<?=$comic->getId()?>" method="POST" enctype="multipart/form-data">
                <!-- enctype poder cargar imagenes al servidor -->
            
            <div class="col-md-6 mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo"  value="<?= $comic->getTitulo() ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="serie_id" class="form-label">Serie</label>
                <select class="form-select" name="serie_id" id="serie_id" require> 
                    <option value="" >Elija una opción</option>

                    <?php foreach ($series as $S) { ?>
                        <option value="<?= $S->getId() ?>"  <?=  $S->getId() ==$comic->getSerie()->getId() ? "selected" : ""  ?>  ><?= $S->getNombre() ?></option>
                    <?php }?>    

                </select>

            </div>

            <div class="col-md-6 mb-3">
                <label for="personaje_principal_id" class="form-label">Personaje Principal</label>
                <select class="form-select" name="personaje_principal_id" id="personaje_principal_id" require> 
                    <option value="">Elija una opción</option>

                    <?php foreach ($personajes as $P) { ?>
                        <option value="<?= $P->getId() ?>"<?=  $P->getId() ==$comic->getPersonaje_Prinipal()->getId() ? "selected" : ""  ?>><?= $P->getTitulo() ?></option>
                    <?php }?>    

                </select>

            </div>

            <div class="col-md-4 mb-3">
                <label for="volumen" class="form-label">Volumen</label>
                <input type="number" class="form-control" id="volumen" name="volumen" value="<?= $comic->getVolumen()?>" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="number" class="form-control" id="numero" name="numero" value="<?= $comic->getNumero()?>" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="portada_og" class="form-label">Portada Actual</label>
                <img class="img-fluid rounred shadow-sm d-block" src="../img/covers/<?= $comic->getPortada()?>" alt="">
                <input type="hidden" class="form-control" id="portada_og" name="portada_og" value="<?= $comic->getPortada()?>">

            </div>

            <div class="col-md-4 mb-3">
                <label for="portada" class="form-label">Reemplazar Portada</label>
                <input type="file" class="form-control" id="portada" name="portada">

            </div>

            <div class="col-md-6 mb-3">
                <label for="publicacion" class="form-label">Publicación</label>
                <input type="date" class="form-control" id="publicacion" name="publicacion" value="<?= $comic->getPublicacion()?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="guionista_id" class="form-label">Guionista</label>
                <select class="form-select" name="guionista_id" id="guionista_id" require> 
                    <option value="">Elija una opción</option>

                    <?php foreach ($guionistas as $G) { ?>
                        <option value="<?= $G->getId() ?>"<?=  $G->getId() ==$comic->getGuionista()->getId() ? "selected" : ""  ?>><?= $G->getNombre_completo() ?></option>
                    <?php }?>    

                </select>

            </div>

            <div class="col-md-6 mb-3">
                <label for="artista_id" class="form-label">Artista</label>
                <select class="form-select" name="artista_id" id="artista_id" require> 
                    <option value="">Elija una opción</option>

                    <?php foreach ($artistas as $A) { ?>
                        <option value="<?= $A->getId() ?>"<?=  $A->getId() == $comic->getArtista()->getId() ? "selected" : ""  ?>><?= $A->getNombre_completo() ?></option>
                    <?php }?>    

                </select>

            </div>

            <div class="col-md-4 mb-3">
                <label for="origen" class="form-label">Origen</label>
                <select name="origen" id="origen" class="form-select" require>
                    <option value="" selected disabled>Elija una opción</option>
                    <option <?= $comic->getOrigen() == "Estados Unidos" ? "selected" : "" ?>>Estados Unidos</option>
                    <option <?= $comic->getOrigen() == "Europa" ? "selected" : "" ?>>Europa</option>
                    <option <?= $comic->getOrigen() == "Argentina" ? "selected" : "" ?>>Argentina</option>
                </select>

            </div>

            <div class="col-md-4 mb-3">
                <label for="editorial" class="form-label">Editorial</label>
                <input type="text" class="form-control" id="editorial" name="editorial" value="<?= $comic->getEditorial()?>" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= $comic->getPrecio()?>" required>
            </div>

            <div class="col-md-12 mb-3">
                <label for="bajada" class="form-label">Bajada</label>
                <textarea class="form-control" name="bajada" id="bajada"><?= $comic->getBajada()?>"</textarea>
            </div>

                
            </div>
                <button type="submit" class="btn btn-info">Editar</button>
            </form>
        </div>
    </div>
</div>