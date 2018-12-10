<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3><?= $title ?></h3>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?= form_open('usuario/login') ?>
        <div class="form-group">
            <?= form_label('Rut de usuario', 'txtRutUsuario') ?>
            <?= form_input(array('name' => 'txtRutUsuario', 'class' => 'form-control')) ?>
        </div>
        <div class="form-group">
            <?= form_label('Contraseña', 'txtPassword') ?>
            <?= form_input(array('name' => 'txtPassword', 'class' => 'form-control', 'type' => 'password')) ?>
        </div>
        <button class="btn btn-success">Iniciar Sesión</button>

        <?= form_close() ?>
        <?php if(isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
               <?=$error ?>
            </div>
        <?php } ?>

    </div>
    <div class="col-md-3"></div>
</div>

