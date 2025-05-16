<div class="container p-4">
    <h1>Resgitro de usuario</h1>
    <?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/registrarUsuario')?>">
        <?=csrf_field();?> <!-- Token de seguridad -->
        <?php if(!empty (session()->getFlashdata('fail'))):?>
        <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
        <?php endif?>
        <?php if(!empty (session()->getFlashdata('sucess'))):?>
        <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
        <?php endif?>
        <div class="mb-3">    
            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
            <label for="UsuarioNombre" class="form-label">Ingresa tu nombre de usuario: </label>
            <input id="UsuarioNombre" type="text" class="form-control" placeholder="Ingresa tu sobrenombre" aria-label="UsuarioDesc">
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Tu mail wacho" aria-label="UsuarioMail" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">@dominio.com</span>
        </div>

        <div class="mb-3">
            <label for="basic-url" class="form-label">Your vanity URL</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
            </div>
            <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
        </div>

        <div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
    </form>
</div>