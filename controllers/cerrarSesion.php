<?php
// Cerrar sesión desde el menú
require_once '../core/mainModel.php';
session_start(['name' => 'AppExtranet']);
mainModel::update_bicarora( date("Y-m-d h:i:s a"),$_SESSION['bitacora']);
session_unset();
session_destroy();
header('Location: ../login/');