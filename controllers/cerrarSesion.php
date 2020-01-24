<?php
// Cerrar sesión desde el menú
session_start(['name' => 'NSW']);
session_unset();
session_destroy();
header('Location: ../login/');