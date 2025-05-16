<div class="container p-4">
    <h1>Resgitro de usuario</h1>
    <?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/registrar')?>">
        <?=csrf_field();?> <!-- Token de seguridad -->
        <?php if(!empty (session()->getFlashdata('fail'))):?>
        <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
        <?php endif?>
        <?php if(!empty (session()->getFlashdata('sucess'))):?>
        <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
        <?php endif?>
        
        <div class="mb-3">
            <label for="Nombre">Ingrese nombre: </label>
            <input type="text" class="form-control" id="Nombre" placeholder="Nombre" aria-label="Nombre">
        </div>
        
        <div class="mb-3">
            <label for="Apellido">Ingrese apellido: </label>
            <input type="text" class="form-control" id="Apellido" placeholder="Apellido" aria-label="Apellido">
        </div>
        
        <div class="mb-3">
            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
            <label for="UsuarioMail" class="form-label">Ingresa su mail: </label>
            <input id="UsuarioMail" type="mail" class="form-control" placeholder="Ingrese mail" aria-label="UsuarioDesc">
        </div>

        <div class="m-3">
            <label for="UsuarioPass">Ingrese contraseña: </label>
            <input type="password" class="form-control" id="UsuarioPass" placeholder="Contraseña" aria-label="UsuarioPass">
        </div>

        <div class="mb-3">
            <label for="UsuarioConfirmarPass">Confirmar contraseña: </label>
            <input type="password" class="form-control" id="UsuarioConfirmarPass" placeholder="Contraseña" aria-label="UsuarioConfirmarPass">
        </div>

        <div class="mb-3">
            <label for="UsuarioFechaNac">Ingrese Fecha de nacimiento: </label>
            <input type="date" class="form-control" id="UsuarioFechaNac" placeholder="Fecha de nacimiento" aria-label="Fecha de nacimiento">
        </div>

        <div class="mb-3">
            <input type="checkbox" class="form-check-input" id="Acepto" aria-label="Acepto">
            <label for="Acepto">Leí y acepto los terminos y condiciones</label>
        </div>

        <input type="submit" class="btn btn-primary" value="Registrar">
    </form>
</div>