
<div class="container table-responsive">
    <h1>Detalle de Compra</h1>
    <table id="tablaComprasDetalle" class="table">
        <thead>
            <tr>
                <th>Producto Id</th>
                <th>Producto Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $total = 0;
                foreach($detalles as $detalle): 
                    $subtotal = $detalle['vdetallePrecio'] * $detalle['vdetalleCantidad'];
                    $total += $subtotal;
                    ?>
                <tr>
                    <td><?php echo $detalle['prodId'] ?></td>
                    <td><?php echo $detalle['prodNombre'] ?></td>
                    <td>
                        <img src="<?php echo base_url('assets/uploads/' . $detalle['prodImagenURL']); ?>" alt="Imagen del producto" width="60" height="60">
                    </td>
                    <td><?php echo $detalle['vdetallePrecio'] ?></td>
                    <td><?php echo $detalle['vdetalleCantidad'] ?></td>
                    <td>
                        $<?php 
                            $subtotal = $detalle['vdetallePrecio'] * $detalle['vdetalleCantidad'];
                            echo number_format($subtotal, 2, ',', '.');
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-end fw-bold">Total</td>
                <td class="fw-bold text-end">$<?php echo number_format($total, 2, ',', '.') ?></td>
            </tr>
        </tfoot>
    </table>
</div>