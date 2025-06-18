<div class="container">
    <div class="row">
        <div class="col-md-3 justify-content-center align-items-center">
             <img class="img-fluid" src="<?= base_url('assets/uploads/') . $producto['prodImagenURL']; ?>" alt="imagen-del-producto" alt="imagen-del-producto" style="max-width: 100px; height: auto;">
        </div>
        <div class="col-md-6">
            <h1><?php echo $producto['prodNombre']?></h1>
            <h2>Descripcion</h2>
            <p><?php echo $producto['prodDescripcion']?></p>
            <h3>Precio: $ <?php echo $producto['prodPrecio']?></h3>
            <h4>Categoria <?php print_r($categorias[$producto['cateId']]['cateNombre']) ?></h4>
            <form action="<?php echo base_url('carrito_agrega') ?>" method="post">
                <input type="hidden" id="prodId" name="prodId" value="<?php $producto['prodId'] ?>">
                <input type="hidden" id="prodNombre" name="prodNombre" value="<?php $producto['prodNombre'] ?>">
                <input type="hidden" id="prodPrecio" name="prodPrecio" value="<?php $producto['prodPrecio'] ?>">
                
                <button type="submit" class="btn btn-secondary">Agregar al carrito</button>
            </form>
            <button class="btn btn-success">Comprar Ahora</button>
        </div>
    </div>
</div>