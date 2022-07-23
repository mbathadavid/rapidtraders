<?php
Class Database {
    private $dsn = "mysql:host=localhost;dbname=rapidtraders";
    private $dbuser = "root";
    private $dbpass = "";
    public $conn;
    
    //connect the database
    public function __construct(){
       try {
           $this->conn = new PDO($this->dsn,$this->dbuser,$this->dbpass);
       } catch (PDOException $e) {
           echo "Error".$e->getMessage();
       } 
       return $conn;
    }
    //function to sanitize data
    public function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

Class Auth extends Database {
    public function signup($fname,$lname,$phone,$email,$uname,$pass,$referralcode) {
        $sql = "INSERT INTO regusers(Fname,Lname,phone,email,username,pword,referralcode) VALUES (:fname,:lname,:phone,:email,:uname,:pass,:referralcode)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname,'lname'=>$lname,'phone'=>$phone,'email'=>$email,'uname'=>$uname,'pass'=>$pass,'referralcode'=>$referralcode]);
        return true;
    }

    //Function for fetching the latest registered fellow
    public function fetchlatest(){
        $sql = "SELECT * FROM regusers Order by SN DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //Check for registered Email
    public function checkemail($email){
        $sql = "SELECT * FROM regusers WHERE Email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // check for registered phone
    public function checkphone($phone){
        $sql = "SELECT * FROM regusers WHERE phone = :phone";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['phone'=>$phone]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function login($username,$psw){
        $sql = "SELECT * FROM regusers WHERE email = :username AND pword = :psw";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$username,'psw'=>$psw]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

?>