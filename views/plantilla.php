<?php
require_once './controllers/vistasControlador.php';
$vt = new vistasControlador();
$vistasR = $vt->obtener_vistas_controlador();
if ($vistasR == "./views/content/reporte-view.php"){
    
    require_once './views/content/reporte-view.php';
    
}elseif($vistasR == "./views/content/arc-view.php"){

    require_once './views/content/arc-view.php';

} elseif($vistasR == "./views/content/constancia-view.php"){

    require_once './views/content/constancia-view.php';
}else{
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title> <?= NAME_SISTEM; ?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <!--====== Links -->
    <?php include 'views/layout/links.php'; ?>
    <!--====== Scripts -->
    <?php include 'views/layout/scripts.php'; ?>
</head>

<body>
    <?php
        if($vistasR == "login" || $vistasR == "404"):

            if ($vistasR == "login") {

                require_once './views/content/login-view.php';

            }else{

                require_once './views/content/404-view.php';

            }
            
        else:

            session_start(['name' => 'AppExtranet']);
            // Comprobar inicio de sesión
            require_once './controllers/loginController.php';
            $lc = new loginController;
            if( !isset($_SESSION['user']) && !isset($_SESSION['tokextranet'])){
                $lc->cerrar_session(); // Redirigir al login si no se ha iniciado sesión
            }
            ///////////////////////////////

    ?>

    <!-- Content page-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="banner">
                <h1 class="display-4"> <?= COMPANY; ?> </h1>
                <p class="lead"> <?= NAME_SISTEM; ?> </p>
            </div>
        
            <?php
                require_once './views/layout/navBar.php'; // Barra de navegación
                echo "<script> inactivityTime(); </script>";
                require_once $vistasR; // Vista
                require_once 'layout/footer.php'; // Pie de página
                require_once 'content/modals.php'; // Ventanas modal
            ?>
                
        </div>
    </div>
    
    <?php endif; } ?>

</body>

</html>