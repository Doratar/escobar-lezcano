<div class="container">
  <?php $validation = \Config\Services::validation() ?>
  <?php echo $validation->listErrors() ?>
  <form action="<?= base_url('admin/usuarios/guardar') ?>" method="post" enctype="multipart/form-data">
    <h2>Alta de Usuarios</h2>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="clave">Clave:</label>
    <input type="password" name="clave" required>

    <label for="perfil_id">Perfil:</label>
    <select name="perfil_id">
        <option value="1">Admin</option>
        <option value="2">Usuario</option>
    </select>

    <button id="agregar-categoria" class="btn btn-success" type="submit">Guardar Categoria</button>
  </form>

</div>