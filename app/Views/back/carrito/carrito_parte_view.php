<div class="container">
    <h1>Tu carrito guacho</h1>
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
                        <td><a href="<?php echo base_url('eliminarItem/'), $item['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            
        </tbody>
    </table>
</div>