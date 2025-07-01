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
<!-- jQuery si aún no está incluido -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Bootstrap & Iconos -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
</body>
</html>