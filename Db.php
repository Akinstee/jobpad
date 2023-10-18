<?php
include_once "Config.php";

class Db {
    private $dbHost = 'localhost';
    private $dbUser = 'root'; // Use the correct username
    private $dbPassword = ''; // Replace 'password' with the actual password
    private $dbName = 'jobpad'; // Replace with your database name

    protected $conn;

    public function connect() {
        $dsn = "mysql:host=$this->dbHost;dbname=$this->dbName"; // Corrected the DSN format
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword, $options);
            return $this->conn;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
?>
