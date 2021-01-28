<?php


namespace App\Manager;


use Core\Manager;

class UsersManager extends Manager
{

    public function add($login,$password)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table}(`login`, `password`) VALUES (:login,:password)");
        $query->execute([
            ':login' => $login,
            ':password' => $password
        ]);
    }

    public function verify_user_login($login)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE login = :login");
        $query->execute([':login' => htmlspecialchars($login)]);
        $user_in_db = $query->fetch();
       return $user_in_db;
    }

    public function verify_user_password($login,$password)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE login = :login");
        $query->execute([':login' => htmlspecialchars($login)]);
        $user_in_db = $query->fetch();
        if(password_verify($user_in_db['password'],$password)){
            return true;
        }else{
            return false;
        }
    }

}