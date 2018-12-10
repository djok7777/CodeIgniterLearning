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
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($particulares as $par) { ?>
                        <tr>
                            <th scope="row"><?= $par['codigoParticular']; ?></th>
                            <td><?= $par['rutParticular']; ?></td>
                            <td><?= $par['nombreParticular']; ?></td>
                            <td><?= $par['passwordParticular']; ?></td>
                            <td><?= $par['direccionParticular']; ?></td>
                            <td><?= $par['direccionParticular']; ?></td>
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
            <?= form_open_multipart('particular/modificar') ?>   <!--<form action='producto/agregar'>-->

            <?php foreach ($particulares as $par) { ?>
                <div class="form-group">
                    <?= form_label('Codigo', 'txtCodigoParticular') ?>
                    <?= form_input(array('name' => 'txtCodigoParticular', 'class' => 'form-control', 'value' => $par["codigoParticular"], 'readonly'=>'true')) ?>
                </div> 
                <div class="form-group">
            <?= form_label('Rut', 'txtRutParticular') ?>
            <?= form_input(array('name' => 'txtRutParticular', 'class' => 'form-control', 'value' => $par["rutParticular"])) ?>
                </div> 
                <div class="form-group">
                    <?= form_label('Nombre', 'txtNombreParticular') ?>
                    <?= form_input(array('name' => 'txtNombreParticular', 'class' => 'form-control', 'value' => $par["nombreParticular"])) ?>
                </div> 
                <div class="form-group">
                    <?= form_label('Password', 'txtPasswordParticular') ?>
                    <?= form_input(array('name' => 'txtPasswordParticular', 'type' => 'password', 'class' => 'form-control', 'value' => $par["passwordParticular"])) ?>
                </div> 
                <div class="form-group">
                    <?= form_label('Dirección', 'txtDireccionParticular') ?>
                    <?= form_input(array('name' => 'txtDireccionParticular', 'class' => 'form-control', 'value' => $par["direccionParticular"])) ?>
                </div>
                <div class="form-group">
                    <?= form_label('Email', 'txtEmailParticular') ?>
                    <?= form_input(array('name' => 'txtEmailParticular', 'class' => 'form-control', 'value' => $par["emailParticular"])) ?>
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" >Modificar</button>
            <?= form_close(); ?> <!--</form>-->
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
