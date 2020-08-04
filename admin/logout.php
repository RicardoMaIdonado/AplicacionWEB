<?php
include_once 'includes/admin_session.php';

$adminSession = new AdminSession();
$adminSession->closeSession();

header("Location: indexLogin.php");