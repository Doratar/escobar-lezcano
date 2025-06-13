<div class="text-center my-4">
    <h2>Bienvenido a la Tienda</h2>
    <p>Aquí encontrarás todos nuestros productos.</p>
</div>

<div class="container">
    <div class="row row-productos">
        <?php foreach ($productos as $producto): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('assets/uploads/') . $producto['prodImagenURL']; ?>" class="card-img-top" alt="Producto">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $producto['prodNombre']; ?></h5>
                        <p class="card-text"><?= $producto['prodDescripcion']; ?></p>

                        <?php if (1 > 0): ?>
                            <?= form_open('carrito_agrega') ?>
                                <?= form_hidden('id', (string)$producto['prodId']) ?>
                                <?= form_hidden('precio_vta', (string)$producto['prodPrecio']) ?>
                                <?= form_hidden('nombre_prod', (string)$producto['prodNombre']) ?>

                                <!-- <?= form_hidden('qty', 1) ?> -->

                                <div>
                                    <?php
                                    $btn = array(
                                        'class' => 'btn btn-secondary fuenteBotones',
                                        'value' => 'Agregar al Carrito',
                                        'name'  => 'action'
                                    );
                                    echo form_submit($btn);
                                    ?>
                                </div>
                            <?= form_close() ?>
                        <?php else: ?>
                            <span class="badge bg-danger mt-auto">Sin stock</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
