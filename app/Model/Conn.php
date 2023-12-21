<?php
//connect with the database
class Conn {

    const server = DB_HOST;
    const name = DB_USERNAME;
    const password = DB_PASSWORD;
    const db = DB_NAME;
    
    public static function connection(){
        return mysqli_connect(self::server,self::name,self::password,self::db);
    }
}
$conn = Conn::connection();
?>



