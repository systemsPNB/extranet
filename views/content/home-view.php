<?php
include 'controllers/ajaxController.php';
$user = new ajaxController();
?>
<div class="card">
    <div class="card-header font-weight-bold">
        Bienvenido <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Seleccione su solicitud</h1>
                        <hr>

                        <!-- <p>Formulario de búsqueda de constancias</p> -->
                        <select id="soli">
                            <option value="">Seleccione</option>
                            <option value="1">ARC</option>
                            <option value="2">Constancia</option>
                            <option value="3">Recibo Pago</option>
                        </select>
                        
                        <button type="button" id="gen">Gerenar</button>
                       
                    </div>
                </div>
            </div>
        </div>
    
    </div>