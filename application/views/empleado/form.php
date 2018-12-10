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
        <?= form_open_multipart('empleado/agregar') ?>   <!--<form action='producto/agregar'>-->
        <div class="form-group">
            <?= form_label('Rut', 'txtRutEmpleado') ?>
            <?= form_input(array('name' => 'txtRutEmpleado', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Nombre', 'txtNombreEmpleado') ?>
            <?= form_input(array('name' => 'txtNombreEmpleado', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Password', 'txtPasswordEmpleado') ?>
            <?= form_input(array('name' => 'txtPasswordEmpleado', 'type' => 'password', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?php
            echo form_label('Codigo', 'codigo');
            //$options['0'] = 'Seleccione';
            $options['A'] = 'A';
            $options['R'] = 'R';
            $options['T'] = 'T';

            echo form_dropdown('codigo', $options, '0', 'class="form-control"');
            ?>
        </div> 
        
        <button type="submit" class="btn btn-primary">Crear</button>
        <?= form_close(); ?> <!--</form>-->
    </div>
    <div class="col-md-2"></div>
</div>