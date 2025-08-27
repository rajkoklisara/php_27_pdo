<?php

    class DB {
        public $connection;

        public function __construct() {
        $this->connection = new PDO("mysql:host=localhost;dbname=php_27", "root", "");

            if (!$this->connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }
    }