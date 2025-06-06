<div class="container">
  <?php $validation = \Config\Services::validation() ?>
  <?php echo $validation->listErrors() ?>
  <form action="<?php echo base_url('/admin/productos/crear') ?>" method="post" enctype="multipart/form-data">
    <h2>Alta de Producto</h2>

    <div class="mb-3">
      <label for="prodNombre">Nombre del producto: </label>
      <input type="text" class="form-control" name="prodNombre" id="prodNombre" placeholder="Nombre"
        aria-label="Nombre">
    </div>

    <div class="mb-3">
      <label for="pordMarca">Marca del producto: </label>
      <input type="text" class="form-control" name="prodMarca" id="prodMarca" placeholder="Marca"
        aria-label="Marca">
    </div>

    <div class="mb-3">
      <label class="form-label" for="prodDescripcion">Descripción:</label>
      <textarea class="form-control" name="prodDescripcion" id="prodDescripcion"></textarea>
    </div>

    <div class="row">
      <div class="col-md-3 mb-3">
        <label for="prodPrecio">Precio </label>
        <input type="number" class="form-control" name="prodPrecio" id="prodPrecio" placeholder="Precio"
          aria-label="Nombre">
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