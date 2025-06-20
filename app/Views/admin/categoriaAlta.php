<div class="container">
  <?php $validation = \Config\Services::validation() ?>
  <?php echo $validation->listErrors() ?>
  <form action="<?php echo base_url('/admin/categorias/crear') ?>" method="post" enctype="multipart/form-data">
    <h2>Alta de Categorias</h2>

    <div class="mb-3">
      <label for="cateNombre">Nombre de la categoria: </label>
      <?php if (isset($categoria)): ?>
        <input type="text" class="form-control" name="cateNombre" id="cateNombre" placeholder="Nombre" aria-label="Nombre"
          value="<?php echo $producto['cateNombre'] ?>" required>
      <?php else: ?>
        <input type="text" class="form-control" name="cateNombre" id="cateNombre" placeholder="Nombre" aria-label="Nombre"
          required>
      <?php endif; ?>
      <?php if ($validation->hasError('cateNombre')): ?>
        <div class="alert alert-danger mt-2">
          <?php echo $validation->getError('cateNombre'); ?>
        </div>
      <?php endif; ?>
    </div>

    <button id="agregar-categoria" class="btn btn-success" type="submit">Guardar Categoria</button>
  </form>

</div>