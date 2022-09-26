<?php
namespace App;

class Database {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;

    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "crud_pdo";

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        try{
            $this->pdo = new \PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            return $this->pdo;
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>