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
        <?= form_open_multipart('resultado/actualizar') ?>   <!--<form action='producto/agregar'>-->
        <div class="form-group">
            <?= form_label('Tipo de analisís', 'txtTipoAnalisis') ?>
            <?= form_input(array('name' => 'txtTipoAnalisis', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('PPM de la muestra', 'txtPPM') ?>
            <?= form_input(array('name' => 'txtPPM', 'class' => 'form-control')) ?>
        </div> 
        
        <button type="submit" class="btn btn-primary">Guardar análisis</button>
        <?= form_close(); ?> <!--</form>-->
    </div>
    <div class="col-md-2"></div>
</div>