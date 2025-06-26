<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Mis Compras</h2>
        </div>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta): ?>
            <tr>
                <td><?php echo $venta['ventasId']; ?></td>
                <td><?php echo $venta['ventasFecha']; ?></td>

                <td><?php echo $venta['ventasTotal']; ?></td>
                <td>
                    <a href="<?php echo base_url('cliente/compras/verCompras/detalle/' . $venta['ventasId']); ?>" class="btn btn-warning">Ver Detalle</a>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>