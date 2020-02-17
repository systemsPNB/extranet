<div class="row">

    <div class="col-4">

        <label>Nombres: <p> <?= $_SESSION['user']; ?> </p> </label>

    </div>

    <div class="col-2">

        <label class="ml-3">Cédula: <p> <?= $_SESSION['cedula']; ?> </p> </label>
        <input type="hidden" id="res_search_idwork" value="<?= ajaxController::encriptar_idwork($_SESSION['idwork']); ?>">


    </div>

    <div class="col-6">

        <div class="form-inline">

            <label>Seleccionar reporte: </label>
            <select class="custom-select ml-3" id="soli">
                <option value="">Seleccione</option>
                <option value="1">ARC</option>

                <?php if ($_SESSION['constancia'] == 'Si') : ?>
                    <option value="2">Constancia</option>
                <?php endif; ?>
                <!-- <option value="3">Recibo Pago</option> -->
            </select>

            <div class="col-2">

                <button type="button" class="btn btn-success" id="gen">Generar</button>

            </div>

        </div>

    </div>

</div>