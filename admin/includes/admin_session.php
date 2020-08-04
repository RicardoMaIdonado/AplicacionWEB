<?php

class AdminSession
{
    public function __construct()
    {
        session_start();
    }
    public function setCurrentAdmin($admin)
    {
        $_SESSION['admin'] = $admin;
    }
    public function getCurrentAdmin()
    {
        return $_SESSION['admin'];
    }
    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}
