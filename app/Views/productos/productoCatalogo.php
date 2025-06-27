<div class="text-center my-4">
    <h2>Bienvenido a la Tienda</h2>
    <p>Aquí encontrarás todos nuestros productos.</p>
    <form action="<?php echo base_url('buscarProducto') ?>" method="POST">
            <div class="row offset-2">
                <div class="col-auto">
                    <label class="col-sm-2 col-form-label" for="busqueda">Buscar:</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="text" id="busqueda" name="busqueda">
                </div>
            </div>
    </form>
</div>

<div class="container table-responsive">
    <div class="row row-productos">
        <?php foreach ($productos as $producto): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('assets/uploads/') . $producto['prodImagenURL']; ?>" class="card-img-top"
                        alt="Producto">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $producto['prodNombre']; ?></h5>
                        <p class="card-text"><?= $producto['prodDescripcion']; ?></p>
                        <a href="<?php echo base_url('verProducto/'), $producto['prodId']; ?>"
                            class="btn btn-primary mt-auto">Ver</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if (sizeof($productos) == 0): ?>
            <h1>No hay productos disponibles</h1>
        <?php endif; ?>
    </div>
</div>