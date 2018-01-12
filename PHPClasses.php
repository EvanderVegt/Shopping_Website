<?php 

class Database {
    private $hostname = 'localhost';
    private $databasenaam = 'cart';
    private $username = 'root';
    private $password = '';
    public $conn;
    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->databasenaam);
        } catch (mysqli_sql_exception $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}

class seller {
    public $id = null;
    public $name;
    public $img;
    public $price;
    public function __construct($name, $img, $price) {
        $this->name = $name;
        $this->email = $img;
        $this->password = $price;

    }
    public function getid() {
        return $this->id;
    }
    public function setid($id) {
        $this->id = $id;
    }
    public function getname() {
        return $this->name;
    }
    public function setname($name) {
        $this->name = $name;
    }
    public function getimg() {
        return $this->img;
    }
    public function setimg($img) {
        $this->img = $img;
    }
    public function getprice() {
        return $this->price;
    }
    public function setprice($price) {
        $this->price = $price;
    }

  
   
    public function addarticle() {
        $sql = "INSERT INTO `products`(`name`, `img`, `price`) VALUES";
        $sql .= " ('$this->name','$this->img','$this->price')";
        $connection = new Database();
        $result = $connection->conn->query($sql);
        session_start();
        $_SESSION["name"] = $this->name;
        $connection->conn->close();
        header("location: login.php");
    }
    
    public function deleteaccount(){
        
        
    }

        public function signin() {
        $sql = "SELECT * FROM `user` WHERE `email`= BINARY '$this->email' AND `password`= BINARY '$this->password'";
        $connection = new Database();
        $result = $connection->conn->query($sql);
        if (isset($result)) {
            if ($result->num_rows <= 0) {
                return "email or password does not match";
            } else {
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION["name"] = $row['name'];
                $connection->conn->close();
                header("location: index.php");
            }
        }
    }

}
