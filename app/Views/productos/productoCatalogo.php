<!-- Contenido específico de la página -->
<div class="text-center my-4">
    <h2>Bienvenido a la Tienda</h2>
    <p>Aquí encontrarás todos nuestros productos.</p>
</div>

<div class="container">
    <div class="row row-productos">
        <?php foreach ($productos as $producto): ?>

            <div class="col">
                <div class="card" style="width: 15rem;">
                    <img src="<?php echo base_url('assets/uploads/'), $producto['prodImagenURL'] ?>" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['prodNombre'] ?></h5>
                        <p class="card-text"><?php echo $producto['prodDescripcion'] ?>
                            content.</p>
                        <a href="<?php echo base_url('/producto') ?>" class="btn btn-primary">Ver</a>
                        <!-- <li><a class="dropdown-item" href="<?php echo base_url('/contacto') ?>">Contactanos</a></li> -->
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>