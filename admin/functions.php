<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'projectcwie');

class DB_con {
    private $dbcon;

    function __construct() {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function usernamemeavailable($name) {
        $checkuser = mysqli_query($this->dbcon, "SELECT name FROM admin WHERE name = '$name'");
        return $checkuser;
    }

    public function registration($name, $email, $password) {
        $reg = mysqli_query($this->dbcon, "INSERT INTO admin(name, email, password) 
        VALUES('$name', '$email', '$password')");
        return $reg;
    }

    public function signin($name, $password) {
        $singinquery = mysqli_query($this->dbcon, "SELECT id, name FROM admin WHERE name = '$name' AND password = '$password'");
        return $singinquery;
    }
}

?>
