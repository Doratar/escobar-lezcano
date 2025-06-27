
<div class="container table-responsive">
    <h1>Detalle de Compra</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto Id</th>
                <th>Producto Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($detalles as $detalle): ?>
                <tr>
                    <td><?php echo $detalle['prodId'] ?></td>
                    <td><?php echo $detalle['prodNombre'] ?></td>
                    <td><?php echo $detalle['vdetallePrecio'] ?></td>
                    <td><?php echo $detalle['vdetalleCantidad'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>