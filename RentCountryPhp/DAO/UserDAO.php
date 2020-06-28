<?php
class UserDAO{
    
    public $dbclass;
    public $db;
    
    public function __construct() {
        $this->dbclass = new Db();
        $this->db = $this->dbclass->getConnection();

    }
    public function AddUser($login, $password, $email, $confirm_email, $date_create, $last_active) {
        $password_hash = md5($password);
        
        $sql = 'insert into users(login, password_hash, email, confirm_email, date_create, last_active) values(:login, :password_hash, :email, :confirm_email, :date_create, :last_active)';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':confirm_email', $confirm_email, PDO::PARAM_INT);
        $result->bindParam(':date_create', $date_create, PDO::PARAM_STR);
        $result->bindParam(':last_active', $last_active, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public function DeleteUser($id) {
        $sql = 'delete from users where id = :id';

        $result = $this->db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public function CheckLogin($login) {
        $sql = 'select login from users where login = :login';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetch()){
            return false;
        }
        
        return true;
    }
    
    public function CheckEmail($email) {
        $sql = 'select email from users where email = :email';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetch()){
            return false;
        }
        
        return true;
    }

    public function GetUserById($id) {

        $sql = 'select * from users where id = :id';

        $result = $this->db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        return $user;
    }

    public function LogCheckReturnId($login, $password) {
        $password_hash = md5($password);

        $sql = 'select id from users where login = :login and password_hash = :password_hash';

        $result = $this->db->prepare($sql);

        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        return $user['id'];
        
    }
    
    public function CheckGuest(){
        $ip = $_SESSION['user_ip'];
        $userip = $_SERVER['REMOTE_ADDR'];
        if(isset($_SESSION['userid'])){            
            if($ip == $userip){
                return false;
            }
        }
        return true;
    }

        public function UpdateUser($id, $login, $password_hash, $email){       
        $sql = 'update users set login = :login, password_hash = :password_hash, email = :email where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        
        return $result->execute();
        
    }
    
    public function LastActiveUser($id) {
        $sql = 'update users set last_active = :last_active where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
}

