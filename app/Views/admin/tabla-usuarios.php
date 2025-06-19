<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Tabla de Usuarios</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <button class="btn btn-success"><a href="<?php echo base_url('/admin/productos/crear')?>">Agregar producto +</a></button>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mail</th>
                <th>Contraseña</th>
                <th>Nacimiento</th>
                <th>Estado</th>
                <th>Perfil</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['UsuarioId']; ?></td>
                <td><?php echo $usuario['UsuarioNombre']; ?></td>
                <td><?php echo $usuario['UsuarioApellido']; ?></td>
                <td><?php echo $usuario['UsuarioMail']; ?></td>
                <td><?php echo $usuario['UsuarioPass']; ?></td>
                <td><?php echo $usuario['UsuarioFechaNac']; ?></td>
                <td><?php echo $usuario['UsuarioActivo']; ?></td>
                <td><?php echo $usuario['PerfilId']; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/productos/editar/' . $usuario['UsuarioId']); ?>" class="btn btn-warning">Editar</a>
                    <a href="<?php echo base_url('admin/productos/eliminar/' . $usuario['UsuarioId']); ?>" class="btn btn-danger">Eliminar</a>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>