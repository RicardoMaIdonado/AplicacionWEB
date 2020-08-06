<?php

//logout.php

include('config.php');

//Reset OAuth access token
$accesstoken=$_SESSION['access_token'];

$google_client->revokeToken($accesstoken);

//Destroy entire session data.
session_destroy();

//redirect page to index.php
if (isset($_REQUEST['no'])) {
    header('location: indexLogin.php?no=2');
}else {
    header('location: indexLogin.php');
}


?>