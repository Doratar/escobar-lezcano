<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Tabla de Consultas</h2>
        </div>
        
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Mail</th>
                <th>Telefono</th>
                <th>Detalle</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
            <tr>
                <td><?php echo $consulta['consultasId']; ?></td>
                <td><?php echo $consulta['consultasFecha']; ?></td>
                <td><?php echo $consulta['consultasMail']; ?></td>
                <td><?php echo $consulta['consultasTelefono']; ?></td>
                <td><?php echo $consulta['consultasDetalle']; ?></td>
                <?php if ($consulta['consultasAtendido'] == 'NO'): ?>
                    <td>
                        <button class="btn btn-sucess" type="submit" formmethod="<?php base_url('admin/consultas/marcarLeido/', $consulta['consultasId']) ?>">Marcar Leido</button>
                    </td>
                <?php else: ?>
                <td>
                    <button class="btn btn-secondary">Leido</button>
                </td>
                    
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>