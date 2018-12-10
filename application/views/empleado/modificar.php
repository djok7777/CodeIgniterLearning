<br/>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= form_open_multipart('empleado/modificar') ?>   <!--<form action='producto/agregar'>-->

            <?php foreach ($empleados as $emp) { ?>
                <div class="form-group">
                    <?= form_label('Rut', 'txtRutEmpleado') ?>
                    <?= form_input(array('name' => 'txtRutEmpleado', 'class' => 'form-control', 'value' => $emp["rutEmpleado"], 'readonly'=>'true')) ?>
                </div> 
                <div class="form-group">
            <?= form_label('Nombre', 'txtNombreEmpleado') ?>
            <?= form_input(array('name' => 'txtNombreEmpleado', 'class' => 'form-control', 'value' => $emp["nombreEmpleado"])) ?>
                </div> 
                <div class="form-group">
                    <?= form_label('Password', 'txtPasswordEmpleado') ?>
                    <?= form_input(array('name' => 'txtPasswordEmpleado', 'type' => 'password','class' => 'form-control', 'value' => $emp["passwordEmpleado"])) ?>
                </div> 
            
            <?php } ?>
            <button type="submit" class="btn btn-primary" >Modificar</button>
            <?= form_close(); ?> <!--</form>-->
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
