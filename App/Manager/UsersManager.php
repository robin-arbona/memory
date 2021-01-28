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
        var_dump($user_in_db);
        if(password_verify($password,$user_in_db['password'])){
            return true;
        }else{
            return false;
        }
    }

}