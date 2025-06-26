<div class="container">
    <?php if(!empty (session()->getFlashdata('fail'))):?>
    <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
    <?php endif?>
    <?php if(!empty (session()->getFlashdata('sucess'))):?>
    <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
    <?php endif?>

    <h1>Venta registrada con éxito</h1>
    <a href="<?php echo base_url('cliente/compras/verCompra/detalle/'), $venta_id ?>">Ver compra</a>
</div>