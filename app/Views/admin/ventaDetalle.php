<div class="container">
    <h1>Detalle de venta</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto Id</th>
                <th>Producto Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($detalles as $detalle): ?>
                <tr>
                    <td><?php echo $detalle['prodId'] ?></td>
                    <td><?php echo $detalle['prodNombre'] ?></td>
                    <td>
                        <img src="<?php echo base_url('assets/uploads/' . $detalle['prodImagenURL']); ?>" alt="Imagen del producto" width="60" height="60">
                    </td>
                    <td><?php echo $detalle['vdetallePrecio'] ?></td>
                    <td><?php echo $detalle['vdetalleCantidad'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>