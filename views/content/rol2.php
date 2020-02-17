<div class="form-inline">

    <div class="form-group mb-2">

        <p class="form-control-plaintext">Cédula del trabajador:</p>

    </div>

    <div class="form-group mx-sm-3 mb-2">

        <input type="text" class="form-control" id="civ_work" placeholder="N° CIV">

    </div>

    <button type="button" id="search_work" class="btn btn-primary mb-2">Buscar</button>

</div>

<div class="data_works">

    <div class="row">

        <div class="col-4">

            <label>Nombres: <p id="res_search_name"></p> </label>

        </div>

        <div class="col-2">

            <label class="ml-3">Cédula: <p id="res_search_civ"></p> </label>
            <input type="hidden" id="res_search_idwork">

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

</div>