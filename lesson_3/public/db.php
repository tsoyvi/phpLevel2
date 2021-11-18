<?php

class Database
{
    protected $host = "localhost";
    protected $dbName = "php";
    protected $username = "root";
    protected $password = "1111111";
    protected $charset = 'utf8mb4';
    public $connect = null;

    public function __construct()
    {
        $this->connect = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        if ($this->connect->connect_error) {
            $error = $this->connect->connect_error;
            echo ("Not connected: " . $error);
            exit;
        }
        $this->connect->set_charset($this->charset);
    }
}
