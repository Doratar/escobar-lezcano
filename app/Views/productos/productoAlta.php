<div class="container">
  <?php $validation-> ?>
  <form action="/alta-producto" method="post">
    <h2>Alta de Producto</h2>
    
    <label for="nombre">Nombre del Producto:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>
    
    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion"></textarea><br><br>
    
    <label for="precio">Precio:</label><br>
    <input type="number" id="precio" name="precio" step="0.01" required><br><br>
    
    <label for="stock">Stock Inicial:</label><br>
    <input type="number" id="stock" name="stock" required><br><br>
    
    <label for="proveedor">Proveedor:</label><br>
    <input type="text" id="proveedor" name="proveedor"><br><br>
    
    <button type="submit">Guardar Producto</button>
  </form>
  
</div>