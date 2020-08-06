<?php

//index.php

//Include Configuration File
include('config.php');
include_once 'includes/user.php';
include_once 'includes/user_session.php';
include_once 'includes/productos.php';

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if (isset($_GET["code"])) {

    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    $_SESSION['access_token'] = $token;
    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        //Below you can find Get profile data and store into $_SESSION variable
        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    
    $login_button = '<br><h1 style="text-align:center;">VAINCE DESEA ACCCEDER A TU INFORMACION</h1>
    <p style="text-align:center;"><a href="' . $google_client->createAuthUrl() . '"><img src="Iconos/login.png" width=150px /></a></p>';
    //$login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="Iconos/google.png" width=30px /></a>';
    //echo 'Continuar en google.com';
}

if ($login_button == '') {
    $user = new User();
    $producto = new Producto();
    if ($user->existe($_SESSION['user_email_address'])) {
        //echo 'EL USUARIO EXISTE';

        $userSession = new UserSession();
        $userSession->setCurrentUser($_SESSION['user_email_address']);
        $user->setUser($_SESSION['user_email_address']);
        $_SESSION['op'] = 0;
        $_SESSION['niv'] = 0;
        unset($_SESSION['listado']);
        $_SESSION['listado'] = array();
        $_SESSION['google'] = 'google';
        include_once 'controlador/IndexLog.php';

    } else {
        //echo 'EL USUARIO NO EXISTE';
        $_SESSION['ingreso'] = 'ingreso';
        include_once 'indexLogin.php';
        
    }

} else {
    echo '<div align="center">' . $login_button . '</div>';
}
?>
</div>
</div>
</body>

</html>