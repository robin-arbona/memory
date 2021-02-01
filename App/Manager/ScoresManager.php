<?php


namespace App\Manager;

use Core\Manager;

class ScoresManager extends \Core\Manager
{
    public function add($level,$user)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table}(`id_levels`, `id_user`) VALUES (:level,:user)");
        $query->execute([
            ':level' => $level,
            ':user' => $user
        ]);
    }

}