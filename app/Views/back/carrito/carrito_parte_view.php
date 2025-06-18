<div class="container">
    <h1>Tu carrito guacho</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($carrito) && is_array($carrito)): ?>
                <?php foreach ($carrito as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id']); ?></td>
                        <td><?php echo htmlspecialchars($item['precio']); ?></td>
                        <td><?php echo htmlspecialchars($item['cantidad']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">El carrito está vacío.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>