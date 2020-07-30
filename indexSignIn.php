<?php

include_once '../vaince/includes/registro.php';

$registro = new Registro();

if (isset($_POST['name']) && isset($_POST['apellido']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['passConfirm'])) {
    //echo "validacion de signIn";
    $nameForm = $_POST['name'];
    $apellForm = $_POST['apellido'];
    $emailForm = $_POST['mail'];
    $passForm = $_POST['password'];
    $passConfirmForm = $_POST['passConfirm'];
    if ($registro->userExist($emailForm)) {
        if ($passForm == $passConfirmForm) {
            //echo "Usuario validado";
            $registro->ingreso($nameForm, $apellForm, $emailForm, $passForm);
            $success = "Usuario registrado con exito";
        } else {
            //echo "Nombre de usuario o password incorrecto";
            $errorPass = "Las contraseñas no coinciden";
        }
    } else {
        $errorExist = "El usuario ya existe";
    }
    include_once 'vistas/signIn.php';
} else {
    //echo "Login";
    include_once 'vistas/signIn.php';
}
