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
        <?= form_open_multipart('empresa/agregar') ?>   <!--<form action='producto/agregar'>-->
        <div class="form-group">
            <?= form_label('Rut', 'txtRutEmpresa') ?>
            <?= form_input(array('name' => 'txtRutEmpresa', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Nombre', 'txtNombreEmpresa') ?>
            <?= form_input(array('name' => 'txtNombreEmpresa', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Password', 'txtPasswordEmpresa') ?>
            <?= form_input(array('name' => 'txtPasswordEmpresa', 'type' => 'password', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Dirección', 'txtDireccionEmpresa') ?>
            <?= form_input(array('name' => 'txtDireccionEmpresa', 'class' => 'form-control')) ?>
        </div> 
        
        <button type="submit" class="btn btn-primary">Crear</button>
        <?= form_close(); ?> <!--</form>-->
    </div>
    <div class="col-md-2"></div>
</div>