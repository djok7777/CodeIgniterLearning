<div class='container'>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Código de usuario</th>
                        <th scope="col">Código de muestra</th>
                        <th scope="col">Procesar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($analisis as $ana) { ?>
                        <tr>
                            <td><?= $ana['TipoAnalisis_idTipoAnalisis']; ?></td>
                            <td><?= $ana['AnalisisMuestras_idAnalisisMuestras']; ?></td>
                            <td>  
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>