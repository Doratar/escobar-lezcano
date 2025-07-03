<!-- Inicio de footer -->
<footer class="bg-dark text-white mt-5 pt-4 pb-3">
  <div class="container">
    <div class="row text-center text-md-start">
      <div class="col-md-4 mb-3">
        <h5>Seguinos</h5>
        <ul class="list-unstyled d-flex justify-content-center justify-content-md-start gap-3">
          <li><a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter-x"></i> X/Ex-Twitter</a></li>
          <li><a href="https://www.instagram.com/" class="text-white text-decoration-none"><i class="bi bi-instagram"></i> Instagram</a></li>
          <li><a href="#" class="text-white text-decoration-none"><i class="bi bi-facebook"></i> Facebook</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Contacto</h5>
        <p>Email: contacto@Kicksup.com</p>
        <p>Tel: +54 9 1234 567890</p>
        <a href="<?php echo base_url('/contacto') ?>">Contáctanos</a>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Ubicación</h5>
        <p>9 de Julio 1449, W3400 AZB<br>Corrientes, Argentina</p>
      </div>
    </div>
    <div class="text-center mt-3">
      <p class="mb-0">&copy; 2025 Kicks UP. Todos los derechos reservados.</p>
      <a href="<?php echo base_url("terminos")?>">Terminos y condiciones</a>
    </div>
  </div>
</footer>

<!-- Script para actualizar el perfil vía AJAX -->
<script>
$(document).ready(function(){
    $('.perfil-select').on('change', function(){
        const usuarioId = $(this).data('usuario-id');
        const perfilId = $(this).val();

        $.ajax({
            url: '<?= base_url('usuarios/actualizar-perfil') ?>',
            type: 'POST',
            data: {
                usuarioId: usuarioId,
                perfilId: perfilId
            },
            success: function(response){
                if(response.status === 'ok'){
                    console.log('Perfil actualizado');
                    // Aquí podés mostrar un toast visual si querés
                } else {
                    alert('Error al actualizar el perfil');
                }
            },
            error: function(){
                alert('Error de conexión');
            }
        });
    });
});
</script>

<!-- jQuery local -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<!-- DataTables JS local -->
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script>

<!-- Inicialización -->
<script>
  $(document).ready(function() {
    const tablas = ['#tablaVentas', '#tablaVentasDetalle', '#tablaUsuarios', '#tablaConsultas', '#tablaCategorias', '#tablaProductos'];
    const opciones = {
      responsive: true,
      language: {
        url: '<?= base_url('assets/js/i18n/es-ES.json') ?>'
      }
    };

    tablas.forEach(function(selector) {
      if ($(selector).length) {
        $(selector).DataTable(opciones);
      }
    });
  });
</script>

<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>