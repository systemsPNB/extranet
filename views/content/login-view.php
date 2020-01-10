<?php
    require_once './controllers/loginController.php';

    $login = new loginController();

    if ($login->revisar_users_controller()){
?>

    <div class="full-box login-container cover">

        <form method="post" autocomplete="off" class="logInForm">

            <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
            <p class="text-center text-muted text-uppercase">Registrar usuario administrador</p>

            <div class="form-group label-floating">
                <label class="control-label" for="ruser">Usuario</label>
                <input class="form-control" id="ruser" name="ruser" type="text" maxlength="8" autofocus required>
                <p class="help-block">Escribe tú nombre de usuario o cédula</p>
            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="rname">Nombres</label>
                <input class="form-control" id="rname" name="rname" type="text" maxlength="50" required>
                <p class="help-block">Escribe tú nombre y apellido</p>
            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="rpass1">Contraseña</label>
                <input class="form-control" id="rpass1" name="rpass1" type="password" required>
                <p class="help-block">Escribe tú contraseña</p>
            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="rpass2">Repetir contraseña</label>
                <input class="form-control" id="rpass2" name="rpass2" type="password" required>
                <p class="help-block">Vuelve a escribe la contraseña</p>
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Registrar" class="btn btn-info" style="color: #FFF;">
            </div>

        </form>

    </div>

<?php

    if (isset($_POST['ruser']) && isset($_POST['rname']) && isset($_POST['rpass1']) && isset($_POST['rpass2'])){

        echo $login->registro_first_user_controller($_POST['ruser'],$_POST['rname'],$_POST['rpass1'],$_POST['rpass2']);

    }

    }else{

?>

<div class="full-box login-container cover">

    <form method="post" autocomplete="off" class="logInForm">

        <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
        <p class="text-center text-fon text-uppercase">Extranet CPNB</p>

        <div class="form-group label-floating">
            <label class="control-label" for="UserName">Usuario</label>
            <input class="form-control" id="UserName" name="user" type="text" maxlength="8" autofocus required>
            <p class="help-block">Escribe tú nombre de usuario</p>
        </div>

        <div class="form-group label-floating">
            <label class="control-label" for="UserPass">Contraseña</label>
            <input class="form-control" id="UserPass" name="pass" type="password" autocomplete="on" required>
            <p class="help-block">Escribe tú contraseña</p>
        </div>

        <div class="form-group text-center">
            <input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
        </div>

    </form>

</div>

<?php

    if (isset($_POST['user']) && isset($_POST['pass'])){

        echo $login->login_controlador();

    }

}
?>