<div class="container">
  <?php $validation = \Config\Services::validation() ?>
  <?php echo $validation->listErrors() ?>
  <form action="<?php echo base_url('/admin/categorias/editar') ?>" method="post" enctype="multipart/form-data">
    <h2>Editar Categorias</h2>

    <input name="cateId" id="cateId" type="hidden" value="<?php echo $categoria['cateId'] ?>">

    <div class="mb-3">
      <label for="cateNombre">Nombre de la Categoria: </label>
      <?php if (isset($categoria)): ?>
        <input type="text" class="form-control" name="cateNombre" id="cateNombre" placeholder="Nombre" aria-label="Nombre"
          value="<?php echo $categoria['cateNombre'] ?>" required>
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