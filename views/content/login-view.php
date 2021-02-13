<?php
    require_once './controllers/loginController.php';
    $login = new loginController();
?>

<div class="full-box login-container cover">

    <form method="post" autocomplete="off" class="logInForm">

        <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
        <p class="text-center text-fon text-uppercase">Iniciar sesión</p>

        <div class="form-group label-floating">
            <label class="control-label" for="UserName">Usuario</label>
            <input class="form-control" id="UserName" name="user" type="text" maxlength="8" placeholder="Ingrese su usuario" autofocus required>
            <p class="help-block">Escribe tú nombre de usuario</p>
        </div>

        <div class="form-group label-floating">
            <label class="control-label" for="UserPass">Contraseña</label>
            <input class="form-control" id="UserPass" name="pass" type="password" placeholder="Ingrese su contraseña" autocomplete="on" required>
            <p class="help-block">Escribe tú contraseña</p>
        </div>

        <!-- <div>
            <label>Por favor ingrese el texto de la imagen</label>
            <img src="<?//=SERVERURL?>controllers/captcha.php" class="captcha-image" alt="CAPTCHA">
            <i class="icon-refresh2" id="refresh-captcha" title="Cambiar imagen"></i>
            <br>
            <input type="text" class="form-control" name="captcha_challenge" pattern="[A-Za-z1-9]{6}" maxlength="6" placeholder="Escriba aquí el texto de la imagen">
        </div> -->

        <div class="form-group text-center">
            <input type="submit" value="Iniciar sesión" class="btn btn-info mt-2">
        </div>

    </form>

</div>

<?php
    if(isset($_POST['user']) && isset($_POST['pass'])){
        echo $login->login_controlador();
    }
?>

<script>
    /*var refreshButton = document.getElementById("refresh-captcha");
    refreshButton.onclick = function(){
        document.querySelector(".captcha-image").src = '<?=SERVERURL?>controllers/captcha.php?' + Date.now();
    }*/
</script>