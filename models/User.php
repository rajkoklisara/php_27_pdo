<?php
    require_once 'DB.php';
    
    class User extends DB {
        public $username;
        public $password;

        public function __construct($username, $password) {
            parent::__construct();
            $this->username = $username;
            $this->password = $password;
        }

        public function save() {
            $stmt = $this->connection->prepare("INSERT INTO users (username, password) VALUES (:name, :password)");
            $stmt->bindParam(':name', $this->username);
            $stmt->bindParam(':password', $this->password);
            return $stmt->execute();
        }

        public function exists() {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :name");
            $stmt->bindParam(':name', $this->username);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
            return false;
        }
    }