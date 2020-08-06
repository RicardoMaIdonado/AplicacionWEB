<?php

include_once 'includes/registro.php';

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

            //LO SIGUIENTE ES UNA API QUE PERMITE COMPROBAR SI EL CORREO EXISTE
            $email = $emailForm;
            $key = "ANo9DCEqRCJ3BfxS5vTga";
            $url = "https://app.verificaremails.com/api/verifyEmail?secret=" . $key . "&email=" . $email;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $response = curl_exec($ch);
            if ($response == 'ok') {
                //echo 'existe';
                $registro->ingreso($nameForm, $apellForm, $emailForm, $passForm);
                $success = "Usuario registrado con éxito";
                
            } else {
                //echo 'no existe';
                $nonsuccess = "El correo ingresado no existe!";
            }
            curl_close($ch);
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
