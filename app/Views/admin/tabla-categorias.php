<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Tabla de Categorias</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="<?php echo base_url('/admin/categorias/crear') ?>" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> Agregar Categoria
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?php echo $categoria['cateId']; ?></td>
                <td><?php echo $categoria['cateNombre']; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/categorias/editar/' . $categoria['cateId']); ?>" class="btn btn-warning">Editar</a>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>