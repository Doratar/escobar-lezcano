<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

    <div class="container my-5">
    <section id="contacto" class="p-4 rounded bg-light shadow-sm">
    <h1 class="mb-4">Contáctanos</h1>
  <div class="row mb-5 align-items-center">
    <!-- Datos -->
    <div class="col-md-6 mb-4 mb-md-0">
      <a href="<?php echo base_url("/")?>"><img src="<?php echo base_url('assets/img/logo.png')?>" alt="Logo de Kicks Up" class="img-fluid mb-3" style="max-height: 120px;"></a>
      <h2 class="fw-bold">Kicks Up</h2>
      <ul class="list-unstyled">
        <li><strong>CUIT:</strong> 30-20987623-2</li>
        <li><strong>Domicilio:</strong> 9 de Julio 1449, W3400 AZB Corrientes</li>
        <li><strong>Teléfono:</strong> <a href="tel:+5437944473930">0379 447-3930</a></li>
        <li><strong>Correo:</strong> <a href="mailto:contacto@kicksup.com">contacto@kicksup.com</a></li>
      </ul>
    </div>

    <!-- Mapa -->
    <div class="col-md-6">
      <h2 class="fw-bold mb-3">Ubicación</h2>
      <div class="ratio ratio-4x3 rounded shadow">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0900624775886!2d-58.83478922470811!3d-27.466455376321573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses!2sar!4v1745417050346!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
    </div>
  </div>

  <!-- Formulario de contacto -->
  <div class="bg-light p-4 rounded shadow">
    <h2 class="mb-4">Deja aquí tu Consulta</h2>
    <form action="<?= base_url('consultas/crear') ?>" method="post">
    <?= csrf_field() ?>

    <!-- Email -->
    <div class="mb-3">
        <label for="consultasMail" class="form-label">Correo electrónico</label>
        <input type="text" class="form-control" id="consultasMail" name="consultasMail"
               value="<?= old('consultasMail', isset($usuario) ? $usuario : '') ?>">
        <?php if (isset($validation) && $validation->hasError('consultasMail')): ?>
            <div class="alert alert-danger mt-2">
                <?= $validation->getError('consultasMail'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Teléfono -->
    <div class="mb-3">
        <label for="consultasTelefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="consultasTelefono" name="consultasTelefono"
               value="<?= old('consultasTelefono') ?>">
        <?php if (isset($validation) && $validation->hasError('consultasTelefono')): ?>
            <div class="alert alert-danger mt-2">
                <?= $validation->getError('consultasTelefono'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Consulta -->
    <div class="mb-3">
        <label for="consultasDetalle" class="form-label">Tu consulta</label>
        <textarea class="form-control" id="consultasDetalle" name="consultasDetalle"
                  rows="4"><?= old('consultasDetalle') ?></textarea>
        <?php if (isset($validation) && $validation->hasError('consultasDetalle')): ?>
            <div class="alert alert-danger mt-2">
                <?= $validation->getError('consultasDetalle'); ?>
            </div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Enviar consulta</button>
    <button type="reset" class="btn btn-secondary">Limpiar</button>
</form>
