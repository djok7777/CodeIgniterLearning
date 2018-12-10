<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <h3><?= $title ?></h3>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <?= form_open_multipart('particular/agregar') ?>   <!--<form action='producto/agregar'>-->
        <div class="form-group">
            <?= form_label('Rut', 'txtRutParticular') ?>
            <?= form_input(array('name' => 'txtRutParticular', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Nombre', 'txtNombreParticular') ?>
            <?= form_input(array('name' => 'txtNombreParticular', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Password', 'txtPasswordParticular') ?>
            <?= form_input(array('name' => 'txtPasswordParticular', 'type' => 'password', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Dirección', 'txtDireccionParticular') ?>
            <?= form_input(array('name' => 'txtDireccionParticular', 'class' => 'form-control')) ?>
        </div>
        <div class="form-group">
            <?= form_label('e-mail', 'txtEmailParticular') ?>
            <?= form_input(array('name' => 'txtEmailParticular', 'class' => 'form-control')) ?>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <?= form_close(); ?> <!--</form>-->
    </div>
    <div class="col-md-2"></div>
</div>