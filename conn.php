<?php
//connect with the database
class Conn {

    const server = "localhost";
    const name = "root";
    const password = "";
    const db = "jobeasy";
    
    public static function connection(){
        return mysqli_connect(self::server,self::name,self::password,self::db);
    }
}
$conn = Conn::connection();
// echo '<pre>'; print_r(Conn::connection()); echo'</pre>';
//Authentification system

/*class Authentification {

    private $username;
    private $email;
    private $password;
    private $cpassword;
    private $connection;

    public function __construct($conn){
        $this->connnection = $conn;
    }
    
    public function register($username, $email, $password, $cpassword){
        $exist = mysqli_query(Conn::connection(),"SELECT * FROM `users` WHERE `email` = '$email'");
        if (mysqli_num_rows($exist)>0) {
            $_SESSION['error'] = "try to enter an other email";
            // echo $this->error;
            // die();
            header('location:register.php');
        }elseif ($password==$cpassword) {
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $insert = "INSERT INTO users(username,email,password,role_name) VALUES ('$username','$email','$pass','candidat')";
            mysqli_query(Conn::connection(),$insert);
            header('location:login.php');
        }else {
            $_SESSION['error'] = "the passwords you entred is doesn't the same";
            header('location:register.php');
        }
    }
    
    public function login($email, $password){
        $exist = mysqli_query(Conn::connection(),"SELECT * FROM `users` WHERE email = '$email'");
        if (mysqli_num_rows($exist) > 0) {
            $row = mysqli_fetch_array($exist);
            // echo
            if(password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role_name'];
                // print_r($row['role_name']);
                // die();
                if ($row['role_name'] == 'admin') {
                    header('location:/jobease-php-oop/dashboard/dashboard.php');
                } elseif($row['role_name'] == 'candidat') {
                    
                    header('location: /jobease-php-oop/index.php');
                }
            } else {
                $_SESSION['error'] = "Your password is incorrect";
                header('location:login.php');
            }
            
        }else {
            $_SESSION['error'] = "this account doesn't exist";
            header('location:login.php');
        }
    }
    }
    extract($_POST);

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
    
        $register = new Authentification();
        $register->register($username, $email, $password, $cpassword);
        // echo '<pre>'; print_r($rigister); echo'</pre>';
        
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){
    
        $login = new Authentification();
        $login->login($email, $password);
        // $login->error;
        // echo '<pre>'; print_r($login); echo'</pre>';
        // die();
    }*/

?>



