<?php include 'controllers/ajaxController.php'; ?>

<div class="card">
    <div class="card-header font-weight-bold">
        Bienvenido <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <h4>Reportes PDF de Constancias de trabajo y ARC</h4>

                        <?php
                        switch($_SESSION['nivel']){
                            case '1':
                                require_once 'rol1.php';
                                break;
                            case '2':
                                require_once 'rol2.php';
                                break;
                            case '3':
                                require_once 'rol3.php';
                                break;
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    
    </div>