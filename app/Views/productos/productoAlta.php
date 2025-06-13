<div class="container">
  <?php $validation = \Config\Services::validation() ?>
  <?php echo $validation->listErrors() ?>
  <form action="<?php echo base_url('/admin/productos/crear') ?>" method="post" enctype="multipart/form-data">
    <h2>Alta de Producto</h2>

    <div class="mb-3">
      <label for="prodNombre">Nombre del producto: </label>
      <input type="text" class="form-control" name="prodNombre" id="prodNombre" placeholder="Nombre"
        aria-label="Nombre" required>
      <?php if(isset($producto)): ?>
        <input type="text" class="form-control" name="prodNombre" id="prodNombre" placeholder="Nombre"
        aria-label="Nombre"
        value="<?php echo $producto['prodNombre'] ?>" required>
      <?php endif; ?>
      <?php if ($validation->hasError('prodNombre')): ?>
        <div class="alert alert-danger mt-2">
          <?php echo $validation->getError('prodNombre'); ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="pordMarca">Marca del producto: </label>
      <?php if(isset($producto)): ?>
        <input type="text" class="form-control" name="prodMarca" id="prodMarca" placeholder="Marca" aria-label="Marca" value="<?php echo $producto['prodMarca'] ?>" required>
      <?php else ?>
      <input type="text" class="form-control" name="prodMarca" id="prodMarca" placeholder="Marca" aria-label="Marca" required>
        <?php if ($validation->hasError('prodMarca')): ?>
        <div class="alert alert-danger mt-2">
          <?php echo $validation->getError('prodMarca'); ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label class="form-label" for="prodDescripcion">Descripción:</label>
      <?php if(isset($producto)): ?>
        <textarea class="form-control" name="prodDescripcion" id="prodDescripcion"><?php echo $producto['prodDescripcion'] ?></textarea>
      <?php else: ?>
        <textarea class="form-control" name="prodDescripcion" id="prodDescripcion" placeholder="Descripción del producto" aria-label="Descripción"></textarea>
      <?php endif; ?>
    </div>

    <div class="row">
      <div class="col-md-3 mb-3">
        <label for="prodPrecio">Precio </label>
        <input type="number" class="form-control" name="prodPrecio" id="prodPrecio" placeholder="Precio"
          aria-label="Precio">
      </div>

      <div class="col-md-3 mb-3">
        <label for="prodPrecio">Stock </label>
        <input type="number" class="form-control" name="prodStock" id="prodStock" placeholder="Stock"
          aria-label="Nombre">
      </div>

      <div class="col-md-3 mb-3">
        <label for="cateId">Categoria </label>
        <select id="cateId" name="cateId" class="form-select" aria-label="Default select example">
          <option selected>Seleccione la categoria</option>
          <?php foreach ($categorias as $categoria): ?>
            <option id="cateId" name="cateId" value="<?php echo $categoria['cateId'] ?>"><?= $categoria['cateNombre'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label for="prodImagenUrl">Imagen del producto: </label>
        <input type="file" class="form-control" name="prodImagenUrl" id="prodImagenUrl"
          placeholder="Archivo imagen" aria-label="URL de la imagen" accept:"image/png, image/jpg">
      </div>
      <div class="col-md-1">
        <label for="prodColor">Color</label>
        <input type="color" name="prodColor" id="prodColor" class="form-control"
          placeholder="Ingrese el color del producto" aria-label="Color">
      </div>
    </div>

    <button id="agregar-producto" class="btn btn-success" type="submit">Guardar Producto</button>
  </form>

</div>