<?php

namespace App\Models;

use PDO;
use Core\Model;

class UserModel extends Model
{
    /**
     * calling te parent constructor
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $fields
     * @return bool
     */
    public function create(array $fields): bool
    {    

        $stmt = $this->pdo->prepare("
            INSERT INTO users (username, email, password) VALUES (?,?,?)
        ");

        return $stmt->execute([$fields['username'],$fields['email'],md5($fields['password'])]);
    }

    /**
     * @param array $fields
     * @return bool
     */
    public function update(array $fields): bool
    {     
        $stmt = $this->pdo->prepare("
            UPDATE users SET username = COALESCE(nullif(?, ''),username), email = COALESCE(nullif(?, ''),email), password = COALESCE(nullif(?, ''),password) WHERE id = ?
        ");

        return $stmt->execute([$fields['username'],$fields['email'],md5($fields['password']),$fields['id']]);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {     
        $stmt = $this->pdo->prepare("
            DELETE FROM users WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }

    /**
     * @param string $select
     * @return array
     */
    public function getAll(string $select = "*"): array
    {     
        $stmt = $this->pdo->query("
            SELECT $select FROM `users`
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $where
     * @return array
     */
    public function get(string $where): array
    {     
        $stmt = $this->pdo->query("
            SELECT * FROM `users` WHERE $where
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
