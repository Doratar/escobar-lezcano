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
            <button class="btn btn-secondary">Agregar al carrito</button>
            <button class="btn btn-success">Comprar Ahora</button>
        </div>
    </div>
</div>