<div class="container table-responsive">
    <div class="row">
        <div class="col-md-6">
            <h2>Tabla de Usuarios</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="<?php echo base_url('/admin/usuarios/crear') ?>" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> Agregar Usuario
            </a>
        </div>
    </div>
    <table id="tablaUsuarios"class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mail</th>
                <th>Nacimiento</th>
                <th>Perfil</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <?php if(!$usuario['UsuarioActivo']): ?>
            <tr class="table-danger">
            <?php else: ?>
            <tr>
            <?php endif;?>
                <td><?php echo $usuario['UsuarioId']; ?></td>
                <td><?php echo $usuario['UsuarioNombre']; ?></td>
                <td><?php echo $usuario['UsuarioApellido']; ?></td>
                <td><?php echo $usuario['UsuarioMail']; ?></td>
                <td><?php echo $usuario['UsuarioFechaNac']; ?></td>
                <td>
                    <select class="form-select form-select-sm perfil-select" data-usuario-id="<?= $usuario['UsuarioId'] ?>">
                        <option selected value="<?= $usuario['PerfilId'] ?>">
                            <?= $usuario['PerfilDescripcion'] ?>
                        </option>
                        <?php foreach ($perfiles as $perfil): ?>
                            <?php if ($perfil['PerfilId'] != $usuario['PerfilId']): ?>
                                <option value="<?= $perfil['PerfilId'] ?>"><?= $perfil['PerfilDescripcion'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </td>


                <td>
                    <?php if($usuario['UsuarioActivo']): ?>
                        <a href="<?php echo base_url('admin/usuarios/eliminar/' . $usuario['UsuarioId']); ?>" class="btn btn-danger">Eliminar</a>
                    <?php else: ?>
                        <a href="<?php echo base_url('admin/usuarios/activar/' . $usuario['UsuarioId']); ?>" class="btn btn-success">Activar</a>
                    <?php endif?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>