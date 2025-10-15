<!-- Contenido específico de la página -->
<!-- Categorias -->
<!-- Calzado -->
<div class="container">
  <h2 class="">Categorias</h2>
  <div class="row">
    <!-- <div class="col"><img src="assets\img\Componente-Gorra.jpg" alt="gorra" class="img-thumbnail" title="Gorras"></div>
    <div class="col"><img src="assets\img\Componente-Pantalon.jpg" alt="pantalon" class="img-thumbnail"></div>
    <div class="col"><img src="assets\img\Componente-Remera.jpg" alt="remera" class="img-thumbnail"></div>
    <div class="col"><img src="assets\img\Componente-Buzo.jpg" alt="buzo" class="img-thumbnail" title="buzo"></div> -->
    <?php foreach ($categorias as $categoria): ?>
      <div class="col"><img src="assets\img\<?php echo $categoria['cateImagenUrl'] ?>"
          alt="<?php echo $categoria['cateNombre'] ?>" class="img-thumbnail"
          title="<?php echo $categoria['cateNombre'] ?>"></div>
      <!-- <div class="col"></div> -->
    <?php endforeach; ?>
  </div>

  <h2>Lo más vendido</h2>
  <div class="row">
    <?php foreach ($mas_vendido as $producto): ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
          <img src="<?= base_url('assets/uploads/') . $producto['prodImagenURL']; ?>" class="card-img-top" alt="Producto">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $producto['prodNombre']; ?></h5>
            <p class="card-text"><?= $producto['prodDescripcion']; ?></p>
            <a href="<?php echo base_url('verProducto/'), $producto['prodId']; ?>" class="btn btn-primary mt-auto">Ver</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <h2>Novedades</h2>
  <div class="row">
    <?php foreach ($novedades as $producto): ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
          <img src="<?= base_url('assets/uploads/') . $producto['prodImagenURL']; ?>" class="card-img-top" alt="Producto">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $producto['prodNombre']; ?></h5>
            <p class="card-text"><?= $producto['prodDescripcion']; ?></p>
            <a href="<?php echo base_url('verProducto/'), $producto['prodId']; ?>" class="btn btn-primary mt-auto">Ver</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>