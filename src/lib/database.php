<?php

namespace php\notes\lib;

use PDO;
use PDOException;

class Database {
    private string $host;
    private string $user;
    private string $dbname;
    private string $charset;
    private string $password;

    public function __construct()
    {
        $this->host     = 'localhost';
        $this->user     = 'root';
        $this->dbname   = 'notes_app';
        $this->charset  = 'utf8mb4';
        $this->password = 'password';
    }

    public function connect() {
        try {
            $conn = "mysql:host={$this->host};dbname={$this->dbname};user={$this->user};password={$this->password};charset={$this->charset}";

            // excepciones
            $options = [ pdo::ATTR_ERRMODE => pdo::ERRMODE_EXCEPTION, pdo::ATTR_EMULATE_PREPARES => false ];

            return new PDO($conn, $this->user, $this->password, $options);
        } catch(PDOException $th) {
            throw $th;
        }
    }
}
