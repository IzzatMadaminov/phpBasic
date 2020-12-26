<?php
require_once 'dbConnect.php';
session_start();
class dbFunction {
    private $conn;
    function __construct() {

        // connecting to database
        $db = new dbConnect();
        $this->conn = $db->getConn();

    }
    // destructor
    function __destruct() {

    }
    public function UserRegister($username, $emailid, $password){
        $password = md5($password);
        $sql = "INSERT INTO users(username, emailid, password) values('".$username."','".$emailid."','".$password."')";
        try {
            $qr = $this->conn->exec($sql);
            return $qr;
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
        }

    }
    public function Login($emailid, $password){
        //echo "bdsgj" . $emailid . " " . $password;
        $sql = "SELECT * FROM users WHERE emailid='" . $emailid . "' AND password='" . md5($password) . "'";
        $res = $this->conn->query($sql);
        $user_data = $res->fetch();


        if (isset($user_data['emailid']))
        {
            $_SESSION['login'] = true;
            $_SESSION['uid'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['emailid'];

            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function isUserExist($emailid){
        $sql = "SELECT COUNT(*) FROM users WHERE emailid = '".$emailid."'";
        try {
            $qr = $this->conn->query($sql);

            $row = $qr->fetch();

            if($row > 0){
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return "Eror on isUserExist " . $e->getMessage();
        }
    }
}
?>