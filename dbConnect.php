<?php
class dbConnect {
    private $conn;
    function __construct() {
        require_once('config.php');
        try {
            $conn = new PDO(DSN, DB_USER, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch(PDOException $e){
            echo "Connection failed" . $e->getMessage();
        }
        $this->conn = $conn;
    }
    public function getConn() {
        return $this->conn;
    }
    public function Close(){
        $conn = null;
    }
}
?>