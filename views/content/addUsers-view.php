<?php if($_SESSION['user']=='sistemas'): ?>
<?php include 'controllers/ajaxController.php'; ?>

<div class="card">
    <div class="card-header font-weight-bold">
        Bienvenido <?=$_SESSION['user']?>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <h4>Registrar usuarios masivamente</h4>

                        <?php
                        $addusr = new ajaxController;
                        var_dump($addusr->get_workers_for_users());
                        ?>

                    </div>
                </div>
            </div>
        </div>
    
    </div>
<?php endif; ?>