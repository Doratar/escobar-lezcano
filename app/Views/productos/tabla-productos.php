<div class="container">
    <h2>Tabla de Productos</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['prodId']; ?></td>
                <td><?php echo $producto['prodNombre']; ?></td>
                <td><?php echo $producto['prodDescripcion']; ?></td>
                <td><?php echo $producto['prodPrecio']; ?></td>
                <td><?php echo $producto['prodMarca']; ?></td>
                <td>
                    <a href="<?php echo base_url('productos/editar/' . $producto['prodId']); ?>" class="btn btn-warning">Editar</a>
                    <a href="<?php echo base_url('productos/eliminar/' . $producto['prodId']); ?>" class="btn btn-danger">Eliminar</a>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>