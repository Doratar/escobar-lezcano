<div class="container">
    <h1>Tu carrito</h1>
    <?php if (sizeof($cart) > 0 ): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo ($item['price']); ?></td>
                        <td><?php echo ($item['qty']); ?></td>
                        <td><a href="<?php echo base_url('carrito_eliminar/'), $item['rowid'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <h1>El carrito está vacío.</h1>
            <?php endif; ?>
        </tbody>
    </table>
</div>