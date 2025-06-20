<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Tabla de Usuarios</h2>
        </div>
        
    </div>
    <table class="table table-striped">
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
                <td><?php echo $usuario['PerfilDescripcion']; ?></td>
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