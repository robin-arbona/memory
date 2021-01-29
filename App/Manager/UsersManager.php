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

    /**
     * Return array with login / point / shot from one user
     * @return array
     */

    public function getScore($id)
    {
        
        $query = $this->db->query("SELECT users.login,sum(points) AS total_points,sum(shot) AS total_shot FROM levels JOIN scores ON scores.id_levels=levels.id JOIN users ON users.id=scores.id_user WHERE id_user = $id")->fetch(\PDO::FETCH_ASSOC);
        
        
        if($query['login'] == NULL)
        {
            return FALSE;
        }
        else
        {
            return $query;

        }
        

        
        
    }

    /**
     * Return last number of id in DB
     * @return int 
     */
    public function getSumId() :int
    {
        $query = $this->db->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");
        $data = $query->fetch();
        $data = (int)$data['id'];
        return $data;
    }

    /**
     * Fais la liste de tout les scores
     */
    public function listAllScore()
    {
        $wall = [];
        $users = $this->getSumId();
        for($i=1; $i<$users; $i++)
        {
            if($this->getScore($i) != FALSE)
            {
                array_push($wall,$this->getScore($i));
            }
            
            
            
         
        }
        return $wall;
        
        
        

    }


}