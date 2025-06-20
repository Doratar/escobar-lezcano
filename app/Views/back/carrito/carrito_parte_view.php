<div class="container">
    <h1>Tu carrito</h1>
    <?php if (sizeof($cart) > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php $gran_total = 0 ?>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo ($item['price']); ?></td>
                        <td><?php echo ($item['qty']); ?></td>
                        <td><?php echo ($item['qty'] * $item['price']) ?></td>
                        <td><a href="<?php echo base_url('carrito_eliminar/'), $item['rowid'] ?>" class="btn btn-danger"><i
                                    class="bi bi-trash"></i></a></td>
                    </tr>
                    <?php $gran_total += $item['qty'] * $item['price']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-2">
                <h4>Total: $ <?php echo $gran_total ?></h4>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url('/carrito-comprar') ?>" class="btn btn-success">Completar venta</a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url('borrar') ?>" class="btn btn-secondary">Vaciar carrito</a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url('tienda') ?>" class="btn btn-primary">Seguir comprando</a>
            </div>
        </div>
    <?php else: ?>
        <h1>El carrito está vacío.</h1>
    <?php endif; ?>
</div>