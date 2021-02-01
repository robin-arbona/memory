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
    protected $table;


    public function __construct()
    {
      $this->setdb();
      $this->table = $this->getTableName();
    }
    public function setdb()
    {
       $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password,array(
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
       ));

       return $this->db;
    }
    public function getTableName()
    {
        $classnamespace = get_class($this);

        $classnamespace = explode('\\',$classnamespace);
        $class = end($classnamespace);
        $class = strtolower($class);
        $table = str_replace('manager','',$class);

        return $table;

    }

}