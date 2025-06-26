<div class="container p-4">
    <h1>Registro de usuario</h1>
    <?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/registrar')?>">
        <?=csrf_field();?> <!-- Token de seguridad -->
        
        <?php if(!empty (session()->getFlashdata('fail'))):?>
            <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
        <?php endif?>
        <?php if(!empty (session()->getFlashdata('success'))):?>
            <div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
        <?php endif?>
        
        <?php echo $validation->listErrors() ?>

        <div class="mb-3">
            <label for="UsuarioNombre">Ingrese nombre: </label>
            <input type="text" class="form-control" name="UsuarioNombre" id="UsuarioNombre" placeholder="Nombre" aria-label="Nombre">
        </div>
        
        <div class="mb-3">
            <label for="Apellido">Ingrese apellido: </label>
            <input type="text" class="form-control" name="UsuarioApellido" id="UsuarioApellido" placeholder="Apellido" aria-label="Apellido">
        </div>
        
        <div class="mb-3">
            <label for="UsuarioMail" class="form-label">Ingresa su mail: </label>
            <input id="UsuarioMail" type="mail" class="form-control" placeholder="Ingrese mail" aria-label="UsuarioMail" name="UsuarioMail">
        </div>

        <div class="mb-3">
            <label for="UsuarioPass">Ingrese contraseña: </label>
            <input type="password" class="form-control" id="UsuarioPass" name="UsuarioPass" placeholder="Contraseña" aria-label="UsuarioPass">
        </div>

        <div class="mb-3">
            <label for="UsuarioConfirmarPass">Confirmar contraseña: </label>
            <input type="password" class="form-control" id="UsuarioConfirmarPass" name="UsuarioConfirmarPass" placeholder="Contraseña">

        </div>

        <div class="mb-3">
            <label for="UsuarioFechaNac">Ingrese Fecha de nacimiento: </label>
            <input type="date" class="form-control" id="UsuarioFechaNac" name="UsuarioFechaNac" placeholder="Fecha de nacimiento" aria-label="Fecha de nacimiento">
        </div>

        <div class="mb-3">
            <input type="checkbox" class="form-check-input" id="Acepto" name="Acepto">
            <label for="Acepto">Leí y acepto los terminos y condiciones</label>
        </div>

        <input type="submit" class="btn btn-primary" value="Registrar">
    </form>
</div>