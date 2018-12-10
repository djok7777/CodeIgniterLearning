<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <h3><?= $title ?></h3>
        <h3><?= $rut ?></h3>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <?= form_open_multipart('muestra/buscarMuestra') ?>   <!--<form action='producto/agregar'>-->
        <div class="form-group">
            <?= form_label('Rut del cliente', 'txtRut') ?>
            <?= form_input(array('name' => 'txtRut', 'value' => $rut, 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Nombre del cliente', 'txtNombre') ?>
            <?= form_input(array('name' => 'txtNombre', 'value' => $nombre, 'class' => 'form-control')) ?>
        </div>
        <button name="btnBuscar" id="btnBuscar" type="submit" class="btn btn-primary">Buscar</button>
        <?= form_close(); ?> <!--</form>-->
    </div>
    <div class="col-md-2"></div>
</div>


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <?= form_open_multipart('muestra/agregarMuestra', array('onsubmit' => 'return validarFormulario(this)')); ?>   <!--<form action='producto/agregar'>-->
        <hr>
        <?php echo form_hidden('txtRut2', $rut);?>
        <div class="form-group">
            <?= form_label('Fecha de recepción', 'txtFechaRecepcion') ?>
            <?= form_input(array('name' => 'txtFechaRecepcion', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Temperatura', 'txtTemperatura') ?>
            <?= form_input(array('name' => 'txtTemperatura', 'class' => 'form-control')) ?>
        </div> 
        <div class="form-group">
            <?= form_label('Cantidad', 'txtCantidad') ?>
            <?= form_input(array('name' => 'txtCantidad', 'id' => 'txtCantidad', 'class' => 'form-control')) ?>
        </div> 
        <div id="errorPag" class="all-width" ></div>
        
        <div class="form-group">
            <?php
            echo form_label('Analisis', 'selectAnalisis');
            //$options['0'] = 'Seleccione';
            foreach ($analisis as $ana) {
                $options[$ana['idTipoAnalisis']] = $ana['nombre'];
            }

            echo form_dropdown('selectAnalisis', $options, '0', 'class="form-control"');
            ?>
        </div>
        
        <button type="submit" name="btnRecepcion" id="btnRecepcion" class="btn btn-primary">Crear</button>
        <?= form_close(); ?> <!--</form>-->
    </div>
    <div class="col-md-2"></div>
</div>

<script>
    function validarFormulario() {
        var cantidad = document.getElementById("txtCantidad");
        var validoP = false;
        if (cantidad.value.length === 0 || cantidad.value === "") {
            document.getElementById("errorPag").className = "alert alert-danger";
            document.getElementById("errorPag").innerHTML = "Requerido";
        } else {
            document.getElementById("errorPag").innerHTML = "";
            document.getElementById("errorPag").className = "";

            if (!validarNumero(cantidad.value)) {
                document.getElementById("errorPag").className = "alert alert-danger";
                document.getElementById("errorPag").innerHTML = "Debe ser número";
            } else {
                document.getElementById("errorPag").innerHTML = "";
                validoP = true;
            }
        }

        if ( validoP === true ) {
            return true;//cuando el formulario no tiene errores
        } else {
            return false;
        }    
    }

    function validarNumero(numero) {
        //si es numero return true
        if (numero > 0 & numero <= 9999999999999) {
            return true;
        } else {
            return false;
        }

    }
</script>