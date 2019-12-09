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

                        <p>Formulario de búsqueda de constancias</p>

                    </div>
                </div>
            </div>
        </div>
    
    </div>