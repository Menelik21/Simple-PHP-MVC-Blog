<?php
/**
 * User model for loing and registration
 */
use App\core\Model;

class UserModel extends Model{

    public $conn;

    public function __construct(){
        $this->conn = $this->connection();
    }
    /**
     * Login method
     * param username = string and password string
     */
    public function login($username,$password){

        $sql = "SELECT * FROM users WHERE us_username = :us AND us_password = :pw";
        $stat = $this->conn->prepare($sql);
        $stat->execute(array(':us' =>$username,':pw'=>$password ));
        $user = $stat->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            session("userid",$user['us_userid']);
            session('username',$user['us_username']);
            session('firstname',$user['us_firstname']);
            session('lastname',$user['us_lastname']);
            return true;
        }
        else{
            return false;
        }
        
    }
    /** 
     * Take the data from user registere contrlller
     */
    public function userRegister($data = []){

        $sql = "INSERT into USERS (us_username,us_firstname,us_lastname,us_gender,us_email,us_password)
        VALUES (:username,:firstname,:lastname,:gender,:email,:password)";
        $stat = $this->conn->prepare($sql);
        $stat->execute($data);
        if ($this->conn->lastInsertId()) {
            return $this->conn->lastInsertId();
        }
        else{
            return false;
        }
        
    }
}