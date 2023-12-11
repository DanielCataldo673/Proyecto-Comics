<div class="row my-5">
    <div class="col">
        <h1 class="text-decoration-underline fst-italic text-center mb-5 fw-bold">Agregar Nuevo Personaje</h1>

        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_personaje_acc.php" method="POST" enctype="multipart/form-data">
                <!-- enctype poder cargar imagenes al servidor -->
            
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="alias" class="form-label">Alias</label>
                <input type="text" class="form-control" id="alias" name="alias" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="primera_aparicion" class="form-label">Primera Aparición</label>
                <input type="number" class="form-control" id="primera_aparicion" name="primera_aparicion" required>
                <div class="form-text">Ingresar el año con 4 dígitos</div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="creador" class="form-label">Creador(es)</label>
                <input type="text" class="form-control" id="creador" name="creador" required>
                <div class="form-text">En caso e que sean nultiples creadores, separar los nombres con comas.</div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="bio" class="form-label">Biografia</label>
                <textarea name="bio" id="bio" class="form-control" require></textarea>
                
            </div>
                <button type="submit" class="btn btn-info">Cargar</button>
            </form>
        </div>
    </div>
</div>