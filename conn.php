<?php
session_start();
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
// echo '<pre>'; print_r(Conn::connection()); echo'</pre>';




?>



