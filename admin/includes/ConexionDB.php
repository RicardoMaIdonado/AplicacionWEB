<?php

class DB
{
    private $host;
    private $db;
    private $user;
    private $psw;
    private $charset;

    public function __construct()
    {
        $this->host     = 'localhost';
        $this->db       = 'bd_vaince';
        $this->user     = 'root';
        $this->psw      = '';
        $this->charset  = 'utf8mb4';
    }

    function getConexion()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false];
            $pdo = new PDO($connection, $this->user, $this->psw, $options);
            return $pdo;
        } catch (PDOException $e) {
            print_r("Error connection:" . $e->getMessage());
        }
    }
}