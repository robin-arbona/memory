<?php


namespace App\Manager;


use Core\Manager;

class UsersManager extends Manager
{
    public function add($login,$password)
    {
        $this->db->query("INSERT INTO {$this->table}(`login`, `password`) VALUES ('$login','$password')");
    }

    public function verify_user()
    {

    }

}