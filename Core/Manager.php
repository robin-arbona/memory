<?php


namespace Core;
use \PDO;

class Manager
{
    protected $host = 'localhost';
    protected $dbname = 'memory';
    protected $username = 'root';
    protected $password ='';
    protected $db;

    public function __construct()
    {
        $this->setdb();
    }
    public function setdb()
    {
       $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
    }
}