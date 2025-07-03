<div class="container table-responsive">
    <div class="row">
        <div class="col-md-6">
            <h2>Ventas</h2>
        </div>

    </div>
    <table id="tablaVentas" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente Nombre</th>
                <th>Cliente Apellido</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta): ?>
            <tr>
                <td><?php echo $venta['ventasId']; ?></td>
                <td><?php echo $venta['ventasFecha']; ?></td>          
                <td><?php echo $venta['UsuarioNombre']; ?></td>
                <td><?php echo $venta['UsuarioApellido']; ?></td>
                <td><?php echo $venta['ventasTotal']; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/ventas/detalle/' . $venta['ventasId']); ?>" class="btn btn-warning">Ver Detalle</a>        
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>