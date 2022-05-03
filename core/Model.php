<?php

namespace Core;

use PDO;
use PDOException;

abstract class Model
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * base model's class constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return void
     */
    private function connect(): void
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . DB['host'] . ';dbname=' . DB['name'],
                DB['username'],
                DB['password']
            );
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}
