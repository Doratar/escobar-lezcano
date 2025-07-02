<div class="container table-responsive">
    <div class="row">
        <div class="col-md-6">
            <h2>Tabla de Productos</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="<?php echo base_url('/admin/productos/crear') ?>" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> Agregar Producto
            </a>
        </div>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <?php if(!$producto['prodActivo']): ?>
            <tr class="table-danger">
            <?php else: ?>
            <tr>
            <?php endif;?>
                <td><?php echo $producto['prodId']; ?></td>
                <td><?php echo $producto['prodNombre']; ?></td>
                <td><?php echo $producto['prodDescripcion']; ?></td>
                <td><?php echo $producto['prodPrecio']; ?></td>
                <td><?php echo $producto['prodMarca']; ?></td>
                <td><?php echo $producto['prodStock']; ?></td>
                <td>
                    <img src="<?php echo base_url('assets/uploads/' . $producto['prodImagenURL']); ?>" alt="Imagen del producto" width="60" height="60">
                </td>
                <td>
                    <a href="<?php echo base_url('admin/productos/editar/' . $producto['prodId']); ?>" class="btn btn-warning">Editar</a>
                    <?php if($producto['prodActivo']): ?>
                        <a href="<?php echo base_url('admin/productos/eliminar/' . $producto['prodId']); ?>" class="btn btn-danger">Eliminar</a>
                    <?php else: ?>
                        <a href="<?php echo base_url('admin/productos/activar/' . $producto['prodId']); ?>" class="btn btn-success">Activar</a>
                    <?php endif?>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>