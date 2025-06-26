<div class="container">
    <h1>Iniciar sesión</h1>
    <?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/login')?>">
        <?=csrf_field();?> <!-- Token de seguridad -->
        <?php if(!empty (session()->getFlashdata('fail'))):?>
            <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
        <?php endif?>
        <?php if(!empty (session()->getFlashdata('sucess'))):?>
            <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
        <?php endif?>
        
        <?php echo $validation->listErrors() ?>

        <div class="mb-3">
            <label for="UsuarioMail" class="form-label">Ingresa su mail: </label>
            <input id="UsuarioMail" type="mail" class="form-control" placeholder="Ingrese mail" aria-label="UsuarioMail" name="UsuarioMail">
        </div>

        <div class="mb-3">
            <label for="UsuarioPass">Ingrese contraseña: </label>
            <input type="password" class="form-control" id="UsuarioPass" name="UsuarioPass" placeholder="Contraseña" aria-label="UsuarioPass">
        </div>

        <input type="submit" class="btn btn-primary" value="Iniciar Sesion">
    </form>
</div>