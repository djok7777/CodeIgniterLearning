<?php
$ruta = "";
?>
<br/>
<div class='container'>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Password</th>
                        <th scope="col">Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empresas as $emp) { ?>
                        <tr>
                            <th scope="row"><?= $emp['codigoEmpresa']; ?></th>
                            <td><?= $emp['rutEmpresa']; ?></td>
                            <td><?= $emp['nombreEmpresa']; ?></td>
                            <td><?= $emp['passwordEmpresa']; ?></td>
                            <td><?= $emp['direccionEmpresa']; ?></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= form_open_multipart('empresa/modificar') ?>   <!--<form action='producto/agregar'>-->

            <?php foreach ($empresas as $emp) { ?>
                <div class="form-group">
                    <?= form_label('Codigo', 'txtCodigoEmpresa') ?>
                    <?= form_input(array('name' => 'txtCodigoEmpresa', 'class' => 'form-control', 'value' => $emp["codigoEmpresa"], 'readonly'=>'true')) ?>
                </div> 
                <div class="form-group">
            <?= form_label('Rut', 'txtRutEmpresa') ?>
            <?= form_input(array('name' => 'txtRutEmpresa', 'class' => 'form-control', 'value' => $emp["rutEmpresa"])) ?>
                </div> 
                <div class="form-group">
                    <?= form_label('Nombre', 'txtNombreEmpresa') ?>
                    <?= form_input(array('name' => 'txtNombreEmpresa', 'class' => 'form-control', 'value' => $emp["nombreEmpresa"])) ?>
                </div> 
                <div class="form-group">
                    <?= form_label('Password', 'txtPasswordEmpresa') ?>
                    <?= form_input(array('name' => 'txtPasswordEmpresa', 'type' => 'password', 'class' => 'form-control', 'value' => $emp["passwordEmpresa"])) ?>
                </div> 
                <div class="form-group">
                    <?= form_label('Dirección', 'txtDireccionEmpresa') ?>
                    <?= form_input(array('name' => 'txtDireccionEmpresa', 'class' => 'form-control', 'value' => $emp["direccionEmpresa"])) ?>
                </div>
            
            <?php } ?>
            <button type="submit" class="btn btn-primary" >Modificar</button>
            <?= form_close(); ?> <!--</form>-->
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
