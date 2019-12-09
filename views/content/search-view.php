<?php if($_SESSION['nivel'] == 1){ ?>

    <div class="card">

        <div class="card-header font-weight-bold">
            Buscar trabajador
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <div class="form-inline">
                        <label>Cédula del trabajador: </label>
                        <input type="text" name="civ" id="civ" class="form-control ml-2" placeholder="Cédula" value="18762905">
                        <button type="button" class="btn btn-sm btn-secondary ml-3" onclick="buscar()">Buscar</button>
                    </div>
                    
                </div>
            </div>

            <hr class="bg-info">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-inline">

                            <label>Cédula del trabajador: </label>
                            <label id="rciv" class="font-weight-bold ml-3"></label>

                            <label class="ml-3">Jerarquía / Cargo: </label>
                            <label id="rjquia"class="font-weight-bold ml-3"></label>

                            <label class="ml-3">Nombres del trabajador: </label>
                            <label id="rnombres" class="font-weight-bold ml-3"></label>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        
                    </div>
                </div>
            </div>


        </div>

<?php }else{ ?>

    <div class="card">

        <div class="card-header font-weight-bold">
            Acceso prohibido!
        </div>

        <div class="card-body">
            <h5 class="card-title">No tienes privilegios suficientes para acceder a este módulo</h5>
        </div>
<?php } ?>