<div class="container">
    <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>

    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
    
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
                        <td>
                            <a class="btn btn-sm btn-success" href="<?= base_url('carrito_suma/' . $item['rowid']) ?>">+</a>
                            <?= number_format($item['qty']) ?>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('carrito_resta/' . $item['rowid']) ?>">-</a>
                        </td>
                        <td>$ <?= number_format($item['subtotal'], 2) ?></td>
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
                <a href="<?php echo base_url('/borrar') ?>" class="btn btn-secondary">Vaciar carrito</a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url('tienda') ?>" class="btn btn-primary">Seguir comprando</a>
            </div>
        </div>
    <?php else: ?>
        <h1>El carrito está vacío.</h1>
    <?php endif; ?>
</div>