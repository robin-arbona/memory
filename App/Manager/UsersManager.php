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
        if(password_verify($password,$user_in_db['password'])){
            $_SESSION['id'] = $user_in_db['id'];
            return true;
        }else{
            return false;
        }
    }

    /**
     * Return array with login / point / shot from all user DES
     * @return array
     */

    public function getScore() :array
    {
        
        $query = $this->db->query("SELECT users.login,sum(points) AS points,sum(shot) AS shot FROM levels JOIN scores ON scores.id_levels=levels.id JOIN users ON users.id=scores.id_user GROUP BY login ORDER BY points DESC LIMIT 10 ")->fetchAll(\PDO::FETCH_ASSOC);
        
        return $query;
        
    }

}