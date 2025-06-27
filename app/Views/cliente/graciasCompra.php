<div class="container">
    <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>

    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>

    <h1>Venta registrada con éxito</h1>
    <a href="<?= base_url('cliente/compras/verCompras/detalle/' . $venta_id) ?>" class="btn btn-success">Ver compra</a>
</div>
